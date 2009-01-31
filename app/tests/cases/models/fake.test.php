<?php
/**
 * Este archivo contiene un model generico (fake) para los casos de pruebas.
 *
 * PHP versions 5
 *
 * @filesource
 * @copyright       Copyright 2007-2009, Pragmatia
 * @link            http://www.pragmatia.com
 * @package         pragtico
 * @subpackage      app.tests.models
 * @since           Pragtico v 1.0.0
 * @version         $Revision: 54 $
 * @modifiedby      $LastChangedBy: mradosta $
 * @lastmodified    $Date: 2008-10-23 23:14:28 -0300 (Thu, 23 Oct 2008) $
 * @author          Martin Radosta <mradosta@pragmatia.com>
 */
 
 require_once(APP . 'app_model.php');
 
class FakeModel extends AppModel {
	
	var $name = 'FakeTestModel';
	var $useTable = 'fakes';
	var $useDbConfig = 'test';
} 


/**
 * La clase para un para un caso de prueba generico (fake).
 *
 * @package app.tests.models
 * @subpackage app.tests.models
 */
class FakeTest extends CakeTestModel {

/**
 * Indico que use la conexion de prueba (test).
 *
 * @var string
 * @access public
 */
	var $useDbConfig = 'test_suite';

	
/**
 * Indico el nombre de la tabla (fisica) que debe utilizar.
 *
 * @var array
 * @access public
 */
	var $useTable = 'fake_test_fixtures';
	
	
	
	function startTest() {
		$this->FakeTest = new FakeTest(); 
	}

}
?>