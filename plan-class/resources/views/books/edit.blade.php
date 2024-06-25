@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@section('content')
    <div class="container">
        <h2 class="edit-title"> Editar Livro</h2>
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT') 

            <form action="{{ route('books.update', $book) }}" method="POST">
                @csrf
                @method('PUT')
                
                


                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" value="{{ $book->titulo }}" required>
            
                <label for="editora">Editora:</label>
                <input type="text" name="editora" id="editora" value="{{ $book->editora }}" required>
            
                <label for="autor">Autor:</label>
                <input type="text" name="autor" id="autor" value="{{ $book->autor }}" required>
            
                <label for="subtitulo">Subtítulo:</label>
                <input type="text" name="subtitulo" id="subtitulo" value="{{ $book->subtitulo }}">
            
                <label for="anopublicacao">Ano de Publicação:</label>
                <input type="text" name="anopublicacao" id="anopublicacao" value="{{ $book->anopublicacao }}" required>
            <div class="text-center">
                <button type="submit" tex>Confirmar</button> 
                <a href="{{ route('books.index') }}" class="cancelar">Cancelar</a>
            </div>

                
                



            </form>
            
            </form>
            
        </form>
    </div>
@endsection
