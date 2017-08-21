<?php

namespace Jsor;

use PHPUnit\Framework\TestCase;
use React\EventLoop\LoopInterface;

class GlobalLoopTest extends TestCase
{
    /** @test */
    public function it_gets_the_loop()
    {
        $this->assertInstanceOf(LoopInterface::class, GlobalLoop::get());
    }

    /** @test */
    public function is_allows_setting_a_custom_loop()
    {
        $loop = GlobalLoop::get();
        $custom = $this->getMockBuilder(LoopInterface::class)->getMock();

        GlobalLoop::set($custom);

        $this->assertSame($custom, GlobalLoop::get());

        GlobalLoop::set($loop);
    }

    /** @test */
    public function it_returns_the_same_loop_instance_for_subsequent_get_calls()
    {
        $this->assertSame(GlobalLoop::get(), GlobalLoop::get());
    }

    /** @test */
    public function it_runs_the_loop()
    {
        $loop = GlobalLoop::get();

        $called = false;

        $loop->futureTick(function() use (&$called) {
            $called = true;
        });

        GlobalLoop::run();

        $this->assertTrue($called);
    }
}
