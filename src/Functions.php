<?php

declare(strict_types=1);
/**
 * This file is part of huangdijia/invade.
 *
 * @link     https://github.com/huangdijia/invade
 * @document https://github.com/huangdijia/php-coding-standard/blob/main/README.md
 * @contact  Deeka Wong <huangdijia@gmail.com>
 */
use Huangdijia\Invade\Invader;

if (! function_exists('invade')) {
    /**
     * @template T of object
     *
     * @param T $object
     * @return Invader<T>
     */
    function invade(object $object): object
    {
        return new class($object) {
            private $get;

            private $set;

            private $call;

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
        };
    }
}
