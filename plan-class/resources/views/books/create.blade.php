@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="create-title">Adicionar Livro</h2>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
            @error('titulo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="editora" class="form-label">Editora:</label>
            <input type="text" class="form-control @error('editora') is-invalid @enderror" id="editora" name="editora" value="{{ old('editora') }}" required>
            @error('editora')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor:</label>
            <input type="text" class="form-control @error('autor') is-invalid @enderror" id="autor" name="autor" value="{{ old('autor') }}" required>
            @error('autor')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="subtitulo" class="form-label">Subtítulo:</label>
            <input type="text" class="form-control @error('subtitulo') is-invalid @enderror" id="subtitulo" name="subtitulo" value="{{ old('subtitulo') }}">
            @error('subtitulo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="anopublicacao" class="form-label">Ano de Publicação:</label>
            <input type="number" class="form-control @error('anopublicacao') is-invalid @enderror" id="anopublicacao" name="anopublicacao" value="{{ old('anopublicacao') }}" required>
            @error('anopublicacao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Adicionar Livro</button>
        </div>
    </form>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/create-book.css') }}">
@endsection
