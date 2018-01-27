<!-- create.blade.php -->

@extends('wishlistItem.base')
@section('content')

<form method="post" action="{{url('wishlistItem')}}">
  <div class="form-group">
    {{csrf_field()}}
    <label for="lgFormGroupInput">Title</label>
    <input type="text" class="form-control" placeholder="title" name="title">
  </div>
  <div class="form-group">
    <label for="smFormGroupInput">Description</label>
    <textarea name="description" class="form-control"s="8" cols="80"></textarea>
  </div>
  <div class="form-group">
    <label for="lgFormGroupInput">Link</label>
    <input type="text" class="form-control" placeholder="link" name="link">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary">
  </div>
</form>

@endsection
