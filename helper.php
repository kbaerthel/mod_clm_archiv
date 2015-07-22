<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

class modCLM_ArchivHelper
{
	public static function getLink(&$params)
	{
	global $mainframe;
	$db			= JFactory::getDBO();
	//$sid			= JRequest::getVar( 'saison');
	$sid		= JRequest::getInt( 'saison', 1);

	$query = "SELECT  a.sid, a.id, a.name, a.runden, a.durchgang "
		."\n FROM #__clm_liga as a"
		."\n LEFT JOIN #__clm_saison as s ON s.id = a.sid "
		."\n WHERE a.published = 1"
		."\n AND s.published = 1"
		."\n AND s.archiv  = 1 "
		." AND a.sid  = ".$sid
		."\n ORDER BY a.sid DESC,a.ordering ASC, a.id ASC "
		;
	$db->setQuery( $query );
	$link = $db->loadObjectList();;

	return $link;
	}

	public static function getCount(&$params)
	{
	global $mainframe;
	$db			= JFactory::getDBO();

	$query = "SELECT COUNT(a.id) as id "
		."\n FROM #__clm_liga as a"
		."\n LEFT JOIN #__clm_saison as s ON s.id = a.sid "
		."\n WHERE a.published = 1"
		."\n AND s.archiv  = 0"
		;
	$db->setQuery( $query );
	$count = $db->loadObjectList();;

	return $count;
	}

	public static function getSaison(&$params)
	{
	global $mainframe;
	$db			= JFactory::getDBO();

	$query = "SELECT  a.id, a.name "
		."\n FROM #__clm_saison as a "
		."\n WHERE a.published = 1"
		."\n AND a.archiv  = 1"
		."\n ORDER BY a.id DESC "
		;
	$db->setQuery( $query );
	$saison = $db->loadObjectList();;

	return $saison;
	}

}
 