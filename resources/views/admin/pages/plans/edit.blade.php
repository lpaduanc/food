@extends('adminlte::page')

@section('title', 'Editar o Plano '. $plan->nome)

@section('content_header')
    <h1>Editar o Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" class="form" method="post">
                @csrf
                @method('PUT')
                @include('admin.pages.plans.partials.form')
                
            </form>
        </div>
    </div>
@endsection