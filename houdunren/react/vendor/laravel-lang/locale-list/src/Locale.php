<?php

declare(strict_types=1);

namespace LaravelLang\LocaleList;

use ArchTech\Enums\From;
use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;
use BackedEnum;

enum Locale: string
{
    use From;
    use Names;
    use Options;
    use Values;

    case Afrikaans          = 'af';
    case Albanian           = 'sq';
    case Amharic            = 'am';
    case Arabic             = 'ar';
    case Armenian           = 'hy';
    case Assamese           = 'as';
    case Azerbaijani        = 'az';
    case Bambara            = 'bm';
    case Basque             = 'eu';
    case Belarusian         = 'be';
    case Bengali            = 'bn';
    case Bhojpuri           = 'bho';
    case Bosnian            = 'bs';
    case Bulgarian          = 'bg';
    case Catalan            = 'ca';
    case Cebuano            = 'ceb';
    case CentralKhmer       = 'km';
    case Chinese            = 'zh_CN';
    case ChineseHongKong    = 'zh_HK';
    case ChineseT           = 'zh_TW';
    case Croatian           = 'hr';
    case Czech              = 'cs';
    case Danish             = 'da';
    case Dogri              = 'doi';
    case Dutch              = 'nl';
    case English            = 'en';
    case Esperanto          = 'eo';
    case Estonian           = 'et';
    case Ewe                = 'ee';
    case Finnish            = 'fi';
    case French             = 'fr';
    case Frisian            = 'fy';
    case Galician           = 'gl';
    case Georgian           = 'ka';
    case German             = 'de';
    case GermanSwitzerland  = 'de_CH';
    case Greek              = 'el';
    case Gujarati           = 'gu';
    case Hausa              = 'ha';
    case Hawaiian           = 'haw';
    case Hebrew             = 'he';
    case Hindi              = 'hi';
    case Hungarian          = 'hu';
    case Icelandic          = 'is';
    case Igbo               = 'ig';
    case Indonesian         = 'id';
    case Irish              = 'ga';
    case Italian            = 'it';
    case Japanese           = 'ja';
    case Kannada            = 'kn';
    case Kazakh             = 'kk';
    case Kinyarwanda        = 'rw';
    case Korean             = 'ko';
    case Kurdish            = 'ku';
    case KurdishSorani      = 'ckb';
    case Kyrgyz             = 'ky';
    case Lao                = 'lo';
    case Latvian            = 'lv';
    case Lingala            = 'ln';
    case Lithuanian         = 'lt';
    case Luganda            = 'lg';
    case Luxembourgish      = 'lb';
    case Macedonian         = 'mk';
    case Maithili           = 'mai';
    case Malagasy           = 'mg';
    case Malay              = 'ms';
    case Malayalam          = 'ml';
    case Maltese            = 'mt';
    case Maori              = 'mi';
    case Marathi            = 'mr';
    case MeiteilonManipuri  = 'mni_Mtei';
    case Mongolian          = 'mn';
    case MyanmarBurmese     = 'my';
    case Nepali             = 'ne';
    case NorwegianBokmal    = 'nb';
    case NorwegianNynorsk   = 'nn';
    case Occitan            = 'oc';
    case OdiaOriya          = 'or';
    case Oromo              = 'om';
    case Pashto             = 'ps';
    case Persian            = 'fa';
    case Pilipino           = 'fil';
    case Polish             = 'pl';
    case Portuguese         = 'pt';
    case PortugueseBrazil   = 'pt_BR';
    case Punjabi            = 'pa';
    case Quechua            = 'qu';
    case Romanian           = 'ro';
    case Russian            = 'ru';
    case Sanskrit           = 'sa';
    case Sardinian          = 'sc';
    case ScotsGaelic        = 'gd';
    case SerbianCyrillic    = 'sr_Cyrl';
    case SerbianLatin       = 'sr_Latn';
    case SerbianMontenegrin = 'sr_Latn_ME';
    case Shona              = 'sn';
    case Sindhi             = 'sd';
    case Sinhala            = 'si';
    case Slovak             = 'sk';
    case Slovenian          = 'sl';
    case Somali             = 'so';
    case Spanish            = 'es';
    case Sundanese          = 'su';
    case Swahili            = 'sw';
    case Swedish            = 'sv';
    case Tagalog            = 'tl';
    case Tajik              = 'tg';
    case Tamil              = 'ta';
    case Tatar              = 'tt';
    case Telugu             = 'te';
    case Thai               = 'th';
    case Tigrinya           = 'ti';
    case Turkish            = 'tr';
    case Turkmen            = 'tk';
    case TwiAkan            = 'ak';
    case Uighur             = 'ug';
    case Ukrainian          = 'uk';
    case Urdu               = 'ur';
    case UzbekCyrillic      = 'uz_Cyrl';
    case UzbekLatin         = 'uz_Latn';
    case Vietnamese         = 'vi';
    case Welsh              = 'cy';
    case Xhosa              = 'xh';
    case Yiddish            = 'yi';
    case Yoruba             = 'yo';
    case Zulu               = 'zu';

    /**
     * Get an associative array of [case value => case value].
     */
    public static function onlyValues(): array
    {
        $cases = self::cases();

        return isset($cases[0]) && $cases[0] instanceof BackedEnum
            ? array_column($cases, 'value', 'value')
            : array_column($cases, 'value');
    }
}
