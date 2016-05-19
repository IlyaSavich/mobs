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
                            <th>Input</th>
                            <th>Group</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($propertyTable as $property)
                            <tr>
                                <td><a href="{{ route('property.edit', $property->id) }}">
                                        {{ $property->id }}</a></td>

                                <td><a href="{{ route('property.edit', $property->id) }}">
                                        {{ $property->title }}</a></td>

                                <td><a href="{{ route('property.edit', $property->id) }}">
                                        {{ $property->input_type }}</a></td>

                                <td><a href="{{ route('property.edit', $property->id) }}">
                                        {{ $property->group_type }}</a></td>

                                <td>{{ $property->created_at }}</td>
                                <td>{{ $property->updated_at }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Input</th>
                            <th>Group</th>
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