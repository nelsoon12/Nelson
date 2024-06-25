@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="header">{{ __('LIVROS') }}</div>

                <div class="card-body">
                    @if (session('sucesso'))
                        <div class="alert alert-success" role="alert">
                            {{ session('sucesso') }}
                        </div>
                    @endif

                    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">{{ __('Adicionar Livro') }}</a>

                    @if ($books->isEmpty())
                        <p>{{ __('No books found.') }}</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Titulo') }}</th>
                                    <th>{{ __('Editora') }}</th>
                                    <th>{{ __('Autor') }}</th>
                                    <th>{{ __('Subtitulo') }}</th>
                                    <th>{{ __('Ano de Publicação') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->titulo }}</td>
                                        <td>{{ $book->editora }}</td>
                                        <td>{{ $book->autor }}</td>
                                        <td>{{ $book->subtitulo }}</td>
                                        <td>{{ $book->anopublicacao }}</td>
                                        <td>
                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure you want to delete this book?') }}')">{{ __('Deletar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>



                        

                        {{ $books->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
