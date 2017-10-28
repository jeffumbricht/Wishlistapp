<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\WishlistItem;

class WishlistItemController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $wishlistItems = WishlistItem::all()->toArray();

    return view('wishlistItem.index', compact('wishlistItems'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('wishlistItem.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $wishlistItem = new WishlistItem([
      'title' => $request->get('title'),
      'description' => $request->get('description'),
      'link' => $request->get('link'),
      'user_id' => Auth::id()
    ]);

    $wishlistItem->save();
    return redirect('/wishlistItem');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $wishlistItem = WishlistItem::find($id);

    return view('wishlistItem.view', compact('wishlistItem','id'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $wishlistItem = WishlistItem::find($id);

    return view('wishlistItem.edit', compact('wishlistItem','id'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $wishlistItem = WishlistItem::find($id);
    $wishlistItem->title = $request->get('title');
    $wishlistItem->description = $request->get('description');
    $wishlistItem->link = $request->get('link');
    $wishlistItem->save();
    return redirect('/wishlistItem');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $wishlistItem = WishlistItem::find($id);
    $wishlistItem->delete();

    return redirect('/wishlistItem');
  }
}
