@extends('adminlte::page')
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard">&nbsp;</i>Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route(request()->segment(2).'.index') }}">{{ ucfirst(request()->segment(2)) }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
    </ol>
</nav>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box box-body">
            @include('admin.includes.alerts')
            {{ Form::open(['route' => request()->segment(2).'.store','class' => 'form']) }}
                @include('admin.'.request()->segment(2).'.partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop