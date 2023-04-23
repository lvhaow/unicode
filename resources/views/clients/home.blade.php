@extends('layouts.client')
@section('title')
{{$title}}
@endsection
@section('sidebar')
    @parent
    <h3>Home Sidebar</h3>
@endsection

@section('content')
    <h1>Trang Chu</h1>
    @include('clients.contents.slide')
    @include('clients.contents.about')
    
    <x-alert type="success" :content="$message" dataIcon="facebook"/>
    {{-- <x-inputs.button/>
    <x-form.button/> --}}
@endsection