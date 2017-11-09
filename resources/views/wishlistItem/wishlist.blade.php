<!-- wishlist.blade.php -->
<!-- someone else's wishlist -->
@extends('layouts.app')
@section('content')
  <div class="container">
    <h2>{{ $name }}</h2>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Link</th>
        <th>Buyer</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($wishlistItems as $item)
      <tr>
        <td>
          <a href="{{action('WishlistItemController@show', $item['id'])}}">
            {{$item['title']}}
          </a>
        </td>
        <td>{{$item['description']}}</td>
        <td>{{$item['link']}}</td>
        <td>{{ $item->buyerName() }}</td>
        <td><a href="{{action('WishlistItemController@edit', $item['id'])}}" class="btn btn-warning">Buy</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
