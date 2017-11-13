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
  </div>
@endsection
