<?php
/**
* Especifico los campos de ingreso de datos.
*/
$campos = null;
$campos['Rubro.id'] = array();
$campos['Rubro.nombre'] = array();
$campos['Rubro.descripcion'] = array();
$fieldsets[] = array("campos"=>$campos);

$fieldset = $formulario->pintarFieldsets($fieldsets, array("div"=>array("class"=>"unica"), "fieldset"=>array("imagen"=>"rubros.gif")));

/**
* Pinto el element add con todos los fieldsets que he definido.
*/
echo $this->renderElement("add/add", array("fieldset"=>$fieldset));
?>