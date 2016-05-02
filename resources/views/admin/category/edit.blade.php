@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            @include('errors.list')

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Новая категория</h3>

                    <div class="box-tools pull-right">
                        {{--<button class="btn btn-box-tool" data-widget="collapse">--}}
                        <a href="{{ route('category.delete', $category->id) }}">
                            <i title="Удалить" class="fa fa-trash-o"></i>
                        </a>
                        {{--</button>--}}
                    </div>
                </div>

                {!! Form::open(['class' => '', 'route' => ['category.update', $category->id]]) !!}
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
                        {!! Form::select('parent_id', $categories, $category->parent_category_id,
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
                <div class="box-footer">
                    <a href="#" class="btn btn-default">Отменить</a>
                    {!! Form::submit('Отправить', ['class' => 'btn btn-success pull-right']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@stop