<!-- wishlist.blade.php -->
<!-- someone else's wishlist -->
@extends('layouts.app')
@section('content')
<div class="container">
  <h2>{{ $name }}</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th colspan="4">Added by {{ $name }}</th>
      </tr>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Link</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($wishlistItems as $item)
      <tr>
        <td>
          {{$item['title']}}
        </td>
        <td>{{$item['description']}}</td>
        <td>
          @if ($item['link'])
          <a class="btn btn-default" href="{{$item['link']}}" target="_BLANK">Link</a>
          @endif
        </td>
        <td>
        {{-- @if (Auth::user()) --}}
        @if ($item->buyer_id)
          {{-- Someone is buying this, is it you?! --}}
          @if ($item->buyer_id == Auth::id())
          <form action="{{action('WishlistItemController@unbuy')}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <input name="id" type="hidden" value="{{$item['id']}}">
            <button class="btn btn-danger" type="submit">No Longer Buying</button>
          </form>
          @else
          {{ $item->buyerName() }} is buying this
          @endif
        @else
          <form action="{{action('WishlistItemController@buy')}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <input name="id" type="hidden" value="{{$item['id']}}">
            <button class="btn btn-success" type="submit">Buy</button>
          </form>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <table class="table table-striped">
    <thead>
      <tr>
        <th colspan="5">Suggested by others</th>
      </tr>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Link</th>
        <th>Suggested By</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($suggestedItems as $item)
      <tr>
        <td>
          {{$item['title']}}
        </td>
        <td>{{$item['description']}}</td>
        <td>
          @if ($item['link'])
          <a class="btn btn-default" href="{{$item['link']}}" target="_BLANK">Link</a>
          @endif
        </td>
        <td>
          @if ($item->suggested_by_id == Auth::id())
          You
          @else
          {{ $item->suggestedBy() }}
          @endif
        </td>
        <td>
        {{-- @if (Auth::user()) --}}
        @if ($item->buyer_id)
          {{-- Someone is buying this, is it you?! --}}
          @if ($item->buyer_id == Auth::id())
          <form action="{{action('WishlistItemController@unbuy')}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <input name="id" type="hidden" value="{{$item['id']}}">
            <button class="btn btn-danger" type="submit">No Longer Buying</button>
          </form>
          @else
          {{ $item->buyerName() }} is buying this
          @endif
        @else
          <form action="{{action('WishlistItemController@buy')}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <input name="id" type="hidden" value="{{$item['id']}}">
            <button class="btn btn-success" type="submit">Buy</button>
          </form>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <h2>Suggest an item</h2>

  <form method="post" action="{{url('wishlistItem')}}">
    <div class="form-group">
      {{csrf_field()}}
      <input type="hidden" name="suggested_by_id" value="{{Auth::id()}}">
      <input type="hidden" name="user_id" value="{{$belongsToId}}">
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
</div>
@endsection
