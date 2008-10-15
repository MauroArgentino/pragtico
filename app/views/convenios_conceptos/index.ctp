<?php

/**
* Especifico los campos para ingresar las condiciones.
*/
$condiciones['Condicion.ConveniosConcepto-convenio_id'] = array("lov"=>array("controller"	=>	"convenios",
															"camposRetorno"	=>array("Convenio.numero",
																					"Convenio.nombre")));
$condiciones['Condicion.Concepto-codigo'] = array();
$condiciones['Condicion.Concepto-nombre'] = array();
$condiciones['Condicion.Concepto-tipo'] = array();
$fieldsets[] = array("campos"=>$condiciones);
$fieldset = $formulario->pintarFieldsets($fieldsets, array("div"=>array("class"=>"unica"), "fieldset"=>array("legend"=>"Conceptos de los Convenios Colectivos", "imagen"=>"buscar.gif")));


/**
* Creo el cuerpo de la tabla.
*/
$cuerpo = null;
foreach ($registros as $k=>$v) {
	$fila = null;
	$fila[] = array("model"=>"ConveniosConcepto", "field"=>"id", "valor"=>$v['ConveniosConcepto']['id'], "write"=>$v['ConveniosConcepto']['write'], "delete"=>$v['ConveniosConcepto']['delete']);
	$fila[] = array("model"=>"Convenio", "field"=>"nombre", "nombreEncabezado"=>"Convenio", "valor"=>$v['Convenio']['nombre']);
	$fila[] = array("model"=>"Concepto", "field"=>"codigo", "valor"=>$v['Concepto']['codigo']);
	$fila[] = array("model"=>"Concepto", "field"=>"nombre", "nombreEncabezado"=>"Concepto", "valor"=>$v['Concepto']['nombre']);
	$fila[] = array("model"=>"ConveniosConcepto", "field"=>"formula", "valor"=>$v['ConveniosConcepto']['formula']);
	$cuerpo[] = $fila;
}

echo $this->renderElement("index/index", array("condiciones"=>$fieldset, "cuerpo"=>$cuerpo));

?>