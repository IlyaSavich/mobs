@extends('layouts.admin')

@section('content')

    {!! Form::open(['class' => '', 'route' => 'product.store']) !!}
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @include('errors.list')
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-field{{
                    $errors->has('title') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                        {!! Form::text('title', old('title'),['class' => 'form-control',
                        'placeholder' => 'Название', 'required']) !!}

                        @if ($errors->has('title'))
                            <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-body">
                            <img class="product-img"
                                 src="{{ asset('images/picture.jpg') }}">
                        </div>
                        <div class="box-footer">
                            {!! Form::file('image', ['id' => 'product-img-input']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-4 col-xs-6">
                    <div class="row">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <div class="col-md-6
                                input-group-lg input-group input-field{{
                                 $errors->has('price') ? ' has-error' : '' }}">

                                    {!! Form::number('price', old('price'),
                                    ['class' => 'form-control',
                                    'placeholder' => 'Цена', 'required']) !!}

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <p>Цена</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-briefcase"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row strut"></div>

                    <div class="row">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">В наличии</h3>
                            </div>
                            <div class="box-body">
                                <div class="input-group input-field{{
                                $errors->has('quantity') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                                <i class="fa fa-plus"></i></span>
                                    {!! Form::number('quantity', old('quantity'),
                                    ['class' => 'form-control',
                                     'id' => 'product-quantity-input',
                                    'placeholder' => 'Количество', 'required']) !!}

                                    @if ($errors->has('quantity'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Описание</h3>

                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool"
                                        data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group{{
                $errors->has('description') ? ' has-error' : '' }}">

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
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Свойства продукта</h3>

                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool"
                                        data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="property-data-table"
                                   class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Включить</th>
                                    <th>Название</th>
                                    <th>Значение</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>{!! Form::checkbox('property_id[]',
                                1, false, ['category_id' => 2]) !!}</td>
                                    <td>First</td>
                                    <td>{!! Form::text('test_text') !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! Form::checkbox('property_id[]',
                                2, false, ['category_id' => 2]) !!}</td>
                                    <td>Second</td>
                                    <td>{!! Form::select('test_select', [
                                    '1' => 'test_1',
                                    '2' => 'test_2',
                                    '3' => 'test_3',
                                    ]) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! Form::checkbox('property_id[]',
                                3, false, ['category_id' => 2]) !!}</td>
                                    <td>Third</td>
                                    <td>{!! Form::color('test_color') !!}</td>
                                </tr>
                                {{--@foreach($propertyTable as $property)--}}
                                {{--<tr>--}}
                                {{--<td>{!! Form::checkbox('property_id[]',--}}
                                {{--$property->id, false) !!}</td>--}}

                                {{--<td>{{ $property->title }}</td>--}}
                                {{--</tr>--}}
                                {{--@endforeach--}}

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
        </div>

        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    @if ($errors->has('categories_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('categories_id') }}</strong>
                        </span>
                    @endif
                    <h3 class="box-title">Категории</h3>

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool"
                                data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="product-category-data-table"
                           class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Включить</th>
                            <th>Название</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categoryTable as $category)
                            <tr>
                                <td>{!! Form::checkbox('categories_id[]',
                                $category->id, false, ['class' =>
                                 'form-group minimal check-product-category']) !!}</td>

                                <td>{{ $category->title }}</td>
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
            <a href="{{ route('product.list') }}"
               class="btn btn-warning btn-block">Отменить</a>
        </div>
        <div class="col-md-6">
            {!! Form::submit('Создать', ['class' => 'btn btn-success btn-block']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    {{--<div class="box box-success">--}}
    {{--<div class="box-header with-border">--}}
    {{--<h3 class="box-title">Новый товар</h3>--}}
    {{--</div>--}}

    {{--<div class="box-body">--}}

    {{--<div class="form-group input-field{{ $errors->has('categories_id') ?--}}
    {{--' has-error' : '' }}">--}}

    {{--{!! Form::select('categories_id[]', $categories, '',--}}
    {{--['class' => 'form-control select-category select2',--}}
    {{--'data-placeholder' => 'Категория', 'multiple', 'required']) !!}--}}

    {{--@if ($errors->has('categories_id'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('categories_id') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}



    {{--<div class="box-footer">--}}
    {{--<a href="#" class="btn btn-default">Отменить</a>--}}
    {{--{!! Form::submit('Отправить', ['class' => 'btn btn-success pull-right']) !!}--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}


@stop