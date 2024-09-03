<?php

declare(strict_types=1);

namespace LaravelLang\LocaleList;

use ArchTech\Enums\From;
use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

enum Direction: string
{
    use From;
    use Names;
    use Options;
    use Values;

    case LeftToRight = 'ltr';
    case RightToLeft = 'rtl';
}
