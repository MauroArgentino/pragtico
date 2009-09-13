<?php
/**
 * Este archivo contiene toda la logica de negocio asociada a las relaciones
 * laborales que existen entre los trabajador y los empleadores .
 *
 * PHP versions 5
 *
 * @filesource
 * @copyright       Copyright 2007-2009, Pragmatia
 * @link            http://www.pragmatia.com
 * @package         pragtico
 * @subpackage      app.controllers
 * @since			pragtico v 1.0.0
 * @version         $Revision$
 * @modifiedby      $LastChangedBy$
 * @lastmodified    $Date$
 * @author          Martin Radosta <mradosta@pragmatia.com>
 */
/**
 * La clase encapsula la logica de negocio asociada a las relaciones laborales.
 *
 * @package     pragtico
 * @subpackage  app.controllers
 */
class RelacionesController extends AppController {

//var $components = array('DebugKit.Toolbar');

    var $helpers = array('Documento');

    function reporte_relaciones() {
        if (!empty($this->data['Formulario']['accion']) && $this->data['Formulario']['accion'] === 'generar') {

            if (!empty($this->data['Condicion']['Bar-state'])) {
                $conditions['Relacion.estado'] = $this->data['Condicion']['Bar-state'];
            }
            
            if (!empty($this->data['Condicion']['Bar-grupo_id'])) {
                $conditions['(Relacion.group_id & ' . $this->data['Condicion']['Bar-grupo_id'] . ') >'] = 0;
            }
            if (!empty($this->data['Condicion']['Bar-empleador_id'])) {
                $conditions['Relacion.empleador_id'] = $this->data['Condicion']['Bar-empleador_id'];
            }

            if (!empty($this->data['Condicion']['Bar-periodo_largo'])) {
                $period = $this->Util->format($this->data['Condicion']['Bar-periodo_largo'], 'periodo');
            }
            
            if (!empty($this->data['Condicion']['Bar-con_fecha_egreso'])) {
                if ($this->data['Condicion']['Bar-con_fecha_egreso'] === 'No') {
                    $conditions[] = array('Relacion.egreso' => array(null, '0000-00-00'));
                } else {
                    $conditions['Relacion.egreso NOT'] = '0000-00-00';
                    $conditions['Relacion.egreso !='] = null;
                }
            } elseif ($period !== false) {
                $conditions['Relacion.egreso >='] = $period['desde'];
                $conditions['Relacion.egreso <='] = $period['hasta'];
            }



            if (!empty($this->data['Condicion']['Bar-con_liquidacion_periodo']) && $this->data['Condicion']['Bar-con_liquidacion_periodo'] === 'Si' && $period !== false) {

                $this->Relacion->Liquidacion->Behaviors->detach('Permisos');
                $conditions['Relacion.id'] = Set::extract('/Liquidacion/relacion_id', $this->Relacion->Liquidacion->find('all', array('recursive' => -1, 'group' => 'Liquidacion.relacion_id', 'conditions' => array('Liquidacion.ano' => $period['ano'], 'Liquidacion.mes' => $period['mes']))));
            }

            $this->set('fileFormat', $this->data['Condicion']['Bar-file_format']);
            $this->set('state', $this->data['Condicion']['Bar-state']);
            $this->Relacion->contain(array('Trabajador' => array('ObrasSocial', 'Localidad' => 'Provincia'), 'Empleador', 'Area', 'EgresosMotivo', 'ConveniosCategoria' => 'Convenio'));
            $this->set('data', $this->Relacion->find('all', array('conditions' => $conditions)));
        }
    }


	
/**
 * Set default search condition to active relations.
 */
	function index() {
		if (empty($this->data)) {
			$this->data['Condicion']['Relacion-estado'] = 'Activa';
		}
		return parent::index();
	}


/**
 * areas_relacionado.
 */
	function areas_relacionado($id) {
		$c=0;
		foreach ($this->Relacion->Area->find('list', array('fields' => array('Area.nombre'), 'conditions'=>array('Area.empleador_id' => $id))) as $k => $v) {
			$areas[$c]['optionValue'] = $k;
			$areas[$c]['optionDisplay'] = $v;
			$c++;
		}
		$this->set('data', $areas);
		$this->render('../elements/json');
	}


/**
 * recibos_relacionado.
 */
	function recibos_relacionado($id) {
		$c=0;
		foreach ($this->Relacion->Empleador->Recibo->find('list', array('fields' => array('Recibo.nombre'), 'conditions'=>array('Recibo.empleador_id' => $id))) as $k => $v) {
			$recibos[$c]['optionValue'] = $k;
			$recibos[$c]['optionDisplay'] = $v;
			$c++;
		}
		$this->set('data', $recibos);
		$this->render('../elements/json');
	}

/**
 * Save.
 */
	function save() {
		/**
		* Si esta grabando y selecciona un recibo del empleador, agrego a la relacion laboral,
		* los conceptos que posea ese recibo.
		*/
        if (empty($this->data['Relacion']['id']) && !empty($this->data['Relacion']['recibo_id']) && !empty($this->data['Form']['accion']) && $this->data['Form']['accion'] === 'grabar') {
        	$recibo = $this->Relacion->Empleador->Recibo->findById($this->data['Relacion']['recibo_id']);
        	foreach ($recibo['RecibosConcepto'] as $v) {
        		$relacionesConcepto[] = array('concepto_id' => $v['concepto_id']);
        	}
            unset($this->Relacion->RelacionesConcepto->validate['relacion_id']);
	        $this->data = array_merge($this->data, array('RelacionesConcepto' => $relacionesConcepto));
        }
        return parent::save();
	}


/**
 * Pagos.
 * Muestra via desglose los Pagos asociados a la relacion laboral.
 */
	function pagos($id) {
		$this->Relacion->contain(array('Pago'));
		$this->data = $this->Relacion->read(null, $id);
	}


/**
 * Vacaciones.
 * Muestra via desglose las Vacaciones asociadas a la relacion laboral.
 */
	function vacaciones($id) {
		$this->data = $this->Relacion->read(null, $id);
	}


/**
 * Ausencias.
 * Muestra via desglose las Ausencias asociadas a la relacion laboral.
 */
	function ausencias($id) {
		$this->Relacion->contain(array('Ausencia.AusenciasMotivo'));
		$result = $this->Relacion->read(null, $id);
		$this->data = $result;
	}


/**
 * Conceptos.
 * Muestra via desglose los Conceptos asociados a la relacion laboral.
 */
	function conceptos($id) {
		$this->Relacion->contain(array('RelacionesConcepto.Concepto', 'ConveniosCategoria.Convenio'));
		$relacion = $this->Relacion->read(null, $id);

        foreach ($relacion['RelacionesConcepto'] as $k => $concepto) {
            $r = $this->Relacion->Concepto->findConceptos('ConceptoPuntual',
                array('relacion' => $relacion, 'codigoConcepto' => $concepto['Concepto']['codigo']));
            $relacion['RelacionesConcepto'][$k]['Concepto'] = array_pop($r);
        }
        $this->data = $relacion;
	}


/**
 * Ropas.
 * Muestra via desglose la ropa entregada a la relacion laboral.
 */
	function ropas($id) {
		$this->Relacion->contain('Ropa');
		$this->data = $this->Relacion->read(null, $id);
	}


/**
 * horas.
 * Muestra via desglose las horas asignadas a una relacion.
 */
	function horas($id) {
		$this->Relacion->contain('Hora');
		$this->data = $this->Relacion->read(null, $id);
	}


/**
 * descuentos.
 * Muestra via desglose los descuentos de una relacion.
 */
	function descuentos($id) {
		$this->Relacion->contain('Descuento');
		$this->data = $this->Relacion->read(null, $id);
	}


/**
 * descuentos_detalle.
 * Muestra via desglose el detalle de los descuentos realizados.
 */
	function descuentos_detalle($id) {
		$this->Relacion->Descuento->contain(array('DescuentosDetalle'));
		$this->data = $this->Relacion->Descuento->read(null, $id);
		$this->render('../descuentos/detalles');
	}

 /**
 * PasarAHistorico.
 * Al no poder eliminar una relacion laboral le cambia el estado a historico.
	function pasarAHistorico($id) {
		if ($this->Relacion->save(array('Relacion'=>array('id' => $id, 'estado' => 'Historica')))) {
			$this->Session->setFlash('Se paso al historico la relacion laboral correctamente.', 'ok');
		}
		else {
			$this->Session->setFlash('No pudo pasarse a historico la relacion laboral.', 'error');
		}
		$this->History->goBack();
	}
 */
}
?>