<?php

namespace Tests\Unit\Models;

use App\Models\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_slug(): void
    {
        $tag = new Tag();
        $tag->name = 'PHP 8';

        $this->assertEquals('php-8', $tag->slug);
    }
}
