<?php
/**
 * Este archivo contiene toda la logica de acceso a datos asociada a los posibles valores que puede tener una preferencia.
 *
 * PHP versions 5
 *
 * @filesource
 * @copyright       Copyright 2007-2009, Pragmatia
 * @link            http://www.pragmatia.com
 * @package         pragtico
 * @subpackage      app.models
 * @since           Pragtico v 1.0.0
 * @version         $Revision$
 * @modifiedby      $LastChangedBy$
 * @lastmodified    $Date$
 * @author          Martin Radosta <mradosta@pragmatia.com>
 */
/**
 * La clase encapsula la logica de acceso a datos asociada asociada a los posibles valores que puede tener una preferencia.
 *
 * @package     pragtico
 * @subpackage  app.models
 */
class PreferenciasValor extends AppModel {

	var $permissions = array('permissions' => 508, 'group' => 'none', 'role' => 'higher');
	
	var $validate = array( 
        'valor' => array(
			array(
				'rule'		=> VALID_NOT_EMPTY,
				'message'	=> 'Debe ingresar el valor de la preferencia.')
			),
        'preferencia_id' => array(
			array(
				'rule'	=> VALID_NOT_EMPTY,
				'message'	=> 'Debe seleccionar la preferencia.')
        )        
	);

	var $belongsTo = array('Preferencia' =>
                        array('className'    => 'Preferencia',
                              'foreignKey'   => 'preferencia_id'));


}
?>
