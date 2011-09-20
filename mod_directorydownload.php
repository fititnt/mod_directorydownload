<?php
/*
 * @package         mod_directorydownload
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - @fititnt -  http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GPL3
 */
// no direct access
defined('_JEXEC') or die;

// Include helper.php once
require_once dirname(__FILE__).'/helper.php';

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx', NULL));
$modbefore = htmlspecialchars_decode(($params->get('modbefore','')));
$modafter = htmlspecialchars_decode(($params->get('modafter','')));



require JModuleHelper::getLayoutPath('mod_directorydownload', 'default');


