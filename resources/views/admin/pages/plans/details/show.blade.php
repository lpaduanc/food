@extends('adminlte::page')

@section('title', 'Detalhes')

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
    <h1>Detalhes {{ $details->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome</strong> {{ $details->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('details.plan.destroy', [$plan->url, $details->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Excluir</button>
            </form>
        </div>
    </div>
@stop