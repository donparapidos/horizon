<?php

namespace Donparapidos\Horizon\Tests\Feature;

use Donparapidos\Horizon\SupervisorOptions;
use Donparapidos\Horizon\Tests\IntegrationTest;

class SupervisorOptionsTest extends IntegrationTest
{
    public function test_default_queue_is_used_when_null_is_given()
    {
        $options = new SupervisorOptions('name', 'redis');
        $this->assertSame('default', $options->queue);
    }
}
