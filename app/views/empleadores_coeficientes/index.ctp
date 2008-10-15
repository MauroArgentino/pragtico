<?php
/**
* Especifico los campos para ingresar las condiciones.
*/
$condiciones['Condicion.Relacion-empleador_id'] = array(	"lov"=>array("controller"	=>	"empleadores",
																		"camposRetorno"	=>array("Empleador.cuit",
																								"Empleador.nombre")));
$condiciones['Condicion.Coeficiente-nombre'] = array();
$condiciones['Condicion.Coeficiente-tipo'] = array();
$fieldsets[] = array("campos"=>$condiciones);
$fieldset = $formulario->pintarFieldsets($fieldsets, array("fieldset"=>array("legend"=>"Coeficientes de los Empleadores", "imagen"=>"coeficientes.gif")));


/**
* Creo el cuerpo de la tabla.
*/
$cuerpo = null;
foreach ($registros as $k=>$v) {
	$fila = null;
	$fila[] = array("model"=>"EmpleadoresCoeficiente", "field"=>"id", "valor"=>$v['EmpleadoresCoeficiente']['id'], "write"=>$v['EmpleadoresCoeficiente']['write'], "delete"=>$v['EmpleadoresCoeficiente']['delete']);
	$fila[] = array("model"=>"Empleador", "field"=>"nombre", "nombreEncabezado"=>"Empleador", "valor"=>$v['Empleador']['cuit'] . " - " . $v['Empleador']['nombre']);
	$fila[] = array("model"=>"Coeficiente", "field"=>"nombre", "nombreEncabezado"=>"Coeficiente", "valor"=>$v['Coeficiente']['nombre']);
	$fila[] = array("model"=>"Coeficiente", "field"=>"tipo", "valor"=>$v['Coeficiente']['tipo']);
	$fila[] = array("model"=>"EmpleadoresCoeficiente", "field"=>"valor", "valor"=>$v['EmpleadoresCoeficiente']['valor']);
	$fila[] = array("model"=>"EmpleadoresCoeficiente", "field"=>"observacion", "valor"=>$v['EmpleadoresCoeficiente']['observacion']);
	$cuerpo[] = $fila;
}

echo $this->renderElement("index/index", array("condiciones"=>$fieldset, "cuerpo"=>$cuerpo));

?>