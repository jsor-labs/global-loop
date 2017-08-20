<?php

namespace Jsor\GlobalLoop;

use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;

final class Loop
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

Loop::set(Factory::create());
