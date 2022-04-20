<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_author_can_be_add()
    {
        $this->withoutExceptionHandling();

        $this->post('/authors', [
            'name' => 'New Author',
            'dob' => '01/12/1999'
        ]);

        $author = Author::all();
        
        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);
        $this->assertEquals('1999/01/12', $author->first()->dob->format('Y/m/d'));
    }
}
