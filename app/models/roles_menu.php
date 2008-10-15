<?php
/**
 * Este archivo contiene toda la logica de acceso a datos asociada a la relacion entre roles y menus.
 *
 * PHP versions 5
 *
 * @filesource
 * @copyright		Copyright 2007-2008, Pragmatia de RPB S.A.
 * @link			http://www.pragmatia.com
 * @package			pragtico
 * @subpackage		app.models
 * @since			Pragtico v 1.0.0
 * @version			1.0.0
 * @author      	Martin Radosta <mradosta@pragmatia.com>
 */
/**
 * La clase encapsula la logica de acceso a datos asociada a la relacion entre roles y menus.
 *
 * @package		pragtico
 * @subpackage	app.models
 */
class RolesMenu extends AppModel {

	var $belongsTo = array(	'Rol' =>
                        array('className'    => 'Rol',
                              'foreignKey'   => 'rol_id'),
							'Menu' =>
                        array('className'    => 'Menu',
                              'foreignKey'   => 'menu_id'));

}
?>