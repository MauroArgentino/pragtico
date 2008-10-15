<?php
/**
 * Este archivo contiene toda la logica de negocio asociada a los recibos.
 *
 * PHP versions 5
 *
 * @filesource
 * @copyright		Copyright 2007-2008, Pragmatia de RPB S.A.
 * @link			http://www.pragmatia.com
 * @package			pragtico
 * @subpackage		app.controllers
 * @since			Pragtico v 1.0.0
 * @version			1.0.0
 * @author      	Martin Radosta <mradosta@pragmatia.com>
 */
/**
 * La clase encapsula la logica de negocio asociada a los recibos.
 *
 * @package		pragtico
 * @subpackage	app.controllers
 */
class RecibosController extends AppController {


/**
 * detalles.
 * Muestra via desglose los conceptos de un recibo.
 */
	function conceptos($id) {
		$this->Recibo->contain(array("RecibosConcepto", "RecibosConcepto.Concepto"));
		$this->data = $this->Recibo->read(null, $id);
	}


}
?>