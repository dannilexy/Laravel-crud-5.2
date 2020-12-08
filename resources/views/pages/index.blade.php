@extends('layouts.app')
@section('content')
<div id="myCarousel" class="carousel slide panel">
   <!-- Carousel indicators -->
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>   
   <!-- Carousel items -->
   <div class="carousel-inner">
      <div class="item active">
         <img src="{{ URL::to('images/blog-2.jpg') }}" style="width: 100%;" alt="First slide">
      </div>
      <div class="item">
         <img src="{{ URL::to('images/blog-1.jpg') }}" style="width: 100%;" alt="Second slide">
      </div>
      <div class="item">
         <img src="{{ URL::to('images/blog-3.jpg') }}" style="width: 100%;" alt="Third slide">
      </div>
   </div>
   <!-- Carousel nav -->
   <a class="carousel-control left" href="#myCarousel" 
      data-slide="prev">&lsaquo;</a>
   <a class="carousel-control right" href="#myCarousel" 
      data-slide="next">&rsaquo;</a>
</div> 
<div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="/register" role="button">Register</a>
  <a class="btn btn-success btn-lg" href="login" role="button">Sign-in</a>
</div>
@endsection

