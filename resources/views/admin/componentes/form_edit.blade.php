<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            @include('admin.includes.alerts')
            {{ Form::model($data, ['route' => [request()->segment(2).'.update', $data->id], 'class' => 'form', 'method' => 'PUT']) }}
                @include('admin.'.request()->segment(2).'.partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>