<?php

declare(strict_types=1);
/**
 * This file is part of huangdijia/invade.
 *
 * @link     https://github.com/huangdijia/invade
 * @contact  huangdijia@gmail.com
 */
namespace Huangdijia\Invade;

/**
 * @template T of object
 * @mixin T
 */
class Invader
{
    /** @var T */
    public object $obj;

    /**
     * @param T $obj
     */
    public function __construct(object $obj)
    {
        $this->obj = $obj;
    }

    public function __get(string $name): mixed
    {
        return (fn () => $this->{$name})->call($this->obj);
    }

    public function __set(string $name, mixed $value): void
    {
        (fn () => $this->{$name} = $value)->call($this->obj);
    }

    public function __call(string $name, array $params = []): mixed
    {
        return (fn () => $this->{$name}(...$params))->call($this->obj);
    }
}
