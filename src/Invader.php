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
    private $get;

    private $set;

    private $call;

    /**
     * @param T $obj
     */
    public function __construct(object $obj)
    {
        $this->get = (
            function ($name) { return $this->{$name}; }
        )->bindTo($obj, $obj);
        $this->set = (
            function ($name, $value) { $this->{$name} = $value; }
        )->bindTo($obj, $obj);
        $this->call = (
            function ($name, $params) { return $this->{$name}(...$params); }
        )->bindTo($obj, $obj);
    }

    public function __get(string $name): mixed
    {
        return ($this->get)($name);
    }

    public function __set(string $name, mixed $value): void
    {
        ($this->set)($name, $value);
    }

    public function __call(string $name, array $params = []): mixed
    {
        return ($this->call)($name, $params);
    }
}
