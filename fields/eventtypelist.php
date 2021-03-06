<?php
/*------------------------------------------------------------------------
# mod_civicrm_events - CiviCRM Events Module
# ------------------------------------------------------------------------
# author Artd Webdesign GmbH
# copyright Copyright (C) artd.ch. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.artd.ch
# Technical Support:  http://www.artd.ch
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldEventTypeList extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'EventTypeList';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	1.6
	 */
	public function getOptions()
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT value ,label AS text'
			. ' FROM civicrm_option_value'
			. ' WHERE option_group_id=14'
			. ' ORDER BY label'
		;
		$db->setQuery($query);
		$options = $db->loadObjectList();
		
		if (!$this->multiple) {
			array_unshift($options, JHTML::_('select.option', '' , JText::_('MOD_CIVICRM_EVENTS_SELECT_EVENT')));
		}

		return $options;
	}
}
