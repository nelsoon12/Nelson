<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Carrega os livros do usuário autenticado com paginação
            $books = Auth::user()->books()->paginate(10);
            // Retorna a view 'books.index' passando os livros carregados
            return view('books.index', compact('books'));
        } else {
            // Se o usuário não estiver autenticado, redireciona para a página de login
            return redirect()->route('login')->with('error', 'Faça login para acessar seus livros.');
        }
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'editora' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'anopublicacao' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        Auth::user()->books()->create($request->all());

        return redirect()->route('books.index')->with('success', 'Livro adicionado com sucesso!');
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'editora' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'anopublicacao' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        $book->update($request->all());

        // Redireciona de volta para a página de listagem de livros
        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro deletado com sucesso!');
    }
}
