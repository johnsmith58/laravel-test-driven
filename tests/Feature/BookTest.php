<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'New Title',
            'author' => 'New Author',
        ]);

        $book = Book::first();

        // $response->assertOk();
        $this->assertCount(1, Book::all());

        $response->assertRedirect($book->path());
    }

    /** @test */
    public function a_title_is_required()
    {
        $response = $this->post('/books', [
            'title' => '',
            'author' => 'New Author',
        ]);

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_author_is_required()
    {
        $response = $this->post('/books', [
            'title' => 'New Title',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');
    }

    /** @test */
    public function a_book_can_be_update()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'Cool Title',
            'author' => 'Victor'
        ]);

        $book = Book::first();

        $response = $this->patch($book->path(), [
            'title' => 'New Title',
            'author' => 'New Author'
        ]);

        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('New Author', Book::first()->author);

        $response->assertRedirect($book->path());
    }

    /** @test */
    public function a_book_can_be_delete()
    {
        $this->withoutExceptionHandling();
        
        $this->post('/books', [
            'title' => 'New Title',
            'author' => 'New Author'
        ]);

        $this->assertCount(1, Book::all());

        $book = Book::first();

        $response = $this->delete($book->path());

        $this->assertCount(0, Book::all());

        $response->assertRedirect('/books');
    }
}
