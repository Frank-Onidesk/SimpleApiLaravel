<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{

    public function index()
    {
      $books =   Books::all();
      return response()->json($books);
    }

    public function store(Request $request){
        $book = new Books;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->publish_date = $request->publish_date;
        $book->save();

        return response()->json([
            "message" => 'Book added'
        ], 409);  //201
    }


    public function show($id){
     $book = Book::find($id);
     if(!empty($book)){
        return response()->json($book);
     }else{
        return response()->json([
            "message" => 'Book not found'
        ],404);
     }
    }

    public function update(Request $request, $id){
        if( Book::where('id', $id)->exists()){
            $book = Book::find($id);
           $this->name =  is_null($request->name)  ? $book->name : $request->name;
           $this->author =  is_null($request->author)  ? $book->author : $request->author;
           $this->isbnname =  is_null($request->isbn)  ? $book->isbn : $request->isbn;
           $this->publish_date = is_null($request->publish_date) ? $book->publish_date : ($request->publish_date);
          $book->response()->json([
            "message" =>  "Book updated"
          ],200);
        }else{
            $book->response()->json([
                "message" =>  'No record found'
            ], 404);
        }
    }

    public function destroy($id){
        if($book->where('id', $id)->exists()){
           $book = Book::find($id);
           $book->delete();

           $book->response()->json([
            "message" => 'Record with id ' . $id . "deleted sucessfuly"
           ],201);

        }else{
            $book->response()->json([
                "message" => 'No record found'
            ], 404);
        }
    }
    
}
