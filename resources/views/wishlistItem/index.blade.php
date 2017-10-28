<!-- index.blade.php -->

@extends('layouts.app')
@section('content')
  <div class="container">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Link</th>
      </tr>
    </thead>
    <tbody>
      @foreach($wishlistItems as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['description']}}</td>
        <td>{{$post['link']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
