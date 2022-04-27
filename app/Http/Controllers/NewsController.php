<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function list()
    {
        $news = collect([
            [
                'title' => 'News List',
                'content' => 'This is the news list page.',
                'author' => 'John Doe'
            ],
            [
                'title' => 'News List',
                'content' => 'This is the news list page.',
                'author' => 'John Doe'
            ],
            [
                'title' => 'News List',
                'content' => 'This is the news list page.',
                'author' => 'John Doe'
            ],
        ]);
        return view('news/news_list', compact('news'));
    }
}
