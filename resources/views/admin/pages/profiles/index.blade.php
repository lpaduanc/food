@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('profile.index') }}">Perfis</a>
        </li>
    </ol>
    <h1>Perfis <a href="{{ route('profile.create') }}" class="btn btn-dark">Novo Perfil</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profile.search') }}" method="post" class="form form-inline">
                @csrf
                <input
                    type="text"
                    name="filter"
                    id="filter"
                    placeholder="Nome ou descrição"
                    class="form-control"
                    value="{{ $filter['filter'] ?? '' }}"
                >
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td>                                
                                <a href="{{ route('profile.show', $profile->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('profile.permission', $profile->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filter))
                {{ $profiles->appends($filter)->links('pagination::bootstrap-4') }}
            @else
                {{ $profiles->links('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
@stop