<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testStore(): void
    {
        $this
            ->post('tags', ['name' => 'PHP'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('tags', ['name' => 'PHP']);
    }

    public function testDestroy()
    {
        $tag = Tag::factory()->create(); //Se usa factory para crear un tag con información falsa

        $this
            ->delete("tags/{$tag->id}")
            ->assertRedirect('/');

        $this->assertDatabaseMissing('tags', ['name' => $tag->name]); //Se verifica que el tag ya no exista en la base de datos
            
        // $this->withoutExceptionHandling(); //Para ver los errores en la consola
    }

    public function testValidate(){
        $this
        ->post('tags', ['name' => ''])
        ->assertSessionHasErrors('name');
    }
}
