<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    public function testEmpty(): void
    {
        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee('No hay etiquetas');
    }

    public function testWithData(): void
    {
        $tag = Tag::factory()->create();

        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee($tag->name)
            ->assertDontSee('No hay etiquetas');
    }
}
