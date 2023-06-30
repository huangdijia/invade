<?php

declare(strict_types=1);
/**
 * This file is part of huangdijia/invade.
 *
 * @link     https://github.com/huangdijia/invade
 * @document https://github.com/huangdijia/php-coding-standard/blob/main/README.md
 * @contact  Deeka Wong <huangdijia@gmail.com>
 */
set_error_handler(fn ($severity, $message, $file, $line) => throw new Exception($message, 1));

beforeEach(function () {
    $this->bar = new Bar();
});

it('can not read a private property of parent class', function () {
    invade($this->bar)->privateProperty;
})->throws('Undefined property: Bar::$privateProperty');

it('can call the private method of parent class', function () {
    invade($this->bar)->privateMethod();
})->throws('Call to private method Foo::privateMethod() from scope Bar');

class Foo
{
    private string $privateProperty = 'privateValue';

    private function privateMethod(): string
    {
        return 'private return value';
    }
}

class Bar extends Foo
{
}
