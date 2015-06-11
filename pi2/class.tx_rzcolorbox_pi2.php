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


class tx_rzcolorbox_pi2 extends tslib_pibase {

    var $prefixId = 'tx_rzcolorbox_pi2';
    var $scriptRelPath = 'pi2/class.tx_rzcolorbox_pi2.php';
    var $extKey = 'rzcolorbox';
    var $pi_checkCHash = true;

    function main($content, $conf) {
        $this->conf = $conf;
        $this->pi_setPiVarDefaults();
        $this->pi_loadLL($content, $conf);

        // Read Flexform	
        $this->pi_initPIflexForm();
        $text = $this->getFlexform('text');
        $width = $this->getFlexform('width', 'options');
        $height = $this->getFlexform('height', 'options');
        $deactivate_width = $this->getFlexform('deactivate_width', 'options');
        $deactivate_height = $this->getFlexform('deactivate_height', 'options');
        $template_file = $this->getFlexform('template', 'options');
        $type = $this->getFlexform('type');
        $transition = $this->getFlexform('transition', 'options');
        $open = $this->getFlexform('open', 'options');
        $link = $this->getFlexform('iframe');
        $link_type = $this->getFlexform('linktext_type', 'options');
        $link_text = $this->getFlexform('linktext', 'options');
        $link_image = $this->getFlexform('linktext_image', 'options');
        $link_image_width = $this->getFlexform('linktext_image_width', 'options');
        $esc_key = $this->getFlexform('escKey', 'options');
        $arrow_key = $this->getFlexform('arrowKey', 'options');
        
        if($esc_key == 0) {
            $esc_key_out = 'escKey:false,';
        }
        
        if($arrow_key == 0) {
            $arrow_key_out = 'arrowKey:false,';
        }

        $opacity = $this->conf['opacity'];
        if (empty($opacity))
            $opacity = $this->getFlexform('opacity', 'options');
        if (empty($link_image_width))
            $link_image_width = $this->conf['link_image_width'];

        // Typolink configuration                
        $link = htmlspecialchars($link);
        $typolink_conf['typolink.']['parameter'] = $link;
        $typolink_conf['typolink.']['no_cache'] = '0';
        $typolink_conf['typolink.']['useCacheHash'] = '1';
        $typolink_conf['typolink.']['returnLast'] = 'url';

        $link = $this->cObj->TEXT($typolink_conf);

        $html = $this->getFlexform('html');

        // Modify output
        $html = str_replace(array("\n", "'"), array("<br />", "\'"), $html);

        $ce = $this->getFlexform('ce');
        $ce_id = $this->cObj->data['uid'];

        // TypoScript values
        $ts_linkClass = $this->conf['linkClass'];
        $ts_contentClass = $this->conf['contentClass'];

        if (empty($ts_linkClass)) {
            $ts_linkClass = 'rzcolorbox-content';
        }

        if (empty($ts_contentClass)) {
            $ts_contentClass = 'rzce';
        }

        $linkClass = '' . $ts_linkClass . '' . $ce_id;
        $contentClass = '' . $ts_contentClass . '' . $ce_id;

        $width = $this->floatVal($width);
        if ($width == '') {
            $width = $this->floatVal($this->conf['colorboxWidth']);
            if ($width == '') {
                $width = '100%';
            }
        }

        $height = $this->floatVal($height);
        if ($height == '') {
            $height = $this->floatVal($this->conf['colorboxHeight']);
            if ($height == '') {
                $height = '100%';
            }
        }

        // Output the Content Elements        
        $ce_conf = array('tables' => 'tt_content', 'source' => $ce, 'dontCheckPid' => 1);
        $ce_output = $this->cObj->RECORDS($ce_conf);

        // Template
        $template_file = htmlspecialchars($template_file);
        $singleTemplate = $template_file;
        if ($singleTemplate == '') {
            $singleTemplate = $this->conf['templateFile'];
        }

        $this->templateCode = $this->cObj->fileResource($singleTemplate);
        if ($this->templateCode == '') {
            return "<h3>No HTML-Template found:</h3>" . $singleTemplate;
        }

        // Set the type
        if ($type == 'iframe') {
            $type_js = 'iframe:true';
        } else if ($type == 'inline') {
            $type_js = 'inline:true,href:".' . $contentClass . '"';
        } else if ($type == 'html') {
            $type_js = "html:'" . $html . "'";
        }

        // Automatically open ColorBox
        if ($open == '1') {
            $open_js = 'open:true,';
        } else {
            $open_js = '';
        }

        // Opacity
        if ($opacity == '') {
            $opacity = '0.85';
        } else {
            $opacity = $opacity;
        }

        // Set the transistion
        if ($transition == 'elastic') {
            $transition_js = 'transition:"elastic",';
        } else if ($transition == 'fade') {
            $transition_js = 'transition:"fade",';
        } else if ($transition == 'none') {
            $transition_js = 'transition:"none",';
        }

        // JS for the Content
        $js = 'jQuery(".' . $linkClass . '").colorbox({' . $open_js . '' . $esc_key_out . '' .$arrow_key_out . '' . $transition_js . 'opacity:"' . $opacity . '",' . $type_js . ',close:"' . $this->pi_getLL("close") . '",previous:"' . $this->pi_getLL("previous") . '",next:"' . $this->pi_getLL("next") . '",';

        if ($deactivate_width == '1' && $deactivate_height == '0') {
            $js .= 'height:"' . $height . '"';
        } else if ($deactivate_height == '1' && $deactivate_width == '0') {
            $js .= 'width:"' . $width . '"';
        } else if ($deactivate_width == '1' && $deactivate_height == '1') {
            // Add nothing
            $js = substr($js, 0, -1);
        } else {
            $js .= 'width:"' . $width . '", height:"' . $height . '"';
        }

        $js .= '});';

        // Read t3jquery extConf
        $this->extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['t3jquery']);
        $integrateToFooter = $this->extConf['integrateToFooter'];

