@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('planos.create') }}" class="btn btn-dark">Adicionar Plano</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #Filtros
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="50px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($planos as $plano)
                        <tr>
                            <td>
                                {{ $plano->nome }}
                            </td>
                            <td>
                                {{ $plano->preco }}
                            </td>
                            <td>
                                <a href="" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $planos->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop