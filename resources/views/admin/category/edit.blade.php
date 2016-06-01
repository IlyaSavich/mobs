@extends('layouts.admin')

@section('content')

    {!! Form::open(['class' => '', 'route' => ['category.update', $category->id]]) !!}
    <div class="row">
        <div class="col-md-6">

            @include('errors.list')

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Новая категория</h3>

                    <div class="box-tools pull-right">
                        <a href="{{ route('category.delete', $category->id) }}">
                            <i title="Удалить" class="fa fa-trash-o"></i>
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="input-group input-field{{ $errors->has('title') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-exchange"></i></span>
                        {!! Form::text('title', $category->title,['class' => 'form-control', 'placeholder' => 'Название']) !!}

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group input-field{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        {!! Form::select('parent_id', $categories, $category->parent_id,
                        ['class' => 'form-control']) !!}

                        @if ($errors->has('parent_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('parent_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::textarea('description', $category->description, ['class' => 'form-control',
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

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Свойства категории</h3>
                </div>

                <div class="box-body">
                    <table id="property-data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Enable</th>
                            <th>Title</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($propertyTable as $property)
                            <tr>
                                <td>{!! Form::checkbox('property_id[]',
                                 $property->id,
                                 in_array($property->id, $category->properties_id)) !!}</td>

                                <td>{{ $property->title }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Enable</th>
                            <th>Title</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('category.list') }}"
               class="btn btn-warning btn-block">Отменить</a>
        </div>
        <div class="col-md-6">
            {!! Form::submit('Изменить', ['class' => 'btn btn-success btn-block']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@stop