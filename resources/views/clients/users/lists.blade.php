@extends('layouts.client')
@section('title')
{{$title}}
@endsection
@section('content')
    <h1>{{$title}}</h1>
    <a href="{{route('users.add')}}" class="btn btn-primary">Them nguoi dung</a>
    <hr/>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th witdh="5%">STT</th>
                <th>Ten</th>
                <th>Email</th>
                <th width="15%">Thoi Gian</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($usersList))
                @foreach ($usersList as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->fullname}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">Ko co nguoi dung</td>
            </tr>
            @endif
        </tbody>
    </table>
@endsection

