@extends('adminlte::page')

@section('title', 'Detalhes da Permissão')

@section('content_header')
    <h1>Detalhes da Permissão {{ $permissao->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permissao->nome }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $permissao->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('permissoes.destroy', $permissao->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
@endsection