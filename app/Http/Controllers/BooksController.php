<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function showAllBooks()
    {
        $books = Book::with('author')->get()->map(function ($book) {
            return [
                'id' => $book->id,
                'isbn' => $book->isbn,
                'title' => $book->title,
                'description' => $book->description,
                'image_url' => $book->image_url,
                'pages' => $book->pages,
                'release_year' => $book->release_year,
                'author' => $book->author->name
            ];
        });

       return response()->json($books);
    }

    public function showAUniqueBook(int $id) {
        $book = Book::with('author')->find($id);

        if(!$book) {
            return response()->json(['message' => 'book not found']);
        }

        return response()->json([
            'id' => $book->id,
            'isbn' => $book->isbn,
            'title' => $book->title,
            'description' => $book->description,
            'image_url' => $book->image_url,
            'pages' => $book->pages,
            'release_year' => $book->release_year,
            'author' => $book->author->name
        ]);
    }

    public function createBook(Request $request)
    {
        $request->validate([
            'isbn' => 'required|unique:books,isbn',
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required',
            'pages' => 'required|integer',
            'release_year' => 'required|integer',
            'author_id' => 'required|exists:authors,id'
        ]);

        $book = Book::create($request->all());

        return response()->json($book);
    }

    public function updateBook(Request $request, int $id)
    {
        $request->validate([
            'isbn' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required',
            'pages' => 'required|integer',
            'release_year' => 'required|integer',
            'author_id' => 'required|exists:authors,id'
        ]);

        $book = Book::find($id);

        if(!$book) {
            return response()->json(['message' => 'book not found']);
        }

        $book->update($request->all());

        return response()->json($book);
    }

    public function deleteBook(int $id)
    {
        $book = Book::where('id', $id)->first();

        if(!$book) {
            return response()->json(['message' => 'book not found']);
        }

        $book->delete();

        return response()->json(['message' => 'book deleted']);
    }
}
