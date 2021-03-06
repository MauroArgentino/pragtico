<?php
/**
 * Este archivo contiene toda la logica de acceso a datos asociada a la relacion que existe
 * entre los empleadores y los conceptos.
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
 * La clase encapsula la logica de acceso a datos asociada a la relacion que existe
 * entre los empleadores y los conceptos.
 *
 * @package     pragtico
 * @subpackage  app.models
 */
class EmpleadoresConcepto extends AppModel {

    var $permissions = array('permissions' => 496, 'group' => 'default', 'role' => 'all');

    var $validate = array(
        'empleador_id' => array(
            array(
                'rule'      => VALID_NOT_EMPTY,
                'message'   => 'Debe seleccionar el empleador.')
        ),
        'concepto_id' => array(
            array(
                'rule'      => VALID_NOT_EMPTY,
                'message'   => 'Debe seleccionar el concepto.')
        ),
        'formula' => array(
            array(
                'rule'      => 'validFormulaStrings',
                'message'   => 'La formula utiliza valores de texto no encerrados entre comillas simples (\') y que tampoco han sido marcados como variable (#) o como concepto (@).'),
            array(
                'rule'      => 'validFormulaConcepts',
                'message'   => 'La formula utiliza conceptos que no existen en el sistema.'),
            array(
                'rule'      => 'validFormulaParenthesis',
                'message'   => 'La formula no abre y cierra la misma cantidad de parentesis.'),
            array(
                'rule'      => 'validFormulaBrackets',
                'message'   => 'La formula no abre y cierra la misma cantidad de corchetes.')
        )
    );


	/**
	* Establece modificaciones al comportamiento estandar de app_controller.php
	*/
	var $modificadores = array('index'=>array('contain'=>array('Concepto', 'Empleador')));
	
	var $belongsTo = array(	'Empleador' =>
                        array('className'    => 'Empleador',
                              'foreignKey'   => 'empleador_id'),
							'Concepto' =>
                        array('className'    => 'Concepto',
                              'foreignKey'   => 'concepto_id'));
    var $breadCrumb = array('format'    => '%s para %s',
                            'fields'    => array('Concepto.nombre', 'Empleador.nombre'));

}
?>