        // Include JS to footer
        if ($this->conf['moveJsFromHeaderToFooter'] == 1 || $integrateToFooter == 1) {
            $GLOBALS['TSFE']->additionalFooterData['rzcolorbox_begin'] = '<script type="text/javascript">jQuery(document).ready(function(){';
            $GLOBALS['TSFE']->additionalFooterData['rzcolorbox_middle'] .= $js;
            $GLOBALS['TSFE']->additionalFooterData['rzcolorbox_end'] = '});</script>';
        }
        // Include JS to header
        else {
            $GLOBALS['TSFE']->additionalHeaderData['rzcolorbox_begin'] = '
            <script type="text/javascript">
              jQuery(document).ready(function(){ 
          ';
            $GLOBALS['TSFE']->additionalHeaderData['rzcolorbox_middle'] .= '           
            	 ' . $js . '
          ';
            $GLOBALS['TSFE']->additionalHeaderData['rzcolorbox_end'] = '
            	});	
            </script>
          ';
        }

        // Set the template and define the markers
        $template['main'] = $this->cObj->getSubpart($this->templateCode, '###TEMPLATE###');
        $markerArray['###TEXT###'] = $this->pi_RTEcssText($text);

        // Set the link appropriate to the type
        if ($type == 'iframe') {
            $markerArray['###LINK_OPEN###'] = '<a href="' . $link . '" class="' . $linkClass . '">';
        } else if ($type == 'inline' || $type == 'html') {
            $markerArray['###LINK_OPEN###'] = '<a href="#" class="' . $linkClass . '">';
        }

        $markerArray['###LINK_TEXT###'] = $this->pi_getLL('link_text');

        // Link text (flexform)
        if (!empty($link_text) && $link_type == 'text') {
            $markerArray['###LINK_TEXT###'] = htmlspecialchars($link_text);
        }

        // Link image (flexform)
        else if (!empty($link_image) && $link_type == 'image') {
            $image['file'] = 'uploads/pics/' . $link_image;
            $image['file.']['width'] = $link_image_width;
            $markerArray['###LINK_TEXT###'] = $this->cObj->IMAGE($image);
        }

        $markerArray['###LINK_CLOSE###'] = '</a>';

        $content .= $this->cObj->substituteMarkerArrayCached($template['main'], $markerArray, array());

        // Only include the Content Elements, if the type "inline" is chosen
        if ($type == 'inline') {
            $content .= '
            <div style="display:none;">
              <div class="' . $contentClass . '">
                ' . $ce_output . '
              </div>
            </div>
          ';
        }

        return $this->pi_wrapInBaseClass($content);
    }

    function getFlexform($key, $sheet = '', $confOverride = '') {
        // Default sheet is sDEF
        $sheet = (!empty($sheet)) ? $sheet : 'sDEF';
        $flexform = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], $key, $sheet);

        // Possible override through TS
        if ($confOverride == '') {
            return $flexform;
        } else {
            $value = $flexform ? $flexform : $this->conf[$confOverride];
            return $value;
        }
    }

    function floatVal($var) {
        $var_ext = str_replace(floatval($var), "", $var);
        $var_ext = trim($var_ext);

        if ($var_ext == '%' || $var_ext == 'px') {
            return floatval($var) . $var_ext;
        } else {
            return floatval($var);
        }
    }

    function pi_loadLL($content, $conf) {
        parent::pi_loadLL();
        $this->conf = $conf;

        $tsLLFile = $this->conf['localLangFile'];
        if ($tsLLFile) {
            $tsLLFile = $tsLLFile;
            
            if (!$this->additional_locallang_include) {
                $tempLOCAL_LANG = t3lib_div::readLLfile($tsLLFile, $this->LLkey);
                //array_merge with new array first, so a value in locallang (or typoscript) can overwrite values from ../locallang_db
                $this->LOCAL_LANG = array_merge_recursive($tempLOCAL_LANG, is_array($this->LOCAL_LANG) ? $this->LOCAL_LANG : array());
                if ($this->altLLkey) {
                    $tempLOCAL_LANG = t3lib_div::readLLfile($basePath, $this->altLLkey);
                    $this->LOCAL_LANG = array_merge_recursive($tempLOCAL_LANG, is_array($this->LOCAL_LANG) ? $this->LOCAL_LANG : array());
                }
                $this->additional_locallang_include = true;
            }
        } else {
            return false;
        }
    }

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rzcolorbox/pi2/class.tx_rzcolorbox_pi2.php']) {
    include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rzcolorbox/pi2/class.tx_rzcolorbox_pi2.php']);
}
?>