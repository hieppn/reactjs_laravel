<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Book;
use App\Category;
use App\User;
use App\Cart;
use App\Recharge;
use App\Message;
use App\Older;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class BookController extends Controller
{
    
    public function index()
    {
        $books = Book::all();
        foreach($books as $book){
          $book->category;
        }
        return json_encode($books);
    }
     public function newBook()
    {
        $books = Book::whereBetween('id', [1, 4])->get();
        foreach($books as $book){
          $book->category;
        }
        return json_encode($books);
    }
     function show($id,Request $Request){
        $book = Book::where('id','=',$id)->first();
          $book->category;
       return json_encode($book);
   }
}
