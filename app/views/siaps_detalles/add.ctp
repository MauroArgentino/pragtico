<?php
/**
* Especifico los campos de ingreso de datos.
*/
$campos = null;
$campos['SiapsDetalle.id'] = array();
$campos['SiapsDetalle.siap_id'] = array("options"=>$siaps);
$campos['SiapsDetalle.elemento'] = array();
$campos['SiapsDetalle.valor'] = array();
$campos['SiapsDetalle.descripcion'] = array();
$campos['SiapsDetalle.caracter_relleno'] = array();
$campos['SiapsDetalle.direccion_relleno'] = array();
$campos['SiapsDetalle.desde'] = array();
$campos['SiapsDetalle.longitud'] = array();
$campos['SiapsDetalle.observacion'] = array();
$fieldsets[] = array("campos"=>$campos);

$fieldset = $formulario->pintarFieldsets($fieldsets, array("div"=>array("class"=>"unica"), "fieldset"=>array("legend"=>"Detalles de la Version de SIAP", "imagen"=>"siaps_detalles.gif")));

/**
* Pinto el element add con todos los fieldsets que he definido.
*/
echo $this->renderElement("add/add", array("fieldset"=>$fieldset));
?>