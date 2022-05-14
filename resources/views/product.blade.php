@extends('layout')
@section('title', 'Formulário de Produto')
@section('content')
    @include('includes.menu')

<div class="row'">
    <div class="col-lg-12">
    @include ('includes.errors')    
    @if($product->id)
    <form action="{{ route('produtosupdate', ['id' => $product->id]) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
    @else
    <form action="{{ route('produtosinsert') }}" method="POST">
    @endif
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" value="{{$product->name}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Selecione</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ ($product->category_id == $category->id) ? 'selected' : '' }}>
                                {{ $category->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="price">Preço</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $product->price}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="minimum_quantity">Quantidade Mínima p/ Compra</label>
                        <input type="text" class="form-control" name="minimum_quantity" id="minimum_quantity" value="{{ $product->minimum_quantity}}">
                    </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="active">Ativo?</label>
                    <select name="active" id="active" class="form-control">
                        <option value="1" {{ $product->active ? 'selected' : ''}}>Sim</option>
                        <option value="0" {{ !$product->active ? 'selected' : ''}}>Não</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="featured">Destaque?</label>
                    <select name="featured" id="featured" class="form-control">
                        <option value="1" {{ $product->featured ? 'selected' : ''}}>Sim</option>
                        <option value="0" {{ !$product->featured ? 'selected' : ''}}>Não</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" class="form-control">{{ $product->description}}</textarea>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="instructions">Instruções</label>
                    <textarea name="instructions" id="instructions" class="form-control">{{ $product->instructions}}</textarea>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="link_file">Link do Arquivo</label>
                    <input type="text" class="form-control" id="link_file" name="link_file" value="{{ $product->link_file}}">
                </div>
            </div>
</div>
        <div class="row">
            <div class="col-lg-12">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('produtos') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection