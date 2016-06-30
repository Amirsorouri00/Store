@extends('layouts.app')
@section('content')
@inject('Kala','App\Kala')

<div class="container">
    <div class="row">
 @include('common.errors')
        <form action="/addkala" method="post"  enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="name">
            <input type="text" name="details">
            <input type="file" name="photo" id="photo" >
        <button type="submit">submit</button>
        </form>
        
    </div>
</div>

@endsection
