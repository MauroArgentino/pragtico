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
$condiciones['Condicion.Relacion-trabajador_id'] = array(	"lov"=>array("controller"		=>	"trabajadores",
																		"separadorRetorno"	=>	" ",
																		"camposRetorno"		=>array("Trabajador.apellido",
																									"Trabajador.nombre")));

$condiciones['Condicion.Relacion-empleador_id'] = array(	"lov"=>array("controller"	=> "empleadores",
																		"camposRetorno"	=> array("Empleador.nombre")));

$condiciones['Condicion.Relacion-id'] = array(	"label"	=> "Relacion",
												"lov"	=> array(	"controller"	=> "relaciones",
																	"camposRetorno"	=> array(	"Empleador.nombre",
																								"Trabajador.apellido")));
$condiciones['Condicion.Novedad-tipo'] = array("type"=>"checkboxMultiple");

$fieldsets[] = array("campos"=>$condiciones);
$fieldset = $formulario->pintarFieldsets($fieldsets, array("fieldset"=>array("legend"=>"novedades de la relacion laboral", "imagen"=>"novedades.gif")));


/**
* Creo el cuerpo de la tabla.
*/
$cuerpo = null;
foreach ($registros as $k=>$v) {
	$fila = null;
	$id = $v['Hora']['id'];
	$fila[] = array("model"=>"Hora", "field"=>"id", "valor"=>$v['Hora']['id'], "write"=>$v['Hora']['write'], "delete"=>$v['Hora']['delete']);
	$fila[] = array("model"=>"Empleador", "field"=>"nombre", "valor"=>$v['Relacion']['Empleador']['nombre'], "nombreEncabezado"=>"Empleador");
	$fila[] = array("model"=>"Trabajador", "field"=>"numero_documento", "valor"=>$v['Relacion']['Trabajador']['numero_documento'], "class"=>"derecha", "nombreEncabezado"=>"Documento");
	$fila[] = array("model"=>"Trabajador", "field"=>"apellido", "valor"=>$v['Relacion']['Trabajador']['apellido'] . " " . $v['Relacion']['Trabajador']['nombre'], "nombreEncabezado"=>"Trabajador");
	$fila[] = array("model"=>"Hora", "field"=>"periodo", "valor"=>$v['Hora']['periodo']);
	$fila[] = array("model"=>"Hora", "field"=>"cantidad", "valor"=>$v['Hora']['cantidad']);
	$fila[] = array("model"=>"Hora", "field"=>"tipo", "valor"=>$v['Hora']['tipo']);
	$fila[] = array("model"=>"Hora", "field"=>"estado", "valor"=>$v['Hora']['estado']);
	if($v['Hora']['estado'] == "Liquidada") {
		$cuerpo[] = array("contenido"=>$fila, "opciones"=>array("seleccionMultiple"=>false, "eliminar"=>false, "modificar"=>false));
	}
	else {
		$cuerpo[] = $fila;
	}
}
$accionesExtra[] = $formulario->link("Generar Planilla", null, array("title"=>"Genera las planillas para el ingreso masivo de horas", "class"=>"link_boton", "id"=>"botonGenerarPlanilla"));
$accionesExtra[] = $formulario->link("Importar Planilla", "importar_planilla", array("class"=>"link_boton", "title"=>"Importa las planillas de ingreso masivo de horas"));
echo $this->renderElement("index/index", array("condiciones"=>$fieldset, "cuerpo"=>$cuerpo, "accionesExtra"=>$accionesExtra));

$js = "
	jQuery('#botonGenerarPlanilla').bind('click', function() {
		jQuery('#form').attr('action', '" . router::url("/") . $this->params['controller'] . "/generar_planilla');
		jQuery('#accion').attr('value', 'generar_planilla');
		jQuery('#form').submit();
	});
";
$formulario->addScript($js);

?>