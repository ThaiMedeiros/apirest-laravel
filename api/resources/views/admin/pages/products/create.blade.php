@extends('admin.layouts.app')

@section('title', 'Cadastrar Produtos')

@section('content')

    <h1>Cadastrar Novo Produto</h1>

    @include('admin.includes.alerts')

    <form action="{{route('products.store')}}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="description" placeholder="Descrição" value="{{ old('description') }}">
        </div>
        <div class="form-group">
            <input class="form-control" type="number" name="price" placeholder="Preço" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">enviar</button>
        </div>
    </form>

@endsection
