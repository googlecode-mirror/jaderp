<?php
/**
 * Hello World default controller
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:components/
 * @license		GNU/GPL
 */

jimport('joomla.application.component.controller');

/**
 * Hello World Component Controller
 *
 * @package		HelloWorld
 */
class JaderpController extends JController
{
	function __construct()
	{
	    parent::__construct();
	 
	    // Register Extra tasks
	    $this->registerTask( 'desktop','Desktop');
	    $this->registerTask( 'workers','Workers');
	}

	/**
	 * Method to display the view
	 *
	 * @access	public
	 */
	function display()
	{
		require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'includes'.DS.'jaderp_tools.php');
		$JAdERPTool=& new JAdERPTools;
		$user =& JFactory::getUser();
		$language =& JFactory::getLanguage();
		$language->load('com_jaderp');
		if($user->get('id'))
		{
			$uid=$user->id;
			$access_level = $JAdERPTool->UserAccessLevel($uid,'com_jaderp','hello','default');
			if(!$access_level)
			{
				jimport('joomla.application.component.controller');
				echo 'the default action';
				$msg= JText::_('YOU_DONT_HAVE_PERMISSION');
				JController::setRedirect(JRoute::_('index.php?option=com_jaderp&task=desktop'), $msg, 'notice');
				return;
			}
			//echo $user->get('id');
			parent::display();
		}
		else 
		{
			$msg= JText::_('YOU_MUST_CONNECT');
			$this->setRedirect(JRoute::_('index.php?option=com_user&view=login'), $msg, 'notice');
		}		
	}
	function Desktop()
	{
		$user =& JFactory::getUser();
		$language =& JFactory::getLanguage();
		$language->load('com_jaderp');
		// Create the view
		$view = & $this->getView('desktop', 'html');

		// Get/Create the model
		$model = & $this->getModel('Desktop');
		$view->setModel($model, true);

		if($user->get('id'))
		{
			//echo $user->get('id');
			$view->display();
		}
		else 
		{
			$msg= JText::_('YOU_MUST_CONNECT');
			$this->setRedirect(JRoute::_('index.php?option=com_user&view=login'), $msg, 'notice');
		}		
	}

	function Workers()
	{
		$user =& JFactory::getUser();
		$language =& JFactory::getLanguage();
		$language->load('com_jaderp');
		// Create the view
		$view = & $this->getView('workers', 'html');

		// Get/Create the model
		$model = & $this->getModel('Workers');
		$view->setModel($model, true);

		if($user->get('id'))
		{
			//echo $user->get('id');
			$view->display();
		}
		else 
		{
			$msg= JText::_('YOU_MUST_CONNECT');
			$this->setRedirect(JRoute::_('index.php?option=com_user&view=login'), $msg, 'notice');
		}		
	}
}
?>
