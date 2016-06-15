@extends('layouts.main')

@section('page')

    @include('admin.partials.admin-menu')

    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>

@stop