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
$campos['PagosForma.id'] = array();
$campos['PagosForma.pago_monto'] = array("type"=>"hidden");
$campos['PagosForma.pago_acumulado'] = array("type"=>"hidden");
$campos['PagosForma.pago_id'] = array(	"label"=>"Pago",
											"lov"=>array("controller"	=>	"pagos",
													"seleccionMultiple"	=> 	0,
														"camposRetorno"	=>	array(	"Pago.fecha",
																					"Pago.monto")));
$campos['PagosForma.fecha'] = array();
if(count($formas) == 1) {
	$campos['PagosForma.forma'] = array("options"=>$formas, "value"=>$formas[key($formas)]);
}
else {
	$campos['PagosForma.forma'] = array("options"=>$formas);
}
$campos['PagosForma.monto'] = array();
$campos['PagosForma.observacion'] = array();
$fieldsets[] = array('campos' => $campos);

$campos = null;
$campos['PagosForma.empleador_id'] =  array(		"lov"	=>array("controller"		=> 	"empleadores",
																"seleccionMultiple"	=> 	0,
																"camposRetorno"		=> 	array(	"Empleador.cuit",
																								"Empleador.nombre")));
$campos['PagosForma.cuenta_id'] = array("label"=>"Cuenta", "type"=>"relacionado", "relacion"=>"PagosForma.empleador_id", "url"=>"pagos/cuentas_relacionado");

$campos['PagosForma.cheque_numero'] = array("after"=>$formulario->image('cheques.gif', array("class"=>"after", "id"=>"buscarUltimoNumero", 'alt' => "Buscar ultimo numero de cheque")));
$campos['PagosForma.fecha_pago'] = array();
$fieldsets[] = array('campos' => $campos, "opciones"=>array('fieldset' => array("id"=>"chequeFieldSet", "legend"=>"Cheque", 'imagen' => 'cheques.gif')));


$campos = null;
$campos['PagosForma.cbu_numero'] =  array();
$fieldsets[] = array('campos' => $campos, "opciones"=>array('fieldset' => array("id"=>"depositoFieldSet", "legend"=>"Deposito en Cuenta", 'imagen' => 'pagos.gif')));


$fieldset = $formulario->pintarFieldsets($fieldsets, array("div"=>array("class"=>"unica"), "fieldset"=>array("legend"=>"Forma de Pago", 'imagen' => 'pagos_formas.gif')));

/**
* Pinto el element add con todos los fieldsets que he definido.
*/
echo $this->element('add/add', array('fieldset' => $fieldset));

$js = "
	jQuery('#buscarUltimoNumero').bind('click',
		function() {
			var cuentaId = jQuery('#PagosFormaCuentaId').attr('value');
			if(cuentaId == 0) {
				alert('Debe seleccionar la cuenta desde la que se emitira el cheque.');
			}
			else {
				jQuery.ajax({
					type: 'GET',
					async: false,
					url: '" . Router::url("/") . "pagos_formas/buscar_ultimo_numero_cheque/' + cuentaId,
					success: function(html){
						jQuery('#PagosFormaChequeNumero').attr('value', html);
					}
				});
			}
		}
	);
	
	
	jQuery('#chequeFieldSet').hide();
	jQuery('#depositoFieldSet').hide();

	if(jQuery('#PagosFormaFormaDeposito').attr('checked') == true) {
		jQuery('#depositoFieldSet').show();
	}
	else if(jQuery('#PagosFormaFormaCheque').attr('checked') == true) {
		jQuery('#chequeFieldSet').show();
	}

	jQuery('input:radio').bind('click',
		function() {
			jQuery('#chequeFieldSet').hide();
			jQuery('#depositoFieldSet').hide();
		});
		
	jQuery('#PagosFormaFormaDeposito').bind('click',
		function() {
			jQuery('#depositoFieldSet').show();
		});
		
	jQuery('#PagosFormaFormaCheque').bind('click',
		function() {
			jQuery('#chequeFieldSet').show();
		});
";
$formulario->addScript($js);
?>