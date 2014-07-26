<?php

/**
 * i18nl10n Contao Module
 *
 * The i18nl10n module for Contao allows you to manage multilingual content
 * on the element level rather than with page trees.
 *
 *
 * PHP version 5
 * @copyright   Verstärker, Patric Eberle 2014
 * @copyright   Krasimir Berov 2010-2013
 * @author      Patric Eberle <line-in@derverstaerker.ch>
 * @author      Krasimir Berov
 * @package     i18nl10n
 * @license     LGPLv3 http://www.gnu.org/licenses/lgpl-3.0.html
 */


/**
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['MSC']['i18nl10n_fields']['language']['label'] = array
(
    'Language',
    'Please select one of the available languages'
);

$GLOBALS['TL_LANG']['MSC']['editL10n'] ='Edit localizations for page %s';

$GLOBALS['TL_LANG']['MSC']['language'] = 'language';

// Allow unlocalized entries in tl_content so content elements can be shared among localized pages
$GLOBALS['TL_LANG']['LNG'][''] = 'Any';


// tl_page_i18nl10n
$GLOBALS['TL_LANG']['MSC']['i18nl10n']['listPagesL10n']['create'] = 'Create L10n';
$GLOBALS['TL_LANG']['MSC']['i18nl10n']['listPagesL10n']['edit'] = 'Edit %s L10n';
$GLOBALS['TL_LANG']['MSC']['i18nl10n']['listPagesL10n']['publish'] = 'Show/hide %s L10n';
$GLOBALS['TL_LANG']['MSC']['i18nl10n']['listPagesL10n']['delete'] = 'Delete %s L10n';
$GLOBALS['TL_LANG']['MSC']['i18nl10n']['listPagesL10n']['deleteConfirm'] = 'Are you sure you want to delete the %s translation for this article?';