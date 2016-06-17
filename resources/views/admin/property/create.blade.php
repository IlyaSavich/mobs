@extends('layouts.admin')

@section('content')

    {!! Form::open(['class' => '', 'route' => 'property.store']) !!}

    <div class="row">

        {{--<div id="strut" class="col-md-3"></div>--}}

        <div class="col-md-6">

            @include('errors.list')

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Новое свойство</h3>
                </div>

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

                        <span class="input-group-addon"><i class="fa fa-money"></i></span>

                        {!! Form::select('input_type', $inputTypes[1], '',
                        ['class' => 'form-control', 'id'=> 'property-input-type', 'required']) !!}

                        @if ($errors->has('input_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('input_type') }}</strong>
                            </span>
                        @endif

                        <div class="display-none" id="property-input-type-json">
                            {{ $inputTypesJSON }}</div>

                    </div>
                    <div class="input-group input-field{{ $errors->has('group_type') ?
                     ' has-error' : '' }}">

                        <span class="input-group-addon"><i class="fa fa-money"></i></span>

                        {!! Form::select('group_type', $groupTypes, 0,
                        ['class' => 'form-control', 'id'=> 'property-group-type', 'required']) !!}

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

            </div>
        </div>

        <div class="col-md-6 " id="possible-inputs-box">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h4>Возможные значения</h4>
                </div>
                <div class="box-body">
                    <div class="input-group" id="property-possible-input">

                        {!! Form::text('possible_values[]', '', ['class' => 'form-control',
                         'placeholder' => 'Значение']) !!}

                        <span class="input-group-addon bg-red cursor-click"
                              id="remove-possible-input" onclick="removePossibleInput(this)">
                            <i class="fa fa-trash-o"></i></span>

                    </div>
                </div>
                <div class="box-footer">
                    <a href="#" class="btn" onclick="addPossibleInput()">
                        <i class="fa fa-plus"></i> Добавить
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('property.list') }}"
               class="btn btn-warning btn-block center-block">Отменить</a>
        </div>
        <div class="col-md-6">
            {!! Form::submit('Отправить', ['class' => 'btn btn-success btn-block pull-right center-block']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@stop