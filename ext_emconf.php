<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "rzcolorbox".
 *
 * Auto generated 18-03-2014 16:20
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'jQuery Colorbox',
	'description' => 'The extension includes the jQuery ColorBox for images, which is a nice-looking alternative for the allknown Lightbox.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.5.6',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Raphael Zschorsch',
	'author_email' => 'rafu1987@gmail.com',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:83:{s:21:"ext_conf_template.txt";s:4:"d13d";s:12:"ext_icon.gif";s:4:"9012";s:17:"ext_localconf.php";s:4:"c2dc";s:14:"ext_tables.php";s:4:"3f1f";s:14:"ext_tables.sql";s:4:"e64f";s:15:"ff_data_pi2.xml";s:4:"ea78";s:13:"locallang.xml";s:4:"1dea";s:16:"locallang_db.xml";s:4:"d07c";s:17:"locallang_tca.xml";s:4:"e8f7";s:12:"t3jquery.txt";s:4:"d4fe";s:14:"doc/manual.pdf";s:4:"4930";s:14:"doc/manual.sxw";s:4:"1440";s:19:"doc/wizard_form.dat";s:4:"cca3";s:20:"doc/wizard_form.html";s:4:"3121";s:43:"lib/class.tx_rzcolorbox_additionalFuncs.php";s:4:"32a2";s:34:"lib/class.tx_rzcolorbox_ttnews.php";s:4:"4ba5";s:14:"pi2/ce_wiz.gif";s:4:"a50e";s:31:"pi2/class.tx_rzcolorbox_pi2.php";s:4:"57c0";s:39:"pi2/class.tx_rzcolorbox_pi2_wizicon.php";s:4:"9b4c";s:13:"pi2/clear.gif";s:4:"cc11";s:17:"pi2/locallang.xml";s:4:"8708";s:20:"pi2/static/setup.txt";s:4:"ceb6";s:33:"res/js/jquery-1-7-1-noconflict.js";s:4:"0026";s:22:"res/js/jquery-1-7-1.js";s:4:"4bab";s:25:"res/js/jquery.colorbox.js";s:4:"7c53";s:27:"res/style1/css/colorbox.css";s:4:"3024";s:32:"res/style1/css/images/border.png";s:4:"7ca8";s:34:"res/style1/css/images/controls.png";s:4:"b68b";s:33:"res/style1/css/images/loading.gif";s:4:"e661";s:44:"res/style1/css/images/loading_background.png";s:4:"acf4";s:33:"res/style1/css/images/overlay.png";s:4:"7903";s:48:"res/style1/css/images/ie6/borderBottomCenter.png";s:4:"1936";s:46:"res/style1/css/images/ie6/borderBottomLeft.png";s:4:"7cee";s:47:"res/style1/css/images/ie6/borderBottomRight.png";s:4:"297f";s:46:"res/style1/css/images/ie6/borderMiddleLeft.png";s:4:"64df";s:47:"res/style1/css/images/ie6/borderMiddleRight.png";s:4:"9fa4";s:45:"res/style1/css/images/ie6/borderTopCenter.png";s:4:"01ec";s:43:"res/style1/css/images/ie6/borderTopLeft.png";s:4:"bf49";s:44:"res/style1/css/images/ie6/borderTopRight.png";s:4:"5131";s:27:"res/style2/css/colorbox.css";s:4:"9044";s:34:"res/style2/css/images/controls.png";s:4:"e9bd";s:33:"res/style2/css/images/loading.gif";s:4:"8732";s:27:"res/style3/css/colorbox.css";s:4:"c47c";s:34:"res/style3/css/images/controls.png";s:4:"2615";s:33:"res/style3/css/images/loading.gif";s:4:"8732";s:27:"res/style4/css/colorbox.css";s:4:"caf8";s:33:"res/style4/css/images/border1.png";s:4:"416e";s:33:"res/style4/css/images/border2.png";s:4:"50cd";s:33:"res/style4/css/images/loading.gif";s:4:"b5e2";s:48:"res/style4/css/images/ie6/borderBottomCenter.png";s:4:"3f90";s:46:"res/style4/css/images/ie6/borderBottomLeft.png";s:4:"3262";s:47:"res/style4/css/images/ie6/borderBottomRight.png";s:4:"a5f6";s:46:"res/style4/css/images/ie6/borderMiddleLeft.png";s:4:"eb8a";s:47:"res/style4/css/images/ie6/borderMiddleRight.png";s:4:"b644";s:45:"res/style4/css/images/ie6/borderTopCenter.png";s:4:"ec72";s:43:"res/style4/css/images/ie6/borderTopLeft.png";s:4:"748c";s:44:"res/style4/css/images/ie6/borderTopRight.png";s:4:"97c3";s:27:"res/style5/css/colorbox.css";s:4:"4c0b";s:32:"res/style5/css/images/border.png";s:4:"84ac";s:34:"res/style5/css/images/controls.png";s:4:"5aec";s:33:"res/style5/css/images/loading.gif";s:4:"e661";s:44:"res/style5/css/images/loading_background.png";s:4:"7c96";s:26:"res/template/template.html";s:4:"02b9";s:25:"static/base/constants.txt";s:4:"9816";s:21:"static/base/setup.txt";s:4:"8565";s:29:"static/base/4.5/constants.txt";s:4:"9816";s:25:"static/base/4.5/setup.txt";s:4:"698e";s:27:"static/style1/constants.txt";s:4:"d41d";s:23:"static/style1/setup.txt";s:4:"0a2c";s:27:"static/style2/constants.txt";s:4:"d41d";s:23:"static/style2/setup.txt";s:4:"2a71";s:27:"static/style3/constants.txt";s:4:"d41d";s:23:"static/style3/setup.txt";s:4:"97d2";s:27:"static/style4/constants.txt";s:4:"d41d";s:23:"static/style4/setup.txt";s:4:"79f7";s:27:"static/style5/constants.txt";s:4:"d41d";s:23:"static/style5/setup.txt";s:4:"d6bb";s:29:"static/t3jquery/constants.txt";s:4:"8430";s:25:"static/t3jquery/setup.txt";s:4:"b5a8";s:33:"static/t3jquery/4.5/constants.txt";s:4:"63c2";s:29:"static/t3jquery/4.5/setup.txt";s:4:"235e";s:28:"static/tt_news/constants.txt";s:4:"dc65";s:24:"static/tt_news/setup.txt";s:4:"4f0f";}',
);

?>