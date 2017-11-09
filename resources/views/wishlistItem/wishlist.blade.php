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
      @foreach($wishlistItems as $post)
      <tr>
        <td>
          <a href="{{action('WishlistItemController@show', $post['id'])}}">
            {{$post['title']}}
          </a>
        </td>
        <td>{{$post['description']}}</td>
        <td>{{$post['link']}}</td>
        <td><!--buyer--></td>
        <td><a href="{{action('WishlistItemController@edit', $post['id'])}}" class="btn btn-warning">Buy</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
