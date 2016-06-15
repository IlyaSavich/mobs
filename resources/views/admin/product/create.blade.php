@extends('layouts.admin')

@section('content')

    {!! Form::open(['class' => 'submit-product', 'route' => 'product.store']) !!}

    <div class="row">

        <div class="col-md-8">

            <div class="row">
                <div class="col-md-5">

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
                </div>
            </div>

            <div class="row">

                <div class="col-md-5">
                    <div class="box">
                        <div class="box-body">
                            <img src="{{ asset('images/picture.jpg') }}" class="product-img">
                        </div>
                        <div class="box-footer">
                            {!! Form::file('image') !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>

                <div class="col-lg-4 col-xs-6">
                    <div class="row">
                        <div class="small-box bg-green">
                            <div class="inner">

                                <div class="col-md-6 input-group input-field{{
                                $errors->has('price') ? ' has-error' : '' }}">

                                    {!! Form::number('price', old('price'), [
                                    'class' => 'form-control input-lg', 'min' => 0,
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

                    <div class="row">
                        <div class="info-box">
                            <span class="info-box-icon bg-green">
                                <i class="ion ion-ios-cart-outline"></i></span>

                            <div class="info-box-content">
                                <h4>В наличии</h4>

                                <div class="info-box-number input-group input-field
                                {{ $errors->has('quantity') ? ' has-error' : '' }}">

                                    {!! Form::number('quantity', old('quantity'),
                                    ['class' => 'form-control', 'min' => 0,
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
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-text-width"></i>

                            <h3 class="box-title">Описание</h3>
                        </div>
                        <div class="box-body">
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
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Свойства</h3>
                        </div>
                        <div class="box-body">
                            <table id="product-property-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Добавить</th>
                                    <th>Название</th>
                                    <th>Значение</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Добавить</th>
                                    <th>Название</th>
                                    <th>Значение</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Категории</h3>
                </div>
                <div class="box-body">
                    <table id="product-category-data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Добавить</th>
                            <th>Название</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categoryTable as $category)
                            <tr>
                                <td>{!! Form::checkbox('category_id[]', $category->id, false, [
                                'class' => 'product-category-check']) !!}</td>

                                <td>{{ $category->title }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Добавить</th>
                            <th>Название</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="disabled" id="product-category-property-data"></div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('property.list') }}" class="btn btn-block btn-warning">Отменить</a>
        </div>
        <div class="col-md-6">
            {!! Form::submit('Отправить', ['class' => 'btn btn-block btn-success pull-right']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@stop