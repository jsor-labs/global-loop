<?php

namespace Jsor;

use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;

final class GlobalLoop
{
    /**
     * @var LoopInterface
     */
    private static $loop;

    public static function set(LoopInterface $loop): void
    {
        self::$loop = $loop;
    }

    public static function get(): LoopInterface
    {
        return self::$loop;
    }

    public static function run(): void
    {
        self::$loop->run();
    }
}

GlobalLoop::set(Factory::create());
