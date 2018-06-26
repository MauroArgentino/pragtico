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
$campos['ConveniosConcepto.id'] = array();
$campos['ConveniosConcepto.convenio_id'] = array(
	'lov'		=> array(
		'controller'		=> 'convenios',
		'seleccionMultiple'	=> 	0,
		'camposRetorno'		=>	array('Convenio.numero', 'Convenio.nombre')
	)
);
$campos['ConveniosConcepto.concepto_id'] = array(
	'lov'		=>array(
		'controller'		=> 'conceptos',
		'seleccionMultiple'	=> 	0,
		'camposRetorno'		=>	array('Concepto.codigo', 'Concepto.nombre')
	)
);
$campos['ConveniosConcepto.desde'] = array();
$campos['ConveniosConcepto.hasta'] = array();
$campos['ConveniosConcepto.formula'] = array();
$campos['ConveniosConcepto.nombre_formula'] = array('aclaracion' => 'Utilizara este valor en las impresiones.');
$campos['ConveniosConcepto.cantidad'] = array('aclaracion' => 'Indica desde que variable se sacara la cantidad que se mostrara');

$campos['ConveniosConcepto.observacion'] = array();

$fieldset = $appForm->pintarFieldsets(array(array('campos' => $campos)), array(
	'div' 		=> array('class' => 'unica'),
	'fieldset' 	=> array(
		'legend' => 'concepto del convenio colectivo',
		'imagen' => 'conceptos.gif')
	)
);

/**
* Pinto el element add con todos los fieldsets que he definido.
*/
echo $this->element('add/add', array('fieldset' => $fieldset));
?>