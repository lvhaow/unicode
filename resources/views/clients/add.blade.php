@extends('layouts.client')
@section('title')
{{$title}}
@endsection


@section('content')
    <h1>Them san pham</h1>
    <form action="" method="post">
        @if ($errors->any())
        <div class="alert alert-danger">
            {{$errorMessage}}
        </div>
    @endif
       <div class="mb-3">
            <label for="">Ten San Pham</label>
            <input type="text" class="form-controll" name="product_name" placeholder="Ten san pham..."/>
            @error('product_name')
               <span style="color:red">{{$message}}</span>
            @enderror
       </div>

       
       <div class="mb-3">
        <label for="">Gia San Pham</label>
        <input type="text" class="form-controll" name="product_price" placeholder="Gia san pham..."/>
        @error('product_price')
               <span style="color:red">{{$message}}</span>
            @enderror
   </div>
        <button type="submit" class="btn btn-primary">Them moi</button>
        @csrf
    </form>
@endsection


