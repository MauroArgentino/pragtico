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
$campos['Localidad.id'] = array();
$campos['Localidad.provincia_id'] = array("options"=>"listable", "model"=>"Provincia", "displayField"=>array("Provincia.nombre"));
$campos['Localidad.codigo'] = array();
$campos['Localidad.nombre'] = array();
$campos['Localidad.codigo_zona'] = array("aclaracion"=>"Indica el codigo de la zona para AFIP.");
$fieldsets[] = array('campos' => $campos);

$fieldset = $appForm->pintarFieldsets($fieldsets, array("div"=>array("class"=>"unica"), "fieldset"=>array('imagen' => 'localidades.gif')));

/**
* Pinto el element add con todos los fieldsets que he definido.
*/
echo $this->element('add/add', array('fieldset' => $fieldset, , "migaEdit" => $this->data[0]['Localidad']['nombre']));
?>