@extends('adminlte::page')

@section('title', 'Permissões do Perfil '.$profile->name)

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('profile.index') }}">Perfis</a>
        </li>
    </ol>
    <h1>Permissões do Perfil <strong>{{ $profile->name }}</strong>
        <a href="{{ route('profile.permission.create', $profile->id) }}" class="btn btn-dark">Nova Permissão</a>
    </h1>
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td>                                
                                <a href="{{ route('profile.edit', $permission->id) }}" class="btn btn-info">Editar</a>                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filter))
                {{ $permissions->appends($filter)->links('pagination::bootstrap-4') }}
            @else
                {{ $permissions->links('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
@stop