@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
 @include('common.errors')
        <form action="/editkala/{{$kala->id}}" method="post"  enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="name" value="{{$kala->name}}">
            <input type="text" name="details" value="{{$kala->details}}">
            <input type="file" name="photo" id="photo" >
        <button type="submit">submit</button>
        </form>
        
    </div>
</div>

@endsection
