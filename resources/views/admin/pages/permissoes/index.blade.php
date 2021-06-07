@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('permissoes.index') }}">Permissões</a>
        </li>
    </ol>
    <h1>Permissões <a href="{{ route('permissoes.create') }}" class="btn btn-dark">Nova permissao</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissoes.search') }}" method="post" class="form form-inline">
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
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissoes as $permissao)
                        <tr>
                            <td>
                                {{ $permissao->nome }}
                            </td>
                            <td>
                                <a href="{{ route('permissoes.show', $permissao->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('permissoes.edit', $permissao->id) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filtro))
                {{ $permissoes->appends($filtro)->links('pagination::bootstrap-4') }}
            @else
                {{ $permissoes->links('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
@stop