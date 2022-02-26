@extends('adminlte::page')

@section('title', 'Editar o Perfil '. $profile->name)

@section('content_header')
    <h1>Editar o Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profile.update', $profile->id) }}" class="form" method="post">
                @method('PUT')
                @include('admin.pages.profiles.partials.form')
                
            </form>
        </div>
    </div>
@endsection