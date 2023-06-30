<?php

declare(strict_types=1);
/**
 * This file is part of huangdijia/invade.
 *
 * @link     https://github.com/huangdijia/invade
 * @document https://github.com/huangdijia/php-coding-standard/blob/main/README.md
 * @contact  Deeka Wong <huangdijia@gmail.com>
 */
beforeEach(function () {
    $this->obj = new class() {
        private string $privateProperty = 'privateValue';

        private function privateMethod(): string
        {
            return 'private return value';
        }
    };
});

it('can read a private property of an object', function () {
    $privateValue = invade($this->obj)->privateProperty;

    expect($privateValue)->toBe('privateValue');
});

it('can set the private property of an object', function () {
    invade($this->obj)->privateProperty = 'changedValue';

    $privateValue = invade($this->obj)->privateProperty;

    expect($privateValue)->toBe('changedValue');
});

it('can call the private method of an object', function () {
    $returnValue = invade($this->obj)->privateMethod();

    expect($returnValue)->toBe('private return value');
});
