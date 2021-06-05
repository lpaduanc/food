@extends('adminlte::page')

@section('title', 'Detalhes do perfil')

@section('content_header')
    <h1>Detalhes do perfil {{ $perfil->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $perfil->nome }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $perfil->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('perfis.destroy', $perfil->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
@endsection