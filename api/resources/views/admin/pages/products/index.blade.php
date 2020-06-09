@extends('admin.layouts.app')

@section('title', 'Listar Produtos')

@section('content')

    <a href="{{ route('products.create') }}" class="btn btn-primary">Cadastrar</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preços</th>
                <th width="100">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td><a href="{{ route('products.edit', $product->id) }}">Editar</a></td>
                    <td><a href="{{ route('products.show', $product->id) }}">Detalhes</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $products->links() !!}

@endsection
