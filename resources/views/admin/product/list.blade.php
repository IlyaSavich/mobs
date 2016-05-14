@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-xs-9">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Товары</h3>
                </div>
                <div class="box-body">
                    <table id="product-data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($productTable as $product)
                            <tr>
                                <td><a href="{{ route('product.edit', $product->id) }}">
                                        {{ $product->id }}</a></td>

                                <td><a href="{{ route('product.edit', $product->id) }}">
                                        {{ $product->title }}</a></td>

                                <td><a href="{{ route('category.edit', $product->category_id) }}">
                                        {{ $product->category_title }}</a></td>
                                <td>{{ $product->price }}</td>

                                <td>{{ $product->quantity }}</td>

                                <td>{{ $product->created_at }}</td>

                                <td>{{ $product->updated_at }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>

@stop