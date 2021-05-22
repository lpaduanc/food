@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('planos.index') }}">Planos</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('planos.show', $plano->url) }}">{{ $plano->nome }}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('detalhes.plano.index', $plano->url) }}" class="active">Detalhes</a>
        </li>
    </ol>
    <h1>Detalhes do Plano <a href="{{ route('detalhes.plano.create', $plano->url) }}" class="btn btn-dark">Novo</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalhes as $detalhe)
                        <tr>
                            <td>
                                {{ $detalhe->nome }}
                            </td>
                            <td>
                                R$ {{ number_format($plano->preco, 2, ',', '.')}}
                            </td>
                            <td>
                                <a href="{{ route('planos.show', $plano->url) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('detalhes.plano.edit', [$plano->url, $detalhe->id]) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filtro))
                {{ $detalhes->appends($filtro)->links('pagination::bootstrap-4') }}
            @else
                {{ $detalhes->links('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
@stop