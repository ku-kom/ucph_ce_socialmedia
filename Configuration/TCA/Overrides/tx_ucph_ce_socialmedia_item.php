<?php

/*
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

 $extKey = 'ucph_ce_socialmedia';

return [
    'ctrl' => [
        'label' => 'header',
        'label_alt' => '',
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'title' => 'LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_add_items',
        'delete' => 'deleted',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'hideTable' => true,
        'hideAtCopy' => true,
        'prependAtCopy' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.prependAtCopy',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'languageField' => 'sys_language_uid',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true
        ],
        'typeicon_classes' => [
            'default' => 'ucph-ce-socialmedia-icon'
        ],
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header;LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_header,
                socialmedia_name,
                socialmedia_link,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --palette--;;hiddenLanguagePalette,
            '
        ],
    ],
    'palettes' => [
        '1' => [
            'showitem' => ''
        ],
        'access' => [
            'showitem' => '
                starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel
            '
        ],
        'general' => [
            'showitem' => '
                tt_content
            '
        ],
        'visibility' => [
            'showitem' => '
                hidden;LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_add_item
            '
        ],
        // hidden but needs to be included all the time, so sys_language_uid is set correctly
        'hiddenLanguagePalette' => [
            'showitem' => 'sys_language_uid, l10n_parent',
            'isHiddenPalette' => true,
        ],
    ],
    'columns' => [
        'tt_content' => [
            'exclude' => true,
            'label' => 'LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_add_items',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tt_content',
                'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.{#CType}=\'ucph_ce_socialmedia\'',
                'maxitems' => 1,
                'default' => 0,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden.I.0'
                    ]
                ]
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => ['type' => 'language']
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0
                    ]
                ],
                'foreign_table' => 'tx_ucph_ce_socialmedia_item',
                'foreign_table_where' => 'AND tx_ucph_ce_socialmedia_item.pid=###CURRENT_PID### AND tx_ucph_ce_socialmedia_item.sys_language_uid IN (-1,0)',
                'default' => 0
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'header' => [
            'exclude' => true,
            'label' => 'LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_header',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim,required'
            ],
        ],
        'socialmedia_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_header',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_select', '', ''],
                    ['LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_facebook', 'facebook', 'EXT:'.$extKey.'/Resources/Public/Icons/facebook.svg'],
                    ['LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_instagram', 'instagram', 'EXT:'.$extKey.'/Resources/Public/Icons/instagram.svg'],
                    ['LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_twitter', 'twitter', 'EXT:'.$extKey.'/Resources/Public/Icons/twitter.svg'],
                    ['LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_youtube', 'youtube', 'EXT:'.$extKey.'/Resources/Public/Icons/youtube.svg'],
                ]
            ],
            'default' => '',
        ],
        'socialmedia_link' => [
            'label' => 'Link',
            'description' => 'LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_be.xlf:ucph_ce_socialmedia_add_link',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                // Replace with the following in v.12:
                //'type' => 'link',
                //'allowedTypes' => ['page', 'url', 'record'],
            ],
        ],
    ],
];