<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookManagementTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', $this->data());

        $book = Book::first();

        // $response->assertOk();
        $this->assertCount(1, Book::all());

        $response->assertRedirect($book->path());
    }

    /** @test */
    public function a_title_is_required()
    {
        $response = $this->post('/books', array_merge($this->data(), ['title' => '']));

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_author_id_is_required()
    {
        $response = $this->post('/books', array_merge($this->data(), ['author_id' => '']));

        $response->assertSessionHasErrors('author_id');
    }

    /** @test */
    public function a_book_can_be_update()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', $this->data());

        $book = Book::first();

        $response = $this->patch($book->path(), [
            'title' => 'New Title',
            'author_id' => 'New Author'
        ]);

        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals(2, Book::first()->author_id);

        $response->assertRedirect($book->path());
    }

    /** @test */
    public function a_book_can_be_delete()
    {
        $this->withoutExceptionHandling();
        
        $this->post('/books', $this->data());

        $this->assertCount(1, Book::all());

        $book = Book::first();

        $response = $this->delete($book->path());

        $this->assertCount(0, Book::all());

        $response->assertRedirect('/books');
    }

    /** @test */
    public function a_new_author_is_automatically_added()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'New Title',
            'author_id' => 'Victor'
        ]);

        $book = Book::first();
        $author = Author::first();

        $this->assertEquals($author->id, $book->author_id);
        $this->assertCount(1, Author::all());
    }

    private function data()
    {
        return [
            'title' => 'New Title',
            'author_id' => 'Victor'
        ];
    }
}