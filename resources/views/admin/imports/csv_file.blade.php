@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_index')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
           {{ Form::open(['route' => 'imports', 'files' => true]) }}
           
               <div class="form-group col-md-3">
                    {{ Form::label('conta_id','Conta corrente') }}
                    {{ Form::select('conta_id',$contas,null,['placeholder' => 'Selecione uma conta...', 'class' => 'form-control', 'id' => 'contas']) }}
                </div>
               
                <div class="form-group col-md-3">
                    {{ Form::label('local_id','Local') }}
                    {{ Form::select('local_id',$locais,null,['placeholder' => 'Selecione um local...', 'class' => 'form-control', 'id' => 'locais']) }}
                </div>
           
                <div class="form-group col-md-3">
                    {{ Form::label('conta_id','Selecione o arquivo CSV para importação') }}
                    <input type="file" name="file" accept=".csv">
                </div>      
                      
           
        </div>
        <div class="box-body">
            <button class="btn btn-success">Importe Unidades</button>
            <a class="btn btn-warning" href="{{ route('imports') }}">Exporte Unidades</a>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop