<?php

/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * xpandsliderd under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * xpandSlider plugin
 *
 * $Source: /e107_plugins/xpandslider/xpandslider_admin.php,v $
 * $Revision$
 * $Date$
 * $Author$
 *
 */

require_once("conf.php");

if (!defined('e107_INIT'))
{
    require_once("../../class2.php");
}

$xpandSliderPrefs = e107::getPlugPref(XPNSLD_NAME); // get plugin prefs

if (!defined('XPNSLD_DEBUG')) {
    define('XPNSLD_DEBUG', $xpandSliderPrefs['xpnsld_debug']);
}

//$eplug_admin = true;

if (!e107::isInstalled(XPNSLD_NAME))
{
    e107::redirect('admin');
    exit;
}

e107_require_once(e_PLUGIN . 'gallery/includes/gallery_load.php');
  // Load prettyPhoto settings and files.
gallery_load_prettyphoto();

e107::lan(XPNSLD_NAME, 'global'); // Loads e_PLUGIN."xpandslider/languages/English/global.php (if English is the current language)
e107::lan(XPNSLD_NAME, 'admin');

//e107::css('core', 'elfinder/css/elfinder.min.css');
//e107::css('core', 'elfinder/css/theme.css');
e107::css('url', '//cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.18/css/elfinder.full.min.css');
e107::css('url', '//cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.18/css/theme.min.css');

e107::css('url', '//cdn.jsdelivr.net/brutusin.json-forms/1.4.0/css/brutusin-json-forms.min.css');
e107::js('url', '//cdn.jsdelivr.net/brutusin.json-forms/1.4.0/js/brutusin-json-forms.min.js');
//e107::js('url', '//cdn.jsdelivr.net/brutusin.json-forms/1.4.0/js/brutusin-json-forms-bootstrap.min.js');

e107::css(XPNSLD_NAME, 'css/xpnsld.css');
//e107::js('core', 'elfinder/js/elfinder.min.js');
e107::js('url', '//cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.18/js/elfinder.full.min.js');
e107::js(XPNSLD_NAME, 'js/xpnsld-admin-js.js', 'jquery');

new plugin_xpandslider_admin;

require_once(e_ADMIN . "auth.php");
//includes/admin.php is auto-loaded.

// Send page content
e107::getAdminUI()->runPage();

require_once(e_ADMIN . "footer.php");
