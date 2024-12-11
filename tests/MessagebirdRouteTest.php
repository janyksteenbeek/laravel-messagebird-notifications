<?php

namespace NotificationChannels\Messagebird\Test;

use NotificationChannels\Messagebird\MessagebirdRoute;
use PHPUnit\Framework\TestCase;

class MessagebirdRouteTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiated()
    {
        $route = new MessagebirdRoute(['31650520659']);

        $this->assertInstanceOf(MessagebirdRoute::class, $route);
        $this->assertEquals(['31650520659'], $route->recipients);
        $this->assertNull($route->token);
        $this->assertNull($route->originator);
    }

    /** @test */
    public function it_can_be_created_using_make_method()
    {
        $route = MessagebirdRoute::make(['31650520659'], 'test_token', 'APPNAME');

        $this->assertInstanceOf(MessagebirdRoute::class, $route);
        $this->assertEquals(['31650520659'], $route->recipients);
        $this->assertEquals('test_token', $route->token);
        $this->assertEquals('APPNAME', $route->originator);
    }

    /** @test */
    public function it_accepts_multiple_recipients()
    {
        $recipients = ['31650520659', '31650520660', '31650520661'];
        $route = new MessagebirdRoute($recipients);

        $this->assertEquals($recipients, $route->recipients);
    }

    /** @test */
    public function it_can_be_created_with_only_recipients()
    {
        $route = MessagebirdRoute::make(['31650520659']);

        $this->assertEquals(['31650520659'], $route->recipients);
        $this->assertNull($route->token);
        $this->assertNull($route->originator);
    }
}
