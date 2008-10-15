<?php
/**
 * Este archivo contiene toda la logica de negocio asociada a las actividades.
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
 * La clase encapsula la logica de negocio asociada a las actividades.
 *
 * Se refiere a las actividades propuestas por AFIP en SIAP.
 * Contiene tanto las actividades para Trabajadores como para Empleadores.
 *
 * @package		pragtico
 * @subpackage	app.controllers
 */
class ActividadesController extends AppController {


	function index() {
		/**
		* Si es una lov, es porque esta buscando desde la lov, entonces, en funcion de si busca
		* actividades del trabajador o del empleador se lo doy filtrado.
		*/
		if(!empty($this->params['named']['layout']) && $this->params['named']['layout'] == "lov") {
			if($this->params['named']['retornarA'] == "EmpleadorActividadId") {
				$this->data['Condicion']['Actividad-tipo'] = "Empleador";
			}
			elseif($this->params['named']['retornarA'] == "RelacionActividadId") {
				$this->data['Condicion']['Actividad-tipo'] = "Trabajador";
			}
		}
		parent::index();
	}

}
?>