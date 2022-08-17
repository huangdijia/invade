# A PHP function to access private properties and methods

[![Latest Test](https://github.com/huangdijia/invade/workflows/tests/badge.svg)](https://github.com/huangdijia/invade/actions)
[![Latest Stable Version](https://poser.pugx.org/huangdijia/invade/v/stable.svg)](https://packagist.org/packages/huangdijia/invade)
[![Latest Unstable Version](https://poser.pugx.org/huangdijia/invade/v/unstable.svg)](https://packagist.org/packages/huangdijia/invade)
[![Total Downloads](https://img.shields.io/packagist/dt/huangdijia/invade)](https://packagist.org/packages/huangdijia/invade)
[![License](https://img.shields.io/packagist/l/huangdijia/invade)](https://github.com/huangdijia/invade)

This package offers an `invade` function that will allow you to read/write private properties of an object. It will also allow you to call private methods.

## Installation

You can install the package via composer:

```bash
composer require huangdijia/invade
```

## Usage

Imagine you have this class defined which has a private property and method.

```php
class MyClass
{
    private string $privateProperty = 'private value';

    private function privateMethod(): string
    {
        return 'private return value';
    }
}

$myClass = new MyClass();
```

This is how you can get the value of the private property using the `invade` function.

```php
invade($myClass)->privateProperty; // returns 'private value'
```

The `invade` function also allows you to change private values.

```php
invade($myClass)->privateProperty = 'changed value';
invade($myClass)->privateProperty; // returns 'changed value
```

Using `invade` you can also call private functions.

```php
invade($myClass)->privateMethod(); // returns 'private return value'
```

## Testing

```bash
composer test
composer analyze
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
