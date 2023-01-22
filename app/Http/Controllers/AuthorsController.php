<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorsController extends Controller
{
    public function showAllAuthors()
    {
        $authors = Author::select('id', 'name')->get();

       return response()->json($authors);
    }

    public function showAUniqueAuthor(int $id) {
        $author = Author::find($id);

        if(!$author) {
            return response()->json(['message' => 'author not found']);
        }

        return response()->json($author);
    }

    public function createAuthor(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:authors,name'
        ]);

        $author = Author::create($request->all());

        return response()->json($author);
    }

    public function updateAuthor(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $author = Author::find($id);
        $author->update($request->all());

        return response()->json($author);
    }

    public function deleteAuthor(int $id)
    {
        $author = Author::find($id);
        $author->delete();

        return response()->json(['message' => 'author deleted']);
    }
}
