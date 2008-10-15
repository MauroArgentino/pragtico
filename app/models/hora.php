<?php
/**
 * Este archivo contiene toda la logica de acceso a datos asociadaa las horas de una relacion laboral.
 * Las horas puedenser horas extras, horas de enfermedad, etc.
 *
 * PHP versions 5
 *
 * @filesource
 * @copyright		Copyright 2007-2008, Pragmatia de RPB S.A.
 * @link			http://www.pragmatia.com
 * @package			pragtico
 * @subpackage		app.models
 * @since			Pragtico v 1.0.0
 * @version			1.0.0
 * @author      	Martin Radosta <mradosta@pragmatia.com>
 */
/**
 * La clase encapsula la logica de acceso a datos asociada a las horas de una relacion laboral.
 * Las horas puedenser horas extras, horas de enfermedad, etc.
 *
 * @package		pragtico
 * @subpackage	app.models
 */
class Hora extends AppModel {

	/**
	* Establece modificaciones al comportamiento estandar de app_controller.php
	*/
	var $modificadores = array(	"index"=>array(	"contain"=>array("Relacion.Empleador",
																"Relacion.Trabajador")),
								"edit"=>array(	"contain"=>array("Relacion.Empleador",
																"Relacion.Trabajador")));


	var $totalizar = array("sum"=>array("cantidad"));
	
	var $validate = array(
        'relacion_id__' => array(
			array(
				'rule'	=> VALID_NOT_EMPTY,
				'message'	=>'Debe seleccionar la relacion laboral.')
        ),
        'cantidad' => array(
			array(
				'rule'	=> VALID_NUMBER,
				'message'	=>'Debe ingresar la cantidad de horas.')
        ),
        'periodo' => array(
			array(
				'rule'	=> VALID_NOT_EMPTY,
				'message'	=>'Debe ingresar el periodo.'),
			array(
				'rule'	=> VALID_PERIODO,
				'message'	=>'El periodo no es valido, debe tener el formato AAAAMM(1Q|2Q|M).'),
        ),
        'tipo' => array(
			array(
				'rule'	=> VALID_NOT_EMPTY, 
				'message'	=>'Debe seleccionar el tipo.')
        ));

	var $belongsTo = array(	'Relacion' =>
                        array('className'    => 'Relacion',
                              'foreignKey'   => 'relacion_id'));




/**
 * Before save callback
 *
 * @return boolean True if the operation should continue, false if it should abort
 */    
    function beforeSave() {
    	if(!empty($this->data['Hora']['periodo'])) {
    		$this->data['Hora']['periodo'] = strtoupper($this->data['Hora']['periodo']);
    	}
    	return parent::beforeSave();
	}

	
/**
 * Dada un ralacion y un periodo retorna las horas trabajadas de todos los tipos que esten pendientes de liquidar.
 *
 * @return array vacio si no hay horas.
 */
	function buscarHora($opciones, $relacion) {

		$conditions = array(
			"conditions"=>	array(	"Hora.relacion_id" 		=> $relacion['Relacion']['id'],
									"Hora.liquidacion_id" 	=> null,
									"Hora.periodo" 			=> $opciones['periodo'],
									"Hora.estado"			=> "Pendiente"),
			"fields"	=>	array(	"Hora.tipo", "sum(Hora.cantidad) as total"),
			"recursive"	=>	-1,
			"group"		=> 	array("Hora.tipo")
		);

		/**
		* Cuando se trata de un trabajador mensual, por mas que las horas esten cargadas para una de las quincenas,
		* las busco indistintamente para ambas.
		*/
		$periodo = $this->traerPeriodo($opciones['periodo']);
		if($relacion['ConveniosCategoria']['jornada'] == "Mensual") {
			$conditions['conditions']['Hora.periodo'] =	array	(	$periodo['ano'] . $periodo['mes'] . "1Q",
																	$periodo['ano'] . $periodo['mes'] . "2Q",
																	$periodo['ano'] . $periodo['mes'] . "M");
		}
		$r = $this->find("all", $conditions);
		$horas['#horas'] = $horas['#horas_extra_50'] = $horas['#horas_extra_100'] = $horas['#horas_ajuste'] = $horas['#horas_ajuste_extra_50'] = $horas['#horas_ajuste_extra_100'] = 0;
		$conceptos = $auxiliares = array();
		if(!empty($r)) {
			$modelConcepto = new Concepto();
			foreach($r as $hora) {
				if($relacion['ConveniosCategoria']['jornada'] == "Mensual" && ($hora['Hora']['tipo'] == "Normal")) {
					continue;
				}
				switch($hora['Hora']['tipo']) {
					case "Normal":
						$tipo = "#horas";
						break;
					case "Extra 50%":
						$tipo = "#horas_extra_50";
						break;
					case "Extra 100%":
						$tipo = "#horas_extra_100";
						break;
					case "Ajuste Normal":
						$tipo = "#horas_ajuste";
						break;
					case "Ajuste Extra 50%":
						$tipo = "#horas_ajuste_extra_50";
						break;
					case "Ajuste Extra 100%":
						$tipo = "#horas_ajuste_extra_100";
						break;
				}
				$horas[$tipo] = $hora[0]['total'];

				/**
				* Busco el concepto.
				*/
				$codigoConcepto = str_replace("#", "", $tipo);
				$conceptos = am($conceptos, $modelConcepto->findConceptos("ConceptoPuntual", array("relacion"=>$relacion, "codigoConcepto"=>$codigoConcepto)));
			}
			
			/**
			* Busco los Ids de los registros que he seleccionado antes.
			* No lo hago en una sola query porque romperia el group by.
			* Deberia analizar si sera mejor hacerlo via php a la suma de las horas por tipo y no una query.
			*/
			$conditions['fields'] = array("Hora.id");
			unset($conditions['group']);
			$r = $this->find("all", $conditions);
			/**
			* Creo un registro el la tabla auxiliar que debera ejecutarse en caso de que se confirme la pre-liquidacion.
			*/
			foreach($r as $v) {
				$auxiliar = null;
				$auxiliar['id'] = $v['Hora']['id'];
				$auxiliar['estado'] = "Liquidada";
				$auxiliar['liquidacion_id'] = "##MACRO:liquidacion_id##";
				$auxiliares[] = array("save"=>serialize($auxiliar), "model"=>"Hora");
			}
		}
		return array("conceptos"=>$conceptos, "variables"=>$horas, "auxiliar"=>$auxiliares);
	}


}
?>
