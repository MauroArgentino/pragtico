<?php

/**
* Especifico los campos para ingresar las condiciones.
*/
$condiciones['Condicion.Banco-codigo'] = array();
$condiciones['Condicion.Banco-nombre'] = array();
$fieldsets[] = array("campos"=>$condiciones);
$fieldset = $formulario->pintarFieldsets($fieldsets, array("fieldset"=>array("imagen"=>"bancos.gif")));



/**
* Creo el cuerpo de la tabla.
*/
$cuerpo = null;
foreach ($registros as $k=>$v) {
	$fila = null;
	$fila[] = array("tipo"=>"desglose", "id"=>$v['Banco']['id'], "update"=>"desglose1", "imagen"=>array("nombre"=>"sucursales.gif", "alt"=>"Sucursales"), "url"=>'sucursales');
	$fila[] = array("model"=>"Banco", "field"=>"id", "valor"=>$v['Banco']['id'], "write"=>$v['Banco']['write'], "delete"=>$v['Banco']['delete']);
	$fila[] = array("model"=>"Banco", "field"=>"codigo", "valor"=>$v['Banco']['codigo']);
	$fila[] = array("model"=>"Banco", "field"=>"nombre", "valor"=>$v['Banco']['nombre']);
	$fila[] = array("model"=>"Banco", "field"=>"direccion", "valor"=>$v['Banco']['direccion']);
	$cuerpo[] = $fila;
}

echo $this->renderElement("index/index", array("condiciones"=>$fieldset, "cuerpo"=>$cuerpo));
?>