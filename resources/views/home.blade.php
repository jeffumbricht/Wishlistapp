@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">My Wishlist</div>

        <div class="panel-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif

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
                <a href="{{action('WishlistItemController@show', $post['id'])}}">
                  {{$post['title']}}
                </a>
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
      </div>
    </div>
  </div>
</div>
@endsection
