@extends('admin.layouts.app')

@section('title', 'Editar Produtos')

@section('content')

    <h1>Editar um Produto</h1>

    @include('admin.includes.alerts')

    <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Nome" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="description" placeholder="Descrição" value="{{ $product->description }}">
        </div>
        <div class="form-group">
            <input class="form-control" type="number" name="price" placeholder="Preço" value="{{ $product->price }}">
        </div>
        <div class="form-control">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">enviar</button>
        </div>
    </form>

@endsection
