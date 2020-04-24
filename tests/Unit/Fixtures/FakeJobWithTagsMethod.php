<?php

namespace Donparapidos\Horizon\Tests\Unit\Fixtures;

class FakeJobWithTagsMethod
{
    public function tags()
    {
        return [
            'first',
            'second',
        ];
    }
}
