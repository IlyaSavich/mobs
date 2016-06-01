@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            @include('errors.list')

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Новое свойство</h3>
                </div>

                {!! Form::open(['class' => '', 'route' => 'property.store']) !!}
                <div class="box-body">
                    <div class="input-group input-field{{ $errors->has('title') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-exchange"></i></span>
                        {!! Form::text('title', old('title'),['class' => 'form-control',
                        'placeholder' => 'Название', 'required']) !!}

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group input-field{{ $errors->has('input_type') ?
                     ' has-error' : '' }}">

                        <span class="none-display"
                              id="input-types">{{ $inputTypesJSON }}</span>
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        {!! Form::select('input_type', $inputTypes[1], '',
                        ['class' => 'form-control',
                         'id' => 'property-input-type', 'required']) !!}

                        @if ($errors->has('input_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('input_type') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group input-field{{ $errors->has('group_type') ?
                     ' has-error' : '' }}">

                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        {!! Form::select('group_type', $groupTypes, 1,
                        ['class' => 'form-control',
                         'id' => 'property-group-type', 'required']) !!}

                        @if ($errors->has('group_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('group_type') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::textarea('description', '', ['class' => 'form-control',
                         'rows' => '4', 'placeholder' => 'Описание ...']) !!}

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="box-footer">
                    <a href="#" class="btn btn-default">Отменить</a>
                    {!! Form::submit('Создать', ['class' => 'btn btn-success pull-right']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@stop