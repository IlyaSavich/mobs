@extends('layouts.main')

@section('page')

    @include('layouts.partials.main-menu')

    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>

@stop