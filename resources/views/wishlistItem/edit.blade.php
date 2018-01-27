<!-- edit.blade.php -->

@extends('wishlistItem.base')
@section('content')

<form method="post" action="{{action('WishlistItemController@update', $id)}}">
  <div class="form-group">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH">
    <label for="lgFormGroupInput">Title</label>
    <input type="text" class="form-control" id="lgFormGroupInput" placeholder="title" name="title" value="{{$wishlistItem->title}}">
  </div>
  <div class="form-group">
    <label for="smFormGroupInput">Description</label>
    <textarea name="description" class="form-control" rows="8" cols="80">{{$wishlistItem->description}}</textarea>
  </div>
  <div class="form-group">
    <label for="lgFormGroupInput">Link</label>
    <input type="text" class="form-control" placeholder="link" name="link" value="{{$wishlistItem->link}}">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary">
  </div>
</form>

@endsection
