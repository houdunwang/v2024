# Pretty Array

<img src="https://preview.dragon-code.pro/TheDragonCode/pretty-array.svg?brand=php" alt="Pretty Array"/>

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![Github Workflow Status][badge_build]][link_build]
[![License][badge_license]][link_license]

> Simple conversion of an array to a pretty view.


## Installation

To get the latest version of `Pretty Array` package, simply require the project using [Composer](https://getcomposer.org):

```
composer require dragon-code/pretty-array
```

Instead, you may of course manually update your `require` block and run `composer update` if you so choose:

```json
{
    "require": {
        "dragon-code/pretty-array": "^4.0"
    }
}
```

## Introduction

> Q: Why did you create this package when there is a cooler [symfony/var-exporter](https://github.com/symfony/var-exporter)?

The big minus of package [symfony/var-exporter](https://github.com/symfony/var-exporter) is that it works differently with numeric keys.

For example, we have an array:

```php
$array = [
    100 => 'foo',
    200 => 'bar',
    201 => 'baz',
    202 => 'qwe',
    205 => 'ert',
    206 => 'tyu'
];
```

When exporting through it, the file will contain the following content:

```php
$array = [
    100 => 'foo',
    200 => 'bar',
    'baz',
    'qwe',
    205 => 'ert',
    'tyu'
];
```

> Q: Why do you think this is bad?

This package has a framework-independent base. However, it was originally developed as an assistant for
the [Laravel Lang: HTTP Statuses](https://github.com/Laravel-Lang/http-statuses)
package.

This package allows you to publish language translations of the HTTP Status Codes for the Laravel and Lumen frameworks.

A feature of the framework is that IDEs that help with development do not know how to read the numeric keys of arrays of translation files, so it was necessary to translate
theminto a text equivalent.

This behavior includes [http-statuses.php](https://github.com/Laravel-Lang/http-statuses/blob/main/source/http-statuses.php) file:

```php
<?php

return [
    'unknownError' => 'Unknown Error',
    '0' => 'Unknown Error',

    '100' => 'Continue',
    '101' => 'Switching Protocols',
    '102' => 'Processing',

    '200' => 'OK',
    '201' => 'Created',
    '202' => 'Accepted',
    '203' => 'Non-Authoritative Information',
    '204' => 'No Content',
    '205' => 'Reset Content',
    '206' => 'Partial Content',
    '207' => 'Multi-Status',
    '208' => 'Already Reported',
    '226' => 'IM Used',

// ...
```

The peculiarity of the package is that it takes the values of the source file and combines it with what is already in the application. Thus, the output is a file with numeric keys
that IDE helpers cannot read:

```php
<?php

return [
    'unknownError' => 'Unknown Error',
    0 => 'Unknown Error',

    100 => 'Continue',
    'Switching Protocols',
    'Processing',

    200 => 'OK',
    '201' => 'Created',
    'Accepted',
    'Non-Authoritative Information',
    'No Content',
    'Reset Content',
    'Partial Content',
    'Multi-Status',
    'Already Reported',
    226 => 'IM Used',

// ...
```

## Using

Source array for all examples:

```php
$array = array (
    'foo' => 1,
    'bar' => 2,
    'baz' => 3,
    'qwerty' => 'qaz',
    'baq' => array (
        0 => 'qwe',
        '1' => 'rty',
        'asd' => 'zxc',
    ),
    'asdfgh' => array (
        'foobarbaz' => 'qwe',
        2 => 'rty',
        'qawsed' => 'zxc',
    ),
    2 => 'iop',
);
```

### Saving numeric keys without alignment

```php
use DragonCode\PrettyArray\Services\Formatter;

$service = Formatter::make();

return $service->raw($array);
```

Result:

```text
[
    'foo' => 1,
    'bar' => 2,
    'baz' => 3,
    'qwerty' => 'qaz',
    'baq' => [
        0 => 'qwe',
        1 => 'rty',
        'asd' => 'zxc',
    ],
    'asdfgh' => [
        'foobarbaz' => 'qwe',
        2 => 'rty',
        'qawsed' => 'zxc',
    ],
    2 => 'iop',
]
```

### Saving string keys without alignment

```php
use DragonCode\PrettyArray\Services\Formatter;

$service = Formatter::make();
$service->setKeyAsString();

return $service->raw($array);
```

Result:

```text
[
    'foo' => 1,
    'bar' => 2,
    'baz' => 3,
    'qwerty' => 'qaz',
    'baq' => [
        '0' => 'qwe',
        '1' => 'rty',
        'asd' => 'zxc',
    ],
    'asdfgh' => [
        'foobarbaz' => 'qwe',
        '2' => 'rty',
        'qawsed' => 'zxc',
    ],
    '2' => 'iop',
]
```

### Saving numeric keys with alignment

```php
use DragonCode\PrettyArray\Services\Formatter;

$service = Formatter::make();
$service->setEqualsAlign();

return $service->raw($array);
```

Result:

```text
[
    'foo'    => 1,
    'bar'    => 2,
    'baz'    => 3,
    'qwerty' => 'qaz',
    'baq'    => [
        0     => 'qwe',
        1     => 'rty',
        'asd' => 'zxc',
    ],
    'asdfgh' => [
        'foobarbaz' => 'qwe',
        2           => 'rty',
        'qawsed'    => 'zxc',
    ],
    2        => 'iop',
]
```

### Saving string keys with alignment

```php
use DragonCode\PrettyArray\Services\Formatter;

$service = Formatter::make();
$service->setKeyAsString();
$service->setEqualsAlign();

return $service->raw($array);
```

Result:

```text
[
    'foo'    => 1,
    'bar'    => 2,
    'baz'    => 3,
    'qwerty' => 'qaz',
    'baq'    => [
        '0'   => 'qwe',
        '1'   => 'rty',
        'asd' => 'zxc',
    ],
    'asdfgh' => [
        'foobarbaz' => 'qwe',
        '2'         => 'rty',
        'qawsed'    => 'zxc',
    ],
    '2'      => 'iop',
]
```

### Saving simple array

```php
use DragonCode\PrettyArray\Services\Formatter;

$service = Formatter::make();
$service->setSimple();

return $service->raw($array);
```

Result:

```text
[
    1,
    2,
    3,
    'qaz',
    [
        'qwe',
        'rty',
        'zxc',
    ],
    [
        'qwe',
        'rty',
        'zxc',
    ],
    'iop',
]
```

### Change key case

```php
use DragonCode\Contracts\Pretty\Arr\Caseable;
use DragonCode\PrettyArray\Services\Formatter;

$service = Formatter::make();
$service->setCase(Caseable::PASCAL_CASE);

return $service->raw($array);
```

Result:

```text
[
    'Foo' => 1,
    'Bar' => 2,
    'Baz' => 3,
    'QweRty' => 'qaz',
    'Baq' => [
        0 => 'qwe',
        1 => 'rty',
        'Asd' => 'zxc',
    ],
    'AsdFgh' => [
        'FooBarBaz' => 'qwe',
        2 => 'rty',
        'QawSed' => 'zxc',
    ],
    2 => 'iop',
]
```

The following options are available:

* camelCase (`DragonCode\Contracts\Pretty\Arr\Caseable::CAMEL_CASE`);
* kebab-case (`DragonCode\Contracts\Pretty\Arr\Caseable::KEBAB_CASE`);
* PascalCase (`DragonCode\Contracts\Pretty\Arr\Caseable::PASCAL_CASE`);
* snake_case (`DragonCode\Contracts\Pretty\Arr\Caseable::SNAKE_CASE`);
* no case (`DragonCode\Contracts\Pretty\Arr\Caseable::NO_CASE`). By default;

`NO_CASE` means that key register processing will not be performed.


### Storing file

```php
use DragonCode\PrettyArray\Services\File;
use DragonCode\PrettyArray\Services\Formatter;

$service = Formatter::make();

$formatted = $service->raw($array);

File::make($formatted)
    ->store('foo.php');
```

Result in stored file `foo.php`:

```php
<?php

return [
    'foo' => 1,
    'bar' => 2,
    'baz' => 3,
    'qwerty' => 'qaz',
    'baq' => [
        0 => 'qwe',
        1 => 'rty',
        'asd' => 'zxc',
    ],
    'asdfgh' => [
        'foobarbaz' => 'qwe',
        2 => 'rty',
        'qawsed' => 'zxc',
    ],
    2 => 'iop',
];
```

#### As JSON

```php
use DragonCode\PrettyArray\Services\File;
use DragonCode\PrettyArray\Services\Formatter;

$service = Formatter::make();

$service->asJson();

$formatted = $service->raw($array);

File::make($formatted)
    ->store('foo.json');
```

Result in stored file `foo.json`:

```json
{
    "foo": 1,
    "bar": 2,
    "baz": 3,
    "qwerty": "qaz",
    "baq": {
        "0": "qwe",
        "1": "rty",
        "asd": "zxc"
    },
    "asdfgh": {
        "foobarbaz": "qwe",
        "2": "rty",
        "qawsed": "zxc"
    },
    "2": "'iop'"
}
```

## License

This package is licensed under the [MIT License](LICENSE).


[badge_build]:          https://img.shields.io/github/actions/workflow/status/TheDragonCode/pretty-array/phpunit.yml?style=flat-square

[badge_downloads]:      https://img.shields.io/packagist/dt/dragon-code/pretty-array.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/dragon-code/pretty-array.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/TheDragonCode/pretty-array?label=stable&style=flat-square

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_build]:           https://github.com/TheDragonCode/pretty-array/actions

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/dragon-code/pretty-array
