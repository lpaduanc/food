@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('perfis.index') }}">Perfis</a>
        </li>
    </ol>
    <h1>Perfis <a href="{{ route('perfis.create') }}" class="btn btn-dark">Novo perfil</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="" method="post" class="form form-inline">
                @csrf
                <input
                    type="text"
                    name="filtro"
                    id="filtro"
                    placeholder="Nome ou descrição"
                    class="form-control"
                    value="{{ $filtro['filtro'] ?? '' }}"
                >
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perfis as $perfil)
                        <tr>
                            <td>
                                {{ $perfil->nome }}
                            </td>
                            <td>
                                {{-- <a href="{{ route('detalhes.perfil.index', $perfil->url) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('perfis.show', $perfil->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('perfis.edit', $perfil->id) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filtro))
                {{ $perfis->appends($filtro)->links('pagination::bootstrap-4') }}
            @else
                {{ $perfis->links('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
@stop