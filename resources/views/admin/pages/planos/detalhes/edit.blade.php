@extends('adminlte::page')

@section('title', 'Editar detalhe')

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
        <li class="breadcrumb-item">
            <a href="{{ route('detalhes.plano.index', $plano->url) }}">Detalhes</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('detalhes.plano.create', $plano->url) }}">Novo</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('detalhes.plano.edit', [$plano->url, $detalhe->id]) }}" class="active">Detalhe</a>
        </li>
    </ol>
    <h1>Editar detalhe {{ $detalhe->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('detalhes.plano.update', [$plano->url, $detalhe->id]) }}" method="post">
                @method('PUT')
                @include('admin.pages.planos.detalhes.partials.form')
            </form>
        </div>
    </div>
@stop