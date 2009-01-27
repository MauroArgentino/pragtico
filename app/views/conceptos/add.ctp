<?php
/**
 * Este archivo contiene la presentacion.
 *
 * PHP versions 5
 *
 * @filesource
 * @copyright		Copyright 2007-2008, Pragmatia de RPB S.A.
 * @link			http://www.pragmatia.com
 * @package			pragtico
 * @subpackage		app.views
 * @since			Pragtico v 1.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @author      	Martin Radosta <mradosta@pragmatia.com>
 */
 
/**
* Especifico los campos de ingreso de datos.
*/
$campos = null;
$campos['Concepto.id'] = array();
$campos['Concepto.codigo'] = array('aclaracion' => "Utilizara este valor en las formulas.");
$campos['Concepto.nombre'] = array();
$campos['Concepto.nombre_formula'] = array('aclaracion' => "Utilizara este valor en las impresiones.");
$campos['Concepto.coeficiente_id'] = array(	"empty"			=> true,
											"options"		=> "listable",
											"recursive"		=> -1,
											"order"			=> "Coeficiente.tipo desc, Coeficiente.nombre",
											"displayField"	=> "Coeficiente.nombre",
											"groupField"	=> "Coeficiente.tipo",
											"model"			=> "Coeficiente");

$campos['Concepto.periodo'] = array();
$campos['Concepto.tipo'] = array();
$campos['Concepto.desde'] = array();
$campos['Concepto.hasta'] = array();
$campos['Concepto.formula'] = array();
$campos['Concepto.observacion'] = array();
$fieldsets[] = array('campos' => $campos);

$campos = null;
$campos['Concepto.sac'] = array();
$campos['Concepto.antiguedad'] = array();
$campos['Concepto.plus_vacacional'] = array();
$fieldsets[] = array('campos' => $campos, 'opciones' => array('fieldset' => array('legend' => "Este concepto debe acumular", 'imagen' => 'acumula.gif')));

$campos = null;
$campos['Concepto.pago'] = array();
$campos['Concepto.imprimir'] = array();
$campos['Concepto.orden'] = array();
$campos['Concepto.cantidad'] = array('aclaracion' => "Indica desde que variable se sacara la cantidad que se mostrara");
$fieldsets[] = array('campos' => $campos, 'opciones' => array('fieldset' => array('legend' => "Visualizacion", 'imagen' => 'visualizacion.gif')));

$campos = null;
$campos['Concepto.retencion_sindical'] = array('aclaracion' => "Indica si corresponde a una retencion sindical");
$campos['Concepto.novedad'] = array('aclaracion' => "Indica si permite ser ingresado desde Planilla de Novedades");
$fieldsets[] = array('campos' => $campos, 'opciones' => array('fieldset' => array('legend' => "Datos complementarios", 'imagen' => 'observaciones.gif')));

$fieldset = $appForm->pintarFieldsets($fieldsets, array('div' => array('class' => 'unica'), 'fieldset' => array('imagen' => 'conceptos.gif')));

/**
* Pinto el element add con todos los fieldsets que he definido.
*/
echo $this->element('add/add', array('fieldset' => $fieldset, 'miga' => 'Concepto.nombre'));
?>