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
 * @author      Patric Eberle <line-in@derverstaerker.ch>
 * @package     i18nl10n
 * @license     LGPLv3 http://www.gnu.org/licenses/lgpl-3.0.html
 */

// load tl_news class and translation
$this->loadLanguageFile('tl_page');
$this->loadDataContainer('tl_news');


// prepare languages for selection
$i18nl10n_languages = deserialize($GLOBALS['TL_CONFIG']['i18nl10n_languages']);
$i18nl10n_default_language = &$GLOBALS['TL_CONFIG']['i18nl10n_default_language'];

foreach($i18nl10n_languages as $k => $v) {
    if($v == $i18nl10n_default_language) {
        $i18nl10n_languages = array_delete($i18nl10n_languages,$k);
        break;
    }
}

// define tl_news_i18nl10n DCA
$GLOBALS['TL_DCA']['tl_news_i18nl10n'] = array
(
    // Config
    'config' => array
    (
        'dataContainer'     => 'Table',
        'enableVersioning'  => true,
        'ptable'            => 'tl_news',
        'sql' => array
        (
            'keys' => array
            (
                'id'       => 'primary',
                'pid'      => 'index',
                'language' => 'index',
                'alias'    => 'index'
            )
        )
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'        => 4,
            'fields'      => array('language DESC')
        ),

        'label' => array
        (
            'fields'            => array('title', 'language', 'language'),
//            'label_callback'    => array('tl_page_i18nl10n', 'addIcon')
        ),

        // Global operations
        'global_operations' => array
        (
            'toggleNodes' => array
            (
                'label' => &$GLOBALS['TL_LANG']['MSC']['toggleNodes'],
                'href'  => 'ptg=all',
                'class' => 'header_toggle'
            ),

            'all' => array
            (
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
            ),
        ),

        // Item operations
        'operations' => $GLOBALS['TL_DCA']['tl_news']['list']['operations']
    ),

    // Palettes
    'palettes' => array
    (
        '__selector__'  => array('addImage', 'addEnclosure', 'source'),
        'default'       =>
            '{title_legend},headline,alias,author;'
            . '{teaser_legend},subheadline,teaser;'
            . '{image_legend},addImage;'
            . '{enclosure_legend:hide},addEnclosure;'
            . '{source_legend:hide},source;'
            . '{publish_legend},published'
    ),

    // Subpalettes
    'subpalettes' => $GLOBALS['TL_DCA']['tl_news']['subpalettes'],

    // Fields
    'fields' => array
    (
        'id'      => $GLOBALS['TL_DCA']['tl_news']['fields']['id'],

        'pid' => array
        (
            'foreignKey' => 'tl_news.id',
            'sql' => "int(10) unsigned NOT NULL default '0'",
            'relation' => array(
                'type' => 'belongsTo',
                'load' => 'eager'
            )
        ),

        'sorting'      => $GLOBALS['TL_DCA']['tl_news']['fields']['sorting'],
        'tstamp'       => $GLOBALS['TL_DCA']['tl_news']['fields']['tstamp'],
        'headline'     => $GLOBALS['TL_DCA']['tl_news']['fields']['headline'],
        'alias'        => $GLOBALS['TL_DCA']['tl_news']['fields']['alias'],
        'author'       => $GLOBALS['TL_DCA']['tl_news']['fields']['author'],
        'subheadline'  => $GLOBALS['TL_DCA']['tl_news']['fields']['subheadline'],
        'teaser'       => $GLOBALS['TL_DCA']['tl_news']['fields']['teaser'],
        'addImage'     => $GLOBALS['TL_DCA']['tl_news']['fields']['addImage'],
        'singleSRC'    => $GLOBALS['TL_DCA']['tl_news']['fields']['singleSRC'],
        'alt'          => $GLOBALS['TL_DCA']['tl_news']['fields']['alt'],
        'size'         => $GLOBALS['TL_DCA']['tl_news']['fields']['size'],
        'imagemargin'  => $GLOBALS['TL_DCA']['tl_news']['fields']['imagemargin'],
        'imageUrl'     => $GLOBALS['TL_DCA']['tl_news']['fields']['imageUrl'],
        'fullsize'     => $GLOBALS['TL_DCA']['tl_news']['fields']['fullsize'],
        'caption'      => $GLOBALS['TL_DCA']['tl_news']['fields']['caption'],
        'floating'     => $GLOBALS['TL_DCA']['tl_news']['fields']['floating'],
        'addEnclosure' => $GLOBALS['TL_DCA']['tl_news']['fields']['addEnclosure'],
        'enclosure'    => $GLOBALS['TL_DCA']['tl_news']['fields']['enclosure'],
        'source'       => $GLOBALS['TL_DCA']['tl_news']['fields']['source'],
        'jumpTo'       => $GLOBALS['TL_DCA']['tl_news']['fields']['jumpTo'],
        'articleId'    => $GLOBALS['TL_DCA']['tl_news']['fields']['articleId'],
        'url'          => $GLOBALS['TL_DCA']['tl_news']['fields']['url'],
        'target'       => $GLOBALS['TL_DCA']['tl_news']['fields']['target'],
        'published'    => $GLOBALS['TL_DCA']['tl_news']['fields']['published'],
        'language'     => $GLOBALS['TL_DCA']['tl_page_i18nl10n']['fields']['language'],
    )
);