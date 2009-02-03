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
* Especifico los campos para ingresar las condiciones.
*/
$condiciones['Condicion.Trabajador-apellido'] = array();
$condiciones['Condicion.Trabajador-nombre'] = array();
$condiciones['Condicion.Trabajador-sexo'] = array();
$condiciones['Condicion.Trabajador-numero_documento'] = array("label"=>"Documento");
$condiciones['Condicion.Trabajador-cuil'] = array();
$fieldsets[] = array('campos' => $condiciones);
$fieldset = $appForm->pintarFieldsets($fieldsets, array('fieldset' => array('imagen' => 'trabajadores.gif')));


/**
* Creo el cuerpo de la tabla.
*/
$cuerpo = null;
foreach ($registros as $k => $v) {
	$fila = null;
	$id = $v['Trabajador']['id'];
	$fila[] = array('tipo' => 'desglose', 'id' => $id, 'imagen' => array('nombre' => 'empleadores.gif', 'alt' => "Empleadores"), 'url' => 'relaciones');
	$fila[] = array('model' => 'Trabajador', 'field' => 'id', 'valor' => $v['Trabajador']['id'], 'write' => $v['Trabajador']['write'], 'delete' => $v['Trabajador']['delete']);
	$fila[] = array('model' => 'Trabajador', 'field' => 'cuil', 'valor' => $v['Trabajador']['cuil'], "class"=>"centro");
	$fila[] = array('model' => 'Trabajador', 'field' => 'apellido', 'valor' => $v['Trabajador']['apellido']);
	$fila[] = array('model' => 'Trabajador', 'field' => 'nombre', 'valor' => $v['Trabajador']['nombre']);
	$fila[] = array('model' => 'Trabajador', 'field' => 'telefono', 'valor' => $v['Trabajador']['telefono']);
	$fila[] = array('model' => 'Trabajador', 'field' => 'direccion', 'valor' => $v['Trabajador']['direccion']);
	$cuerpo[] = $fila;
}

$accionesExtra[] = $appForm->link("Imprimir", "imprimir", array("title"=>"Imprimir", "class"=>"link_boton"));
echo $this->element('index/index', array('condiciones' => $fieldset, 'cuerpo' => $cuerpo, "accionesExtra"=>$accionesExtra));

?>