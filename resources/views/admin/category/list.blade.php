@extends('layouts.admin')

@section('content')

    <div class="col-md-4">
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

@stop