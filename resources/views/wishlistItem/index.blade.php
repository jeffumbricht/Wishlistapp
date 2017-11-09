<!-- index.blade.php -->

@extends('layouts.app')
@section('content')
  <div class="container">
    <p>
      <a href="{{action('WishlistItemController@create')}}">New Item</a>
    </p>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Link</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($wishlistItems as $post)
      <tr>
        <td>
          {{$post['title']}}
        </td>
        <td>{{$post['description']}}</td>
        <td>{{$post['link']}}</td>
        <td><a href="{{action('WishlistItemController@edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
        {{-- <td><a href="{{action('WishlistItemController@destroy', $post['id'])}}" class="btn btn-danger">Delete</a></td> --}}
        <td>
          <form action="{{action('WishlistItemController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
