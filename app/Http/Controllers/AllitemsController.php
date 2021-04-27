<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\item_shares;
use App\Models\User;
use Exception;

class AllItemsController extends Controller
{
    public function index()
    {
        //$items = Item::select('user_id', 'id', 'name', 'phone')->where('user_id', auth()->id())->get();
        $items = Item::where('user_id', auth()->id())->get(['user_id','id','name','phone']);
        $my_shared_items = item_shares::where('sharer_id', auth()->id())->get();
        $users = User::get(['id', 'name', 'email']);
        $sharable_items = Item::select('user_id', 'id', 'name', 'phone')->where('user_id', auth()->id())->get();
        $sharable_users = User::select('id', 'name', 'email')->where('id', '!=', auth()->id())->get();

        return view('allitems', compact('items', 'users', 'sharable_items', 'sharable_users', 'my_shared_items'));
    }

    //edit selected item
    public function edit(Item $item)
    {
        $itemedit = Item::find($item->id);

        return view('entryedit', compact('itemedit'));
    }

    //update selected item
    public function update(Item $item, Request $request)
    {

        $itemedit = Item::find($item->id);
        $itemedit->name = $request->input('name');
        $itemedit->phone =  $request->input('phone');
        $itemedit->save();

        return redirect('allitems');
    }

    //delete selected item
    public function delete(Item $item)
    {
        $itemdelete = Item::find($item->id);
        $itemdelete->delete();

        return redirect('allitems');
    }
}
