<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\WishlistItem;
use App\User;

class WishlistItemController extends AuthController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlistItems = Auth::user()->wishlistItems->toArray();

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
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'max:255'
        ]);
        // link is not nullable, hotfix
        $link = $request->get('link');
        if ($link === null) {
            $link = '';
        }
        // description is not nullable, hotfix
        $desc = $request->get('description');
        if ($desc === null) {
            $desc = '';
        }

        $wishlistItem = new WishlistItem([
            'title' => $request->get('title'),
            'description' => $desc,
            'link' => $link,
            'user_id' => Auth::id()
        ]);

        $wishlistItem->save();
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->ownsItemId($id)) {
            $wishlistItem = WishlistItem::find($id);

            return view('wishlistItem.edit', compact('wishlistItem','id'));
        }
        else {
            return redirect('home');
        }
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
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'max:255'
        ]);

        if(Auth::user()->ownsItemId($id)) {
            // link is not nullable, hotfix
            $link = $request->get('link');
            if ($link === null) {
                $link = '';
            }
            // description is not nullable, hotfix
            $desc = $request->get('description');
            if ($desc === null) {
                $desc = '';
            }
            $wishlistItem = WishlistItem::find($id);
            $wishlistItem->title = $request->get('title');
            $wishlistItem->description = $desc;
            $wishlistItem->link = $link;
            $wishlistItem->save();
            return redirect('/home');
        }
        else {
            return redirect('home');
        }
    }

    /**
     * Update the specified resource in storage - mark as bought
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buy(Request $request)
    {
        $id = $request->get('id');

        if(!Auth::user()->ownsItemId($id)) {
            $wishlistItem = WishlistItem::find($id);
            $wishlistItem->buyer_id = Auth::id();
            $wishlistItem->save();
            return redirect()->back();

        }
        else {
            return redirect('home');
        }
    }

    /**
     * Update the specified resource in storage - mark as not bought
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unbuy(Request $request)
    {
        $id = $request->get('id');

        if(!Auth::user()->ownsItemId($id)) {
            $wishlistItem = WishlistItem::find($id);
            $wishlistItem->buyer_id = null;
            $wishlistItem->save();
            return redirect()->back();

        }
        else {
            return redirect('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->ownsItemId($id)) {
            $wishlistItem = WishlistItem::find($id);
            $wishlistItem->delete();

            return redirect('/home');
        }
        else {
            return redirect('home');
        }
    }
}
