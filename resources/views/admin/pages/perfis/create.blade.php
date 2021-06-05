@extends('adminlte::page')

@section('title', 'Cadastrar Novo perfil')

@section('content_header')
    <h1>Cadastrar Novo Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('perfis.store') }}" class="form" method="post">
                @include('admin.pages.perfis.partials.form')
                
            </form>
        </div>
    </div>
@endsection