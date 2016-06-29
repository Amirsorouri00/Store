@extends('layouts.app')
@section('content')
@inject('Kala','App\Kala')
<?php
    $posts   =$Kala::all();

?>
<div class="container">
    <div class="row">
     
    
          @foreach($posts as $post)
          
     <div class="col-md-3 col-xs-12" align="center">
         <div class="panel panel-default">
              <div class="panel-heading">
            <h1>{{ $post->name }}</h1>
            
                 </div>
             <div class="panel-body">
         
            <div class="outter"><img src="{{ asset('uploads/'.$post->pic_name) }}" alt="pic not found"class="image-circle"/></div> 
             </div>
                 <div class="panel-heading">
            <div class="row">
         
<button type="button"   class=" col-md-offset-1 btn btn-default  col-md-2 " style="padding: 6px !important;" ><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i> </button>

                <button type="button" class=" col-md-offset-6 btn btn-default  col-md-2 " style="padding: 6px !important;"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>
  
                     
                     </div>
                   <p   width: 175px;> {{ $post->details }}</p>
                 
             </div>
	    </div>
      
          </div>
          @endforeach
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>

</div>
@endsection
