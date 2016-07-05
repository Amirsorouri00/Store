@extends('layouts.app')
@section('content')
@inject('Kala','App\Kala')
<?php
    $posts   =Auth::user()->kalas()->get();

?>
<div class="container">
    <div class="row">
     
    
          @foreach($posts as $post)
          
     <div class="col-md-3 col-xs-12" align="center">
         <div class="panel panel-default">
              <div class="panel-heading" >
            <h1  width: 175px;>{{ $post->name }}</h1>
            
                 </div>
             <div class="panel-body" >
         
            <div class="outter"><img src="{{ asset('kala/'.$post->pic_name) }}" alt="pic not found"class="image-circle"/></div> 
             </div>
                 <div class="panel-heading" >
            <div class="row" >
                
                <a href={{ asset('kala/'.$post->pic_name) }}> Download pic</a>
         <form method="post" action="/addinbasket/{{$post->id}}">
                 {{ csrf_field() }}
<button  type="submit"   class=" col-md-offset-1 btn btn-success  col-md-2 " style="padding: 6px !important;" ><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i> </button>
                </form>
                 <form method="get" action="/edit/{{$post->id}}">
                <button type="submit" class=" col-md-offset-2 btn btn-info  col-md-2 " style="padding: 6px !important;"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>
                </form>
        <form method="POST" action="/del/{{$post->id}}">
            {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                     <button type="submit" class=" col-md-offset-3 btn btn-danger  col-md-2 " style="padding: 6px !important ;"><i class="fa fa-times fa-2x" aria-hidden="true"></i>
</button>  
                </form>
                
                     </div>
                
                   <p  width:="175px"> {!!$post->details !!}</p>
                 
             </div>
	    </div>
      
          </div>
          @endforeach
        

</div>
@endsection
