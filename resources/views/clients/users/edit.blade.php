@extends('layouts.client')
@section('title')
{{$title}}
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">Du lieu nhap vao khong hop le</div>
    @endif
    <h1>{{$title}}</h1>

    <form action="{{route('users.post-edit')}}" method="POST">
        <div class="mb-3">
            <label for="">Ho va Ten</label>
            <input type="text" class="form-control" name="fullname" placeholder="Ho va ten ..." value="{{old('fullname') ?? $userDetail->fullname}}">
            @error('fullname')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email ..." value="{{old('email') ??$userDetail->email}}">
            @error('email')
            <span style="color: red;">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cap Nhat</button>
        <a href="{{route('users.index')}}" class="btn btn-warning">Quay Lai</a>
        @csrf
    </form>
    
@endsection

