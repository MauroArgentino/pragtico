<?php
/* SVN FILE: $Id: cache.group.php 7094 2008-06-02 19:22:55Z AD7six $ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) Tests <https://trac.cakephp.org/wiki/Developement/TestSuite>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 *  Licensed under The Open Group Test Suite License
 *  Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				https://trac.cakephp.org/wiki/Developement/TestSuite CakePHP(tm) Tests
 * @package			cake.tests
 * @subpackage		cake.tests.groups
 * @since			CakePHP(tm) v 1.2.0.4206
 * @version			$Revision: 7094 $
 * @modifiedby		$LastChangedBy: AD7six $
 * @lastmodified	$Date: 2008-06-02 16:22:55 -0300 (Mon, 02 Jun 2008) $
 * @license			http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
/** AllCacheEngines
 *
 * This test group will run all the Cache class test and all core cache engine tests
 *
 * @package    cake.tests
 * @subpackage cake.tests.groups
 */
/**
 * AllCacheEnginesGroupTest class
 * 
 * @package              cake
 * @subpackage           cake.tests.groups
 */
class AllCacheEnginesGroupTest extends GroupTest {
/**
 * label property
 * 
 * @var string 'All core cache engines'
 * @access public
 */
	var $label = 'All core cache engines';
/**
 * AllCacheEnginesGroupTest method
 * 
 * @access public
 * @return void
 */
	function AllCacheEnginesGroupTest() {
		TestManager::addTestFile($this, CORE_TEST_CASES . DS . 'libs' . DS . 'cache');
		TestManager::addTestCasesFromDirectory($this, CORE_TEST_CASES . DS . 'libs' . DS . 'cache');
	}
}
?>
