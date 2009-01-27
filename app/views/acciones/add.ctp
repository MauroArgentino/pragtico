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
$campos['Accion.id'] = array();
$campos['Accion.controlador_id'] = array('options' => 'listable', "model"=>"Controlador", "displayField"=>array("Controlador.nombre"), "empty"=>true);
$campos['Accion.nombre'] = array();
$campos['Accion.etiqueta'] = array();
$campos['Accion.ayuda'] = array();
$campos['Accion.estado'] = array();
$campos['Accion.seguridad'] = array('aclaracion' => "Indica si debe chequearse la seguridad sobre esta accion.");
$campos['Accion.observacion'] = array();
$fieldsets[] = array('campos' => $campos);

$fieldset = $appForm->pintarFieldsets($fieldsets, array('div' => array('class' => 'unica'), 'fieldset' => array('imagen' => 'acciones.gif')));

/**
* Pinto el element add con todos los fieldsets que he definido.
*/
echo $this->element('add/add', array('fieldset' => $fieldset, 'miga' => 'Accion.nombre');
?>