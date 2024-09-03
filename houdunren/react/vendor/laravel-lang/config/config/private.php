<?php

declare(strict_types=1);

use LaravelLang\Config\Helpers\Path;
use LaravelLang\LocaleList\Direction;
use LaravelLang\LocaleList\Locale;

return [
    'plugins'  => [],
    'packages' => [],

    'models' => [
        'directory' => Path::app(),
    ],

    'map' => [
        Locale::Afrikaans->value => [
            'type'     => 'Latn',
            'regional' => 'af_ZA',
        ],

        Locale::Albanian->value => [
            'type'     => 'Latn',
            'regional' => 'sq_AL',
        ],

        Locale::Amharic->value => [
            'type'     => 'Ethi',
            'regional' => 'am_ET',
        ],

        Locale::Arabic->value => [
            'type'     => 'Arab',
            'regional' => 'ar_AE',

            'direction' => Direction::RightToLeft,
        ],

        Locale::Armenian->value => [
            'type'     => 'Armn',
            'regional' => 'hy_AM',
        ],

        Locale::Assamese->value => [
            'type'     => 'Beng',
            'regional' => 'as_IN',
        ],

        Locale::Azerbaijani->value => [
            'type'     => 'Latn',
            'regional' => 'az_AZ',
        ],

        Locale::Bambara->value => [
            'type'     => 'Latn',
            'regional' => 'bm_ML',
        ],

        Locale::Bhojpuri->value => [
            'type'     => 'Deva',
            'regional' => 'bho_IN',
        ],

        Locale::Basque->value => [
            'type'     => 'Latn',
            'regional' => 'eu_ES',
        ],

        Locale::Belarusian->value => [
            'type'     => 'Cyrl',
            'regional' => 'be_BY',
        ],

        Locale::Bengali->value => [
            'type'     => 'Beng',
            'regional' => 'bn_BD',
        ],

        Locale::Bosnian->value => [
            'type'     => 'Latn',
            'regional' => 'bs_BA',
        ],

        Locale::Bulgarian->value => [
            'type'     => 'Cyrl',
            'regional' => 'bg_BG',
        ],

        Locale::Catalan->value => [
            'type'     => 'Latn',
            'regional' => 'ca_ES',
        ],

        Locale::Cebuano->value => [
            'type'     => 'Latn',
            'regional' => 'ceb_PH',
        ],

        Locale::CentralKhmer->value => [
            'type'     => 'Khmr',
            'regional' => 'km_KH',
        ],

        Locale::Chinese->value => [
            'type'     => 'Hans',
            'regional' => 'zh_CN',
        ],

        Locale::ChineseHongKong->value => [
            'type'     => 'Hans',
            'regional' => 'zh_HK',
        ],

        Locale::ChineseT->value => [
            'type'     => 'Hans',
            'regional' => 'zh_TW',
        ],

        Locale::Croatian->value => [
            'type'     => 'Latn',
            'regional' => 'hr_HR',
        ],

        Locale::Czech->value => [
            'type'     => 'Latn',
            'regional' => 'cs_CZ',
        ],

        Locale::Danish->value => [
            'type'     => 'Latn',
            'regional' => 'da_DK',
        ],

        Locale::Dogri->value => [
            'type'     => 'Deva',
            'regional' => 'doi_IN',
        ],

        Locale::Dutch->value => [
            'type'     => 'Latn',
            'regional' => 'nl_NL',
        ],

        Locale::English->value => [
            'type'     => 'Latn',
            'regional' => 'en_GB',
        ],

        Locale::Esperanto->value => [
            'type'     => 'Latn',
            'regional' => 'eo_001',
        ],

        Locale::Estonian->value => [
            'type'     => 'Latn',
            'regional' => 'et_EE',
        ],

        Locale::Ewe->value => [
            'type'     => 'Latn',
            'regional' => 'ee_GH',
        ],

        Locale::Finnish->value => [
            'type'     => 'Latn',
            'regional' => 'fi_FI',
        ],

        Locale::French->value => [
            'type'     => 'Latn',
            'regional' => 'fr_FR',
        ],

        Locale::Frisian->value => [
            'type'     => 'Latn',
            'regional' => 'fy_NL',
        ],

        Locale::Galician->value => [
            'type'     => 'Latn',
            'regional' => 'gl_ES',
        ],

        Locale::Georgian->value => [
            'type'     => 'Geor',
            'regional' => 'ka_GE',
        ],

        Locale::German->value => [
            'type'     => 'Latn',
            'regional' => 'de_DE',
        ],

        Locale::GermanSwitzerland->value => [
            'type'     => 'Latn',
            'regional' => 'de_CH',
        ],

        Locale::Greek->value => [
            'type'     => 'Grek',
            'regional' => 'el_GR',
        ],

        Locale::Gujarati->value => [
            'type'     => 'Gujr',
            'regional' => 'gu_IN',
        ],

        Locale::Hausa->value => [
            'type'     => 'Latn',
            'regional' => 'ha_NG',
        ],

        Locale::Hawaiian->value => [
            'type'     => 'Latn',
            'regional' => 'haw',
        ],

        Locale::Hebrew->value => [
            'type'     => 'Hebr',
            'regional' => 'he_IL',

            'direction' => Direction::RightToLeft,
        ],

        Locale::Hindi->value => [
            'type'     => 'Deva',
            'regional' => 'hi_IN',
        ],

        Locale::Hungarian->value => [
            'type'     => 'Latn',
            'regional' => 'hu_HU',
        ],

        Locale::Icelandic->value => [
            'type'     => 'Latn',
            'regional' => 'is_IS',
        ],

        Locale::Igbo->value => [
            'type'     => 'Latn',
            'regional' => 'ig_NG',
        ],

        Locale::Indonesian->value => [
            'type'     => 'Latn',
            'regional' => 'id_ID',
        ],

        Locale::Irish->value => [
            'type'     => 'Latn',
            'regional' => 'ga_IE',
        ],

        Locale::Italian->value => [
            'type'     => 'Latn',
            'regional' => 'it_IT',
        ],

        Locale::Japanese->value => [
            'type'     => 'Jpan',
            'regional' => 'ja_JP',
        ],

        Locale::Kannada->value => [
            'type'     => 'Knda',
            'regional' => 'kn_IN',
        ],

        Locale::Kazakh->value => [
            'type'     => 'Cyrl',
            'regional' => 'kk_KZ',
        ],

        Locale::Kinyarwanda->value => [
            'type'     => 'Latn',
            'regional' => 'rw_RW',
        ],

        Locale::Korean->value => [
            'type'     => 'Hang',
            'regional' => 'ko_KR',
        ],

        Locale::Kurdish->value => [
            'type'     => 'Latn',
            'regional' => 'ku_TR',
        ],

        Locale::KurdishSorani->value => [
            'type'     => 'Arab',
            'regional' => 'ckb_IQ',

            'direction' => Direction::RightToLeft,
        ],

        Locale::Kyrgyz->value => [
            'type'     => 'Cyrl',
            'regional' => 'ky_KG',
        ],

        Locale::Lao->value => [
            'type'     => 'Laoo',
            'regional' => 'lo_LA',
        ],

        Locale::Latvian->value => [
            'type'     => 'Latn',
            'regional' => 'lv_LV',
        ],

        Locale::Lingala->value => [
            'type'     => 'Latn',
            'regional' => 'ln_CD',
        ],

        Locale::Lithuanian->value => [
            'type'     => 'Latn',
            'regional' => 'lt_LT',
        ],

        Locale::Luganda->value => [
            'type'     => 'Latn',
            'regional' => 'lg_UG',
        ],

        Locale::Luxembourgish->value => [
            'type'     => 'Latn',
            'regional' => 'lb_LU',
        ],

        Locale::Macedonian->value => [
            'type'     => 'Cyrl',
            'regional' => 'mk_MK',
        ],

        Locale::Maithili->value => [
            'type'     => 'Deva',
            'regional' => 'mai_IN',
        ],

        Locale::Malagasy->value => [
            'type'     => 'Latn',
            'regional' => 'mg_MG',
        ],

        Locale::Malayalam->value => [
            'type'     => 'Mlym',
            'regional' => 'ml_IN',
        ],

        Locale::Malay->value => [
            'type'     => 'Latn',
            'regional' => 'ms_MY',
        ],

        Locale::Maltese->value => [
            'type'     => 'Latn',
            'regional' => 'mt_MT',
        ],

        Locale::Marathi->value => [
            'type'     => 'Deva',
            'regional' => 'mr_IN',
        ],

        Locale::Maori->value => [
            'type'     => 'Latn',
            'regional' => 'mi_NZ',
        ],

        Locale::MeiteilonManipuri->value => [
            'type'     => 'Beng',
            'regional' => 'mni_IN',
        ],

        Locale::Mongolian->value => [
            'type'     => 'Mong',
            'regional' => 'mn_MN',
        ],

        Locale::MyanmarBurmese->value => [
            'type'     => 'Mymr',
            'regional' => 'my_MM',
        ],

        Locale::Nepali->value => [
            'type'     => 'Deva',
            'regional' => 'ne',
        ],

        Locale::NorwegianBokmal->value => [
            'type'     => 'Latn',
            'regional' => 'nb_NO',
        ],

        Locale::NorwegianNynorsk->value => [
            'type'     => 'Latn',
            'regional' => 'nn_NO',
        ],

        Locale::Occitan->value => [
            'type'     => 'Latn',
            'regional' => 'oc_FR',
        ],

        Locale::OdiaOriya->value => [
            'type'     => 'Orya',
            'regional' => 'or_IN',
        ],

        Locale::Oromo->value => [
            'type'     => 'Latn',
            'regional' => 'om_ET',
        ],

        Locale::Pashto->value => [
            'type'     => 'Arab',
            'regional' => 'ps_AF',

            'direction' => Direction::RightToLeft,
        ],

        Locale::Persian->value => [
            'type'     => 'Arab',
            'regional' => 'fa_IR',

            'direction' => Direction::RightToLeft,
        ],

        Locale::Pilipino->value => [
            'type'     => 'Latn',
            'regional' => 'fil_PH',
        ],

        Locale::Polish->value => [
            'type'     => 'Latn',
            'regional' => 'pl_PL',
        ],

        Locale::Portuguese->value => [
            'type'     => 'Latn',
            'regional' => 'pt_PT',
        ],

        Locale::PortugueseBrazil->value => [
            'type'     => 'Latn',
            'regional' => 'pt_BR',
        ],

        Locale::Punjabi->value => [
            'type'     => 'Guru',
            'regional' => 'pa_IN',
        ],

        Locale::Quechua->value => [
            'type'     => 'Latn',
            'regional' => 'qu_PE',
        ],

        Locale::Romanian->value => [
            'type'     => 'Latn',
            'regional' => 'ro_RO',
        ],

        Locale::Russian->value => [
            'type'     => 'Cyrl',
            'regional' => 'ru_RU',
        ],

        Locale::Sanskrit->value => [
            'type'     => 'Deva',
            'regional' => 'sa_IN',
        ],

        Locale::Sardinian->value => [
            'type'     => 'Latn',
            'regional' => 'sc_IT',
        ],

        Locale::ScotsGaelic->value => [
            'type'     => 'Latn',
            'regional' => 'gd_GB',
        ],

        Locale::SerbianCyrillic->value => [
            'type'     => 'Cyrl',
            'regional' => 'sr_RS',
        ],

        Locale::SerbianLatin->value => [
            'type'     => 'Latn',
            'regional' => 'sr_RS',
        ],

        Locale::SerbianMontenegrin->value => [
            'type'     => 'Latn',
            'regional' => 'sr_Latn_ME',
        ],

        Locale::Shona->value => [
            'type'     => 'Latn',
            'regional' => 'sn_ZW',
        ],

        Locale::Sindhi->value => [
            'type'     => 'Arab',
            'regional' => 'sd_PK',

            'direction' => Direction::RightToLeft,
        ],

        Locale::Sinhala->value => [
            'type'     => 'Sinh',
            'regional' => 'si_LK',
        ],

        Locale::Slovak->value => [
            'type'     => 'Latn',
            'regional' => 'sk_SK',
        ],

        Locale::Slovenian->value => [
            'type'     => 'Latn',
            'regional' => 'sl_SI',
        ],

        Locale::Somali->value => [
            'type'     => 'Latn',
            'regional' => 'so_SO',
        ],

        Locale::Spanish->value => [
            'type'     => 'Latn',
            'regional' => 'es_ES',
        ],

        Locale::Sundanese->value => [
            'type'     => 'Latn',
            'regional' => 'su_ID',
        ],

        Locale::Swahili->value => [
            'type'     => 'Latn',
            'regional' => 'sw_KE',
        ],

        Locale::Swedish->value => [
            'type'     => 'Latn',
            'regional' => 'sv_SE',
        ],

        Locale::Tagalog->value => [
            'type'     => 'Latn',
            'regional' => 'tl_PH',
        ],

        Locale::Tajik->value => [
            'type'     => 'Cyrl',
            'regional' => 'tg_TJ',
        ],

        Locale::Tamil->value => [
            'type'     => 'Taml',
            'regional' => 'ta_IN',
        ],

        Locale::Tatar->value => [
            'type'     => 'Cyrl',
            'regional' => 'tt_RU',
        ],

        Locale::Telugu->value => [
            'type'     => 'Telu',
            'regional' => 'te_IN',
        ],

        Locale::Tigrinya->value => [
            'type'     => 'Ethi',
            'regional' => 'ti_ET',
        ],

        Locale::Thai->value => [
            'type'     => 'Thai',
            'regional' => 'th_TH',
        ],

        Locale::Turkish->value => [
            'type'     => 'Latn',
            'regional' => 'tr_TR',
        ],

        Locale::Turkmen->value => [
            'type'     => 'Cyrl',
            'regional' => 'tk_TM',
        ],

        Locale::TwiAkan->value => [
            'type'     => 'Latn',
            'regional' => 'ak_GH',
        ],

        Locale::Uighur->value => [
            'type'     => 'Arab',
            'regional' => 'ug_CN',

            'direction' => Direction::RightToLeft,
        ],

        Locale::Ukrainian->value => [
            'type'     => 'Cyrl',
            'regional' => 'uk_UA',
        ],

        Locale::Urdu->value => [
            'type'     => 'Arab',
            'regional' => 'ur_PK',

            'direction' => Direction::RightToLeft,
        ],

        Locale::UzbekCyrillic->value => [
            'type'     => 'Cyrl',
            'regional' => 'uz_UZ',
        ],

        Locale::UzbekLatin->value => [
            'type'     => 'Latn',
            'regional' => 'uz_UZ',
        ],

        Locale::Vietnamese->value => [
            'type'     => 'Latn',
            'regional' => 'vi_VN',
        ],

        Locale::Welsh->value => [
            'type'     => 'Latn',
            'regional' => 'cy_GB',
        ],

        Locale::Xhosa->value => [
            'type'     => 'Latn',
            'regional' => 'xh_ZA',
        ],

        Locale::Yiddish->value => [
            'type'     => 'Hebr',
            'regional' => 'yi_001',
        ],

        Locale::Yoruba->value => [
            'type'     => 'Latn',
            'regional' => 'yo_NG',
        ],

        Locale::Zulu->value => [
            'type'     => 'Latn',
            'regional' => 'zu_ZA',
        ],
    ],
];
