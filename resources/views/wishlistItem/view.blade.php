<!-- view.blade.php -->

@extends('layouts.app')
@section('content')
<div class="container">
    <p>{{$wishlistItem->title}}</p>
    <p>{{$wishlistItem->description}}</p>
    <p>{{$wishlistItem->link}}</p>
</div>
@endsection
