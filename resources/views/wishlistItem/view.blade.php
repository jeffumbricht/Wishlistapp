<!-- view.blade.php -->

@extends('wishlistItem.base')
@section('content')
  <p>{{$wishlistItem->title}}</p>
  <p>{{$wishlistItem->description}}</p>
  <p>{{$wishlistItem->link}}</p>
@endsection
