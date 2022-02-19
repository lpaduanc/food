@extends('adminlte::page')

@section('title', 'Detalhes do perfil')

@section('content_header')
    <h1>Detalhes do perfil {{ $profile->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->nome }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $profile->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('profile.destroy', $profile->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
@endsection