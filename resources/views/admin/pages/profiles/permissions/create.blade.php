@extends('adminlte::page')

@section('title', 'Permissões disponíveis '.$profile->name)

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('profile.index') }}">Perfis</a>
        </li>
    </ol>
    <h1>Permissões disponíveis: <strong>{{ $profile->name }}</strong>
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
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('profile.permission.store', $profile->id) }}" method="post">
                        @csrf
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissions[]", value="{{ $permission->id }}">
                                </td>
                                <td>
                                    {{ $permission->name }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="500">
                                    <button type="submit" class="btn btn-success">Vincular</button>
                                </td>
                            </tr>
                        @endforeach
                    </form>
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