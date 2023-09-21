<?php

declare(strict_types=1);
/**
 * This file is part of huangdijia/invade.
 *
 * @link     https://github.com/huangdijia/invade
 * @document https://github.com/huangdijia/invade/blob/main/README.md
 * @contact  Deeka Wong <huangdijia@gmail.com>
 */

namespace Huangdijia\Invade;

if (! function_exists('invade')) {
    /**
     * @template T of object
     *
     * @param T $object
     * @return T
     */
    function invade(object $object): object
    {
        return new class($object) {
            private $get;

            private $set;

            private $call;

            public function __construct(object $obj)
            {
                $this->get = (fn ($name) => $this->{$name})->bindTo($obj, $obj);
                $this->set = (fn ($name, $value) => $this->{$name} = $value)->bindTo($obj, $obj);
                $this->call = (fn ($name, $params) => $this->{$name}(...$params))->bindTo($obj, $obj);
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
