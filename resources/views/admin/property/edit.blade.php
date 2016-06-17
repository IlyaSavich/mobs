@extends('layouts.admin')

@section('content')

    {!! Form::open(['class' => '', 'route' => ['property.update', $property->id]]) !!}

    <div class="row">

        <div id="strut" class="col-md-3{{ $property->group_type ==
         \App\Services\PropertyGroupTypeService::SIMPLE_INPUT_GROUP_TYPE ? '' : ' display-none' }}"></div>

        <div class="col-md-6">

            @include('errors.list')

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Новое свойство</h3>
                </div>
                <div class="box-body">
                    <div class="input-group input-field{{ $errors->has('title') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-exchange"></i></span>
                        {!! Form::text('title', $property->title,['class' => 'form-control',
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
                        {!! Form::select('input_type', $inputTypes, $property->input_type,
                        ['class' => 'form-control', 'required']) !!}

                        @if ($errors->has('input_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('input_type') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group input-field{{ $errors->has('group_type') ?
                     ' has-error' : '' }}">

                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        {!! Form::select('group_type', $groupTypes, $property->group_type,
                        ['class' => 'form-control', 'required']) !!}

                        @if ($errors->has('group_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('group_type') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::textarea('description', $property->description,
                         ['class' => 'form-control', 'rows' => '4',
                          'placeholder' => 'Описание ...']) !!}

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6{{ $property->group_type ==
         \App\Services\PropertyGroupTypeService::SIMPLE_INPUT_GROUP_TYPE ? ' display-none' : '' }}"
             id="possible-inputs-box">

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h4>Возможные значения</h4>
                </div>
                <div class="box-body">

                    @foreach($property->possible_values as $possible_value)
                        <div class="form-group" id="property-possible-input">

                            {!! Form::text('possible_values[]', $possible_value,
                             ['class' => 'form-control', 'placeholder' => 'Значение']) !!}

                        </div>
                    @endforeach
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
        <div class="col-md-4">
            <a href="{{ route('property.delete', $property->id) }}"
               class="btn btn-danger btn-block">Удалить</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('property.list') }}" class="btn btn-warning btn-block">Отменить</a>
        </div>
        <div class="col-md-4">
            {!! Form::submit('Отправить', ['class' => 'btn btn-success btn-block pull-right']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@stop