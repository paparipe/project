@extends('layouts.main')

@section('content')

    <section data-section="title">
        <h1>Games</h1>
        <p>Games I've developed</p>
    </section>

    <section class="main-list" data-section="list">
        @for ($i = 0; $i < 8; $i++)
            @include('template.list.item')
        @endfor
    </section>

@endsection