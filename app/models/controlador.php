<?php
/**
 * Este archivo contiene toda la logica de acceso a datos asociada a los controladores.
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
 * La clase encapsula la logica de acceso a datos asociada a los controladores.
 *
 * Se refiere a los controllers del framework cakephp.
 *
 * @package		pragtico
 * @subpackage	app.models
 */
class Controlador extends AppModel {

	var $order = array('Controlador.nombre'=>'asc');

	var $validate = array(
        'nombre' => array(
			array(
				'rule'	=> VALID_NOT_EMPTY, 
				'message'	=>'Debe especificar el nombre del controlador.')
        )
	);

	var $hasMany = array(	'Accion' =>
                        array('className'    => 'Accion',
                              'foreignKey'   => 'controlador_id'));

}
?>