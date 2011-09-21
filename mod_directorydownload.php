<?php
/*
 * @package         mod_directorydownload
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GNU General Public License version 3. See license.txt
 */
// no direct access
defined('_JEXEC') or die;

// Include helper.php once
require_once dirname(__FILE__).'/helper.php';

$DirectoryDownload = new DirectoryDownload;
$dd = $DirectoryDownload->getFiles($params->get('path',''));

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx', NULL));
$modbefore = htmlspecialchars_decode(($params->get('modbefore','')));
$modafter = htmlspecialchars_decode(($params->get('modafter','')));

$tablerowprefix = htmlspecialchars($params->get('tablerowprefix', 'cat-list-row'));

require JModuleHelper::getLayoutPath('mod_directorydownload', $params->get('modulelayout','default') );
