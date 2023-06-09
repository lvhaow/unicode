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
                <th width="5%">Sua</th>
                <th width="5%">Xoa</th>
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
                <td>
                    <a href="{{route('users.edit', ['id'=>$item->id])}}" class="btn btn-warning btn-sm">Sua</a>
                </td>

                <td>
                    <a onclick="return confirm('Ban co chac chan xoa khong?')" href="{{route('users.delete', ['id'=>$item->id])}}" class="btn btn-danger btn-sm">Xoa</a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">Ko co nguoi dung</td>
            </tr>
            @endif
        </tbody>
    </table>
@endsection

