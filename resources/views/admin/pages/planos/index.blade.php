@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('planos.index') }}">Planos</a>
        </li>
    </ol>
    <h1>Planos <a href="{{ route('planos.create') }}" class="btn btn-dark">Novo Plano</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('planos.search') }}" method="post" class="form form-inline">
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
                        <th>Preço</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($planos as $plano)
                        <tr>
                            <td>
                                {{ $plano->nome }}
                            </td>
                            <td>
                                R$ {{ number_format($plano->preco, 2, ',', '.')}}
                            </td>
                            <td>
                                <a href="{{ route('planos.show', $plano->url) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('planos.edit', $plano->url) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filtro))
                {{ $planos->appends($filtro)->links('pagination::bootstrap-4') }}
            @else
                {{ $planos->links('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
@stop