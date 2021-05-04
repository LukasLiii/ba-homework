<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ItemShare;
use App\Models\Item;

class SharedItemsController extends Controller
{
    public function index()
    {
        $sharedItems = Item::join(
            'item_shares',
            'item_shares.item_id',
            '=',
            'items.id'
        )->where('item_shares.receiver_id', '=', auth()->id())->get();

        return view('/shareditems', compact('sharedItems'));
    }

    public function store(Request $request)
    {
        $share = new ItemShare;
        $share->item_id = $request->input('item');
        $share->sharer_id = auth()->id();
        $share->receiver_id = $request->input('receiver');

        $share->save();

        return back();
    }

    public function delete(ItemShare $sharedItem)
    {
        if (auth()->id() === $sharedItem->sharer_id) {
            $sharedItem->delete();
        }
            return back();
    }
}
