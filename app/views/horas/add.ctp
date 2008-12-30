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
$campos['Hora.id'] = array();
$campos['Hora.periodo'] = array("type"=>"periodo");
$campos['Hora.relacion_id'] = array(	"label"=>"Relacion",
											"lov"=>array("controller"	=> 	"relaciones",
													"seleccionMultiple"	=> 	0,
														"camposRetorno"	=> 	array(	"Trabajador.nombre",
																					"Trabajador.apellido",
																					"Empleador.nombre")));
$campos['Hora.cantidad'] = array();
$campos['Hora.tipo'] = array();
$campos['Hora.estado'] = array("type" => "radio");
$campos['Hora.observacion'] = array();
$fieldset = $formulario->pintarFieldsets(array(array("campos"=>$campos)), array("div"=>array("class"=>"unica"), "fieldset"=>array("legend"=>"horas manual", "imagen"=>"horas.gif")));

/**
* Pinto el element add con todos los fieldsets que he definido.
*/
$miga = array('format' 	=> '%s %s (%s)', 
			  'content' => array('Relacion.Trabajador.apellido', 'Relacion.Trabajador.nombre', 'Relacion.Empleador.nombre'));
echo $this->renderElement("add/add", array("fieldset"=>$fieldset, "miga" => $miga));

?>