<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('campo1','Campo1') }}
        {{ Form::text('campo1',null,['placeholder' => 'Descrição campo1','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('campo2','Campo2') }}
        {{ Form::text('campo2',null,['placeholder' => 'Descrição campo2','class' => 'form-control']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>