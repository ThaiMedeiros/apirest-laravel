@extends('admin.layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')

    <h1>Produto: {{ $product->name }}</h1>
    <a href="{{ route('products.index') }}">Voltar a listagem dos produtos</a>

    <ul>
        <li><strong>Nome:</strong>{{ $product->name }}</li>
        <li><strong>Preço:</strong> {{ $product->price }}</li>
        <li><strong>Descrição:</strong> {{ $product->description }}</li>
    </ul>

    <form action="{{ route('products.destroy', $product->id ) }}" method="post">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger" type="submit">Deletar este produto</button>
    </form>

@endsection
