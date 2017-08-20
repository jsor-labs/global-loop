<?php

namespace Jsor\GlobalLoop;

use PHPUnit\Framework\TestCase;
use React\EventLoop\LoopInterface;

class LoopTest extends TestCase
{
    /** @test */
    public function it_gets_the_loop()
    {
        $this->assertInstanceOf(LoopInterface::class, Loop::get());
    }

    /** @test */
    public function is_allows_setting_a_custom_loop()
    {
        $loop = Loop::get();
        $custom = $this->getMockBuilder(LoopInterface::class)->getMock();

        Loop::set($custom);

        $this->assertSame($custom, Loop::get());

        Loop::set($loop);
    }

    /** @test */
    public function it_returns_the_same_loop_instance_for_subsequent_get_calls()
    {
        $this->assertSame(Loop::get(), Loop::get());
    }

    /** @test */
    public function it_runs_the_loop()
    {
        $loop = Loop::get();

        $called = false;

        $loop->futureTick(function() use (&$called) {
            $called = true;
        });

        Loop::run();

        $this->assertTrue($called);
    }
}
