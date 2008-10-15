<?php
/* SVN FILE: $Id: missing_helper_class.ctp 7062 2008-05-30 11:29:53Z nate $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.view.templates.errors
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 7062 $
 * @modifiedby		$LastChangedBy: nate $
 * @lastmodified	$Date: 2008-05-30 08:29:53 -0300 (Fri, 30 May 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<h2><?php __('Missing Helper Class'); ?></h2>
<p class="error">
	<strong><?php __('Error'); ?>: </strong>
	<?php echo sprintf(__("The helper class <em>%s</em> can not be found or does not exist.", true), $helperClass);?>
</p>
<p  class="error">
	<strong><?php __('Error'); ?>: </strong>
	<?php echo sprintf(__('Create the class below in file: %s', true), APP_DIR.DS."views".DS."helpers".DS.$file);?>
</p>
<pre>
&lt;?php
class <?php echo $helperClass;?> extends AppHelper {

}
?&gt;
</pre>
<p class="notice">
	<strong><?php __('Notice'); ?>: </strong>
	<?php echo sprintf(__('If you want to customize this error message, create %s', true), APP_DIR.DS."views".DS."errors".DS."missing_helper_class.ctp");?>
</p>