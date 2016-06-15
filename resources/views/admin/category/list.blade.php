@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-xs-4">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-align-left"></i>
                    <h3 class="box-title">Список категорий</h3>
                </div>
                <div class="box-body">
                    {!! $categoryTree !!}
                </div>
            </div>
        </div>

        <div class="col-xs-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Категории</h3>
                </div>
                <div class="box-body">
                    <table id="simple-data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Parent</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categoryTable as $category)

                            <tr>
                                <td><a href="{{ route('category.edit', $category->id) }}">
                                        {{ $category->id }}</a></td>

                                <td><a href="{{ route('category.edit', $category->id) }}">
                                        {{ $category->title }}</a></td>

                                <td><a href="{{ route('category.edit', $category->parent_id) }}">
                                        {{ $category->parent_title }}</a></td>

                                <td>{{ $category->created_at }}</td>

                                <td>{{ $category->updated_at }}</td>
                            </tr>

                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Parent</th>
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