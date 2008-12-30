<?php
/**
 * Este archivo contiene toda la logica de acceso a datos asociada al Suss.
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
 * La clase encapsula la logica de acceso a datos asociada al Suss.
 *
 * @package     pragtico
 * @subpackage  app.models
 */
class Suss extends AppModel {

	var $order = array('Suss.fecha' => 'desc');

	var $validate = array(
        'empleador_id__' => array(
				'rule'	=> VALID_NOT_EMPTY,
				'message'	=>'Debe seleccionar un empleador.'),
        'periodo' => array(
			array(
				'rule'	=> '/^(20\d\d)(0[1-9]|1[012])$/', 
				'message'	=>'Debe especificar un periodo valido.'),
			array(
				'rule'	=> VALID_NOT_EMPTY, 
				'message'	=>'Debe especificar una periodo.')
        ),
        'fecha' => array(
			array(
				'rule'	=> VALID_DATE, 
				'message'	=>'Debe especificar una fecha valida.'),
			array(
				'rule'	=> VALID_NOT_EMPTY, 
				'message'	=>'Debe especificar una fecha.')
        ),
        'banco_id' => array(
			array(
				'rule'	=> VALID_NOT_EMPTY, 
				'message'	=>'Debe seleccionar el banco.')
        )        
	);

	var $belongsTo = array(	'Banco' =>
                        array('className'    => 'Banco',
                              'foreignKey'   => 'banco_id'),
                            'Empleador' =>
                        array('className'    => 'Empleador',
                              'foreignKey'   => 'empleador_id'));

}
?>