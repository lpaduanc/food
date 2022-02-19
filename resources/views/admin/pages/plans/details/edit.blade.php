@extends('adminlte::page')

@section('title', 'Editar detalhe')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('plans.index') }}">Planos</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('details.plan.create', $plan->url) }}">Novo</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('details.plan.edit', [$plan->url, $details->id]) }}" class="active">Detalhe</a>
        </li>
    </ol>
    <h1>Editar detalhe {{ $details->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.update', [$plan->url, $details->id]) }}" method="post">
                @method('PUT')
                @include('admin.pages.plans.details.partials.form')
            </form>
        </div>
    </div>
@stop