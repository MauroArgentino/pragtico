<?php
/**
* Especifico los campos para ingresar las condiciones.
*/
$condiciones['Condicion.ConveniosCategoria-nombre'] = array();
$condiciones['Condicion.ConveniosCategoria-convenio_id'] = array(	"lov"=>array("controller"	=>"convenios",
																			"camposRetorno"	=>array(	"Convenio.numero",
																										"Convenio.nombre")));
$condiciones['Condicion.ConveniosCategoria-jornada'] = array();
$fieldsets[] = array("campos"=>$condiciones);
$fieldset = $formulario->pintarFieldsets($fieldsets, array("fieldset"=>array("legend"=>"Categoria", "imagen"=>"categorias.gif")));


/**
* Creo el cuerpo de la tabla.
*/
$cuerpo = null;
foreach ($registros as $k=>$v) {
	$fila = null;
	$fila[] = array("tipo"=>"desglose", "id"=>$v['ConveniosCategoria']['id'], "update"=>"desglose1", "imagen"=>array("nombre"=>"historicos.gif", "alt"=>"Historicos"), "url"=>'historicos');
	$fila[] = array("model"=>"ConveniosCategoria", "field"=>"id", "valor"=>$v['ConveniosCategoria']['id'], "write"=>$v['ConveniosCategoria']['write'], "delete"=>$v['ConveniosCategoria']['delete']);
	$fila[] = array("model"=>"Convenio", "field"=>"nombre", "valor"=>$v['Convenio']['nombre'], "nombreEncabezado"=>"Convenio");
	$fila[] = array("model"=>"ConveniosCategoria", "field"=>"nombre", "valor"=>$v['ConveniosCategoria']['nombre'], "nombreEncabezado"=>"Categoria");
	$fila[] = array("model"=>"ConveniosCategoria", "field"=>"costo", "valor"=>$v['ConveniosCategoria']['costo'], "tipoDato"=>"moneda");
	$fila[] = array("model"=>"ConveniosCategoria", "field"=>"jornada", "valor"=>$v['ConveniosCategoria']['jornada']);
	$fila[] = array("model"=>"ConveniosCategoria", "field"=>"observacion", "valor"=>$v['ConveniosCategoria']['observacion']);
	$cuerpo[] = $fila;
}

echo $this->renderElement("index/index", array("condiciones"=>$fieldset, "cuerpo"=>$cuerpo));

?>