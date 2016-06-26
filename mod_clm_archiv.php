<?php

// no direct access
defined('_JEXEC') or die('Restricted access');
if(!defined("DS")){define('DS', DIRECTORY_SEPARATOR);} // fix for Joomla 3.2
// angemeldet
require_once (dirname(__FILE__).DS.'helper.php');

$link = modCLM_ArchivHelper::getLink($params);
$count = modCLM_ArchivHelper::getCount($params);
$saison = modCLM_ArchivHelper::getSaison($params);
$runden = modCLM_ArchivHelper::getRunde($params);

require(JModuleHelper::getLayoutPath('mod_clm_archiv'));


