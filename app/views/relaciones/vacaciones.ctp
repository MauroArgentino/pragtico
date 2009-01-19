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
* Creo el cuerpo de la tabla.
*/
$cuerpo = null;
foreach ($this->data['Vacacion'] as $k=>$v) {
	$fila = null;
	$fila[] = array('model' => "Vacacion", 'field' => "id", 'valor' => $v['id'], "write"=>$v['write'], "delete"=>$v['delete']);
	$fila[] = array('model' => "Vacacion", 'field' => "desde", 'valor' => $v['desde']);
	$fila[] = array('model' => "Vacacion", 'field' => "hasta", 'valor' => $v['hasta']);
 	$fila[] = array('model' => "Vacacion", 'field' => "observacion", 'valor' => $v['observacion']);
	$cuerpo[] = $fila;
}


/**
* Creo la tabla.
*/
$opcionesTabla =  array("tabla"=>
							array(	"eliminar"			=>true,
									"ordenEnEncabezados"=>false,
									"modificar"			=>true,
									"seleccionMultiple"	=>false,
									"mostrarEncabezados"=>true,
									"zebra"				=>false,
									"mostrarIds"		=>false));

$url = array('controller' => "vacaciones", 'action' => 'add', "Vacacion.relacion_id"=>$this->data['Relacion']['id']);
echo $this->element('desgloses/agregar', array('url' => $url, "texto"=>"Vacaciones"));
echo $appForm->bloque($appForm->tabla(am(array('cuerpo' => $cuerpo), $opcionesTabla)), array("div"=>array("class"=>"unica")));

?>