<?php
/**
 * Este archivo contiene los datos de un fixture para los casos de prueba.
 *
 * PHP versions 5
 *
 * @filesource
 * @copyright		Copyright 2007-2008, Pragmatia de RPB S.A.
 * @link			http://www.pragmatia.com
 * @package			pragtico
 * @subpackage		app.tests.fixtures
 * @since			Pragtico v 1.0.0
 * @version			$Revision: 54 $
 * @modifiedby		$LastChangedBy: mradosta $
 * @lastmodified	$Date: 2008-10-23 23:14:28 -0300 (Thu, 23 Oct 2008) $
 * @author      	Martin Radosta <mradosta@pragmatia.com>
 */
/**
 * La clase para un fixture para un caso de prueba.
 *
 * @package app.tests
 * @subpackage app.tests.fixtures
 */
class RolesAccionFixture extends CakeTestFixture {


/**
 * El nombre de este Fixture.
 *
 * @var array
 * @access public
 */
    var $name = 'RolesAccion';


/**
 * La definicion de la tabla.
 *
 * @var array
 * @access public
 */
    var $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => '', 'length' => '11', 'key' => 'primary'),
        'rol_id' => array('type' => 'integer', 'null' => false, 'default' => '', 'length' => '11', 'key' => 'index'),
        'accion_id' => array('type' => 'integer', 'null' => false, 'default' => '', 'length' => '11'),
        'estado' => array('type' => 'string', 'null' => false, 'default' => 'Activo', 'length' => '9'),
        'created' => array('type' => 'datetime', 'null' => false),
        'modified' => array('type' => 'datetime', 'null' => false),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => '', 'length' => '11', 'key' => 'index'),
        'role_id' => array('type' => 'integer', 'null' => false, 'default' => '', 'length' => '11', 'key' => 'index'),
        'group_id' => array('type' => 'integer', 'null' => false, 'default' => '', 'length' => '11', 'key' => 'index'),
        'permissions' => array('type' => 'integer', 'null' => false, 'default' => '', 'length' => '11', 'key' => 'index'),
    );


/**
 * Los registros.
 *
 * @var array
 * @access public
 */
    var $records = array(
        array(
            'id' => '19',
            'rol_id' => '1',
            'accion_id' => '264',
            'estado' => 'Activo',
            'created' => '2008-10-26 19:51:29',
            'modified' => '2008-10-26 19:51:29',
            'user_id' => '1',
            'role_id' => '1',
            'group_id' => '0',
            'permissions' => '496',
        ),
        array(
            'id' => '20',
            'rol_id' => '1',
            'accion_id' => '265',
            'estado' => 'Activo',
            'created' => '2008-10-26 19:51:29',
            'modified' => '2008-10-26 19:51:29',
            'user_id' => '1',
            'role_id' => '1',
            'group_id' => '0',
            'permissions' => '496',
        ),
        array(
            'id' => '21',
            'rol_id' => '1',
            'accion_id' => '266',
            'estado' => 'Activo',
            'created' => '2008-10-26 19:51:29',
            'modified' => '2008-10-26 19:51:29',
            'user_id' => '1',
            'role_id' => '1',
            'group_id' => '0',
            'permissions' => '496',
        ),
        array(
            'id' => '22',
            'rol_id' => '1',
            'accion_id' => '268',
            'estado' => 'Activo',
            'created' => '2008-10-26 19:51:29',
            'modified' => '2008-10-26 19:51:29',
            'user_id' => '1',
            'role_id' => '1',
            'group_id' => '0',
            'permissions' => '496',
        ),
        array(
            'id' => '23',
            'rol_id' => '1',
            'accion_id' => '269',
            'estado' => 'Activo',
            'created' => '2008-10-26 19:51:29',
            'modified' => '2008-10-26 19:51:29',
            'user_id' => '1',
            'role_id' => '1',
            'group_id' => '0',
            'permissions' => '496',
        ),
        array(
            'id' => '24',
            'rol_id' => '1',
            'accion_id' => '151',
            'estado' => 'Activo',
            'created' => '2008-10-26 19:51:29',
            'modified' => '2008-10-26 19:51:29',
            'user_id' => '1',
            'role_id' => '1',
            'group_id' => '0',
            'permissions' => '496',
        ),
    );
}

?>