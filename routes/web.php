<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('books', [BookController::class, 'store']);
Route::patch('books/{book}', [BookController::class, 'update']);
Route::delete('books/{book}', [BookController::class, 'delete']);

Route::get('books/{id}', [BookController::class, 'show']);

Route::post('authors', [AuthorController::class, 'store']);

Route::get('news-list', [NewsController::class, 'list']);


Route::get('array-sort', function(){

    function findTotal($array)
    {
        $new_num = 0;
        $new_arr = [];
        foreach ($array as $key => $value) {
            if($value % 2 == 0 && $value != 8)
            {
                $new_num += 1;
                array_push($new_arr, 1);
            }else if($value % 2 != 0)
            {
                $new_num += 3;
                array_push($new_arr, 3);
            }else if($value == 8)
            {
                $new_num += 5;
                array_push($new_arr, 5);
            }
        }
        echo $new_num . '<br>';
    }
    findTotal([1,2,3,4,5]);
    findTotal([15,25,35]);
    findTotal([8,8]);
});

Route::get('array-sum', function(){

    function sum_array($no1, $no2)
    {
        $array = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
        if($no1 < 0 && $no2 < 0)
        {
            echo -1 . '<br>';
        }
        if($no1 > $no2)
        {
            echo 0 . '<br>';
        }
        if(!in_array($no2, $array))
        {
            echo $no1 + $no2;
        }else{
            $first_index = array_search($no1, $array);
            $last_index = $first_index == 0 ? array_search($no2, $array)+1 : array_search($no2, $array)-1;
            $new_array = array_splice($array, $first_index, $last_index);
            echo array_sum($new_array) . '<br>';
        }
    }

    sum_array(10, 20);
    sum_array(10, 30);
    sum_array(30, 50);
    sum_array(90, 120);

});

Route::get('letter-count', function(){

    function LetterCounter($string)
    {
        $st_arr = [];
        for($i = 0; $i < strlen($string); $i++)
        {
            if($string[$i] != ' ')
            {
                if(array_key_exists($string[$i], $st_arr))
                {
                    $st_arr[$string[$i]] = $st_arr[$string[$i]]+1;
                }else{
                    $st_arr[$string[$i]] = 1;
                }
            }
        }
        foreach($st_arr as $key => $val)
        {
            echo strtolower($key);
            for($i = 0; $i < $val; $i++)
            {
                echo '*';
            }
            echo ',';
        }
        echo '<br>';
    }

    LetterCounter('Tessst HLAssurance');
    LetterCounter('INTERVIEW');
    LetterCounter('aaa');
    LetterCounter('coding exercise');
});