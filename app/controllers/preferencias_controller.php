<?php
/**
 * Este archivo contiene toda la logica de negocio asociada a las preferencias del sistema.
 * Las preferencias son las opciones del sistema que puede personalizar el usuario.
 *
 * PHP versions 5
 *
 * @filesource
 * @copyright       Copyright 2007-2009, Pragmatia
 * @link            http://www.pragmatia.com
 * @package         pragtico
 * @subpackage      app.controllers
 * @since           Pragtico v 1.0.0
 * @version         $Revision$
 * @modifiedby      $LastChangedBy$
 * @lastmodified    $Date$
 * @author          Martin Radosta <mradosta@pragmatia.com>
 */
/**
 * La clase encapsula la logica de negocio asociada a las preferencias del sistema.
 *
 *
 * @package     pragtico
 * @subpackage  app.controllers
 */
class PreferenciasController extends AppController {


/**
 * valores.
 * Muestra via desglose los valores que puede asumir la preferencia.
 */
	function valores($id) {
		$this->data = $this->Preferencia->read(null, $id);
	}


}
?>