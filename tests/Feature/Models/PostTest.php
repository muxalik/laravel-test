<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @dataProvider readTimeDataProvider
     */
    public function test_correct_read_time_is_returned(
        int $wordCount,
        int $expectedResult,
    ): void {
        $words = fake()->words($wordCount, true);

        $post = Post::factory()->create([
            'content' => $words,
        ]);

        $this->assertEquals(
            $expectedResult,
            $post->calculateReadTime()
        );
    }

    public static function readTimeDataProvider(): array
    {
        return [
            'easy' => [3, 1],
            'mediun' => [265, 60],
            [530, 120],
            [500, 114],
        ];
    }
}
