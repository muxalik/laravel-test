<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DummyTest extends TestCase
{
    /**
     * @testWith [3, 1, 4] 
     *           [2413, 87, 2500] 
     */
    public function test_it_can_sum_integers(int $a, int $b, int $result): void
    {
        $this->assertSame($result, $a + $b);
    }
}
