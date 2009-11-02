<?php
/* SVN FILE: $Id: inflections.php 5118 2007-05-18 17:19:53Z phpnut $ */
/**
 * Custom Inflected Words.
 *
 * This file is used to hold words that are not matched in the normail Inflector::pluralize() and
 * Inflector::singularize()
 *
 * PHP versions 4 and %
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2007, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2007, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.app.config
 * @since			CakePHP(tm) v 1.0.0.2312
 * @version			$Revision: 5118 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-05-18 12:19:53 -0500 (Fri, 18 May 2007) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * This is a key => value array of regex used to match words.
 * If key matches then the value is returned.
 *
 *  $pluralRules = array('/(s)tatus$/i' => '\1\2tatuses', '/^(ox)$/i' => '\1\2en', '/([m|l])ouse$/i' => '\1ice');
 */
	$pluralRules = array(	'/(.d)$/i' => '\1\2es',
							'/(.n)$/i' => '\1\2es',
							'/(.l)$/i' => '\1\2es',
							'/(.r)$/i' => '\1\2es');
	
/**
 * This is a key only array of plural words that should not be inflected.
 * Notice the last comma
 *
 * $uninflectedPlural = array('.*[nrlm]ese', '.*deer', '.*fish', '.*measles', '.*ois', '.*pox');
 */
	$uninflectedPlural = array('suss');
/**
 * This is a key => value array of plural irregular words.
 * If key matches then the value is returned.
 *
 *  $irregularPlural = array('atlas' => 'atlases', 'beef' => 'beefs', 'brother' => 'brothers')
 */
	$irregularPlural = array(
                                'zone'                      => 'zones',
								'actividad'					=> 'actividades',
								'novedad'					=> 'novedades',
								'empleador'					=> 'empleadores',
								'localidad'					=> 'localidades',
								'trabajador'				=> 'trabajadores',
								'condicion'					=> 'condiciones',
								'controlador'				=> 'controladores',
								'variable'					=> 'variables',
								'coeficiente'				=> 'coeficientes',
								'relacion'					=> 'relaciones',
								'rol'						=> 'roles',
								'vacacion'					=> 'vacaciones',
								'liquidacion'				=> 'liquidaciones',
								'modalidad'					=> 'modalidades',
								'situacion'					=> 'situaciones',
								'sucursal'					=> 'sucursales',
								'accion'					=> 'acciones'
							);
/**
 * This is a key => value array of regex used to match words.
 * If key matches then the value is returned.
 *
 *  $singularRules = array('/(s)tatuses$/i' => '\1\2tatus', '/(matr)ices$/i' =>'\1ix','/(vert|ind)ices$/i')
 */
 	$singularRules = array(	'/(.)res$/i' => '\1\2r',
 							'/(.)nes$/i' => '\1\2n',
                            '/(.)riales$/i' => '\1\2rial',
 							'/(.)ciales$/i' => '\1\2cial',);
 	
/**
 * This is a key only array of singular words that should not be inflected.
 * You should not have to change this value below if you do change it use same format
 * as the $uninflectedPlural above.
 */
	$uninflectedSingular = $uninflectedPlural;
/**
 * This is a key => value array of singular irregular words.
 * Most of the time this will be a reverse of the above $irregularPlural array
 * You should not have to change this value below if you do change it use same format
 *
 * $irregularSingular = array('atlases' => 'atlas', 'beefs' => 'beef', 'brothers' => 'brother')
 */
	$irregularSingular = array_flip($irregularPlural);
?>