@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            @include('errors.list')

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Новый товар</h3>

                    <div class="box-tools pull-right">
                        <a href="{{ route('product.delete', $product->id) }}">
                            <i title="Удалить" class="fa fa-trash-o"></i>
                        </a>
                    </div>
                </div>

                {!! Form::open(['class' => '', 'route' => ['product.update', $product->id]]) !!}
                <div class="box-body">
                    <div class="input-group input-field{{ $errors->has('title') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-exchange"></i></span>
                        {!! Form::text('title', $product->title, ['class' => 'form-control',
                        'placeholder' => 'Название', 'required']) !!}

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group input-field{{ $errors->has('categories_id') ?
                     ' has-error' : '' }}">

                        {!! Form::select('categories_id[]', $categories, $product->categories_id,
                        ['class' => 'form-control select-category select2',
                         'data-placeholder' => 'Категория', 'multiple', 'required']) !!}

                        @if ($errors->has('categories_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categories_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group input-field{{ $errors->has('price') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-exchange"></i></span>
                        {!! Form::number('price', $product->price,['class' => 'form-control',
                        'placeholder' => 'Цена', 'required']) !!}

                        @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group input-field{{ $errors->has('quantity') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-exchange"></i></span>
                        {!! Form::number('quantity', $product->quantity,['class' => 'form-control',
                        'placeholder' => 'Количество в наличии', 'required']) !!}

                        @if ($errors->has('quantity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::textarea('description', $product->description,
                        ['class' => 'form-control', 'rows' => '4',
                         'placeholder' => 'Описание ...']) !!}

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