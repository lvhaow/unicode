@extends('layouts.client')
@section('title')
{{$title}}
@endsection

@section('content')
    <h1>{{$title}}</h1>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="">Ho va Ten</label>
            <input type="text" class="form-control" name="fullname" placeholder="Ho va ten ...">
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email ...">
        </div>

        <button type="submit" class="btn btn-primary">Them Moi</button>
        <a href="" class="btn btn-warning">Quay Lai</a>
        @csrf
    </form>
    
@endsection

