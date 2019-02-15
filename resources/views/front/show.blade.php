@extends('layouts.master')

@section('content')

<br>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <p><img width="150" src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}" class="thumbnail rounded"></p>
      <p><img width="150" src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}" class="thumbnail rounded"></p>
      <p><img width="150" src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}" class="thumbnail rounded"></p>
    </div>
    <div class="col-lg-6">
        <img width="500" src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}" class="img-thumbnail">
</div>
    <div class="col-sm">
      <span>{{$product->title}}</span>
      <br>
      <span>ref : {{$product->reference}}</span>
      <br>
      <span>{{$product->price}} euros</span>
      <br>
      

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Taille
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <button class="dropdown-item" type="button">46</button>
    <button class="dropdown-item" type="button">48</button>
    <button class="dropdown-item" type="button">50</button>
    <button class="dropdown-item" type="button">52</button>
  </div>
</div>
    </div>
</div>

    <div class="row">
        <div class="col-lg">
            <span><strong>Description : </strong></span>
            <p>{{$product->description}}</p>
</div>
</div>
</div>
@endsection
