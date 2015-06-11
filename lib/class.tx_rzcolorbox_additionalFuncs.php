<?php

/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Raphael Zschorsch <rafu1987@gmail.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

class tx_rzcolorbox_additionalFuncs {

    function typeselect($params) {
        global $LANG;
        $LL = $this->includeLocalLang();

        // Get the extConf values
        $this->extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['rzcolorbox']);
        $allowHtml = $this->extConf['allowHtml'];

        $params['items']['iframe'] = array($LANG->getLLL('rzcolorbox.pi_flexform.iframe_select', $LL), "iframe");
        $params['items']['inline'] = array($LANG->getLLL('rzcolorbox.pi_flexform.inline_select', $LL), "inline");

        if ($allowHtml == 1) {
            $params['items']['html'] = array($LANG->getLLL('rzcolorbox.pi_flexform.html_select', $LL), "html");
        }
    }

    // Include LocalLang         
    function includeLocalLang() {
        $LOCAL_LANG = \TYPO3\CMS\Core\Utility\GeneralUtility::readLLfile(
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('rzcolorbox').'locallang_tca.xml',
        $GLOBALS['LANG']->lang);


        return $LOCAL_LANG;
    }

}

if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS']['XCLASS']['ext/rzcolorbox/lib/class.tx_rzcolorbox_additionalFuncs.php']) {
    include_once($GLOBALS['TYPO3_CONF_VARS']['XCLASS']['ext/rzcolorbox/lib/class.tx_rzcolorbox_additionalFuncs.php']);
}
?>