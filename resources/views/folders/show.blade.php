@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/folders/folder.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/files/file.css') }}" />
@endsection

@section('content')
    <div id="folders">
        <h1>BROWSE FOLDERS</h1>

        <h2>
            <i class="fas fa-folder"></i>
            <a href="/folders">root</a> /...
            @isset($folder->parent) <a href="/folders/{{ $folder->parent->id }}">{{ $folder->parent->name }}</a> / @endisset <span>{{ $folder->name }}</span>
        </h2>

        <hr>

        @auth
            @include('folders.create')
        @endauth

        @auth
            @include('files.create')
        @endauth

        @include('layouts.errors')

        @foreach ($folder->children as $child)
            @include('folders.child')
        @endforeach

        @foreach ($folder->files as $file)
            @include('files.file')
        @endforeach
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('js/folder.js') }}"></script>
    <script src="{{ URL::asset('js/file.js') }}"></script>
@endsection
