<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemShare;
use App\Models\User;

class AllItemsController extends Controller
{
    public function index()
    {
        //$items = Item::select('user_id', 'id', 'name', 'phone')->where('user_id', auth()->id())->get();
        $items = Item::where('user_id', auth()->id())->get(['user_id','id','name','phone']);
        $mySharedItems = ItemShare::where('sharer_id', auth()->id())->get();
        $users = User::get(['id', 'name', 'email']);
        $sharableItems = Item::select('user_id', 'id', 'name', 'phone')->where('user_id', auth()->id())->get();
        $sharableUsers = User::select('id', 'name', 'email')->where('id', '!=', auth()->id())->get();

        return view('allitems', compact('items', 'users', 'sharableItems', 'sharableUsers', 'mySharedItems'));
    }

    public function edit(Item $item)
    {
        $itemEdit = Item::where('id', $item->id)->where('user_id', auth()->id())->first();
        if ($itemEdit) {
            return view('entryedit', compact('itemEdit'));
        } else {
            return back();
        }
    }

    public function update(Item $item, Request $request)
    {
        $this->validateItem();

        $itemEdit = Item::find($item->id);
        $itemEdit->name = $request->input('name');
        $itemEdit->phone =  $request->input('phone');
        $itemEdit->save();

        return redirect('allitems');
    }

    public function delete(Item $item)
    {
        if (auth()->id() === $item->user_id) {
            $item->delete();
        }
            return back();
    }

    protected function validateItem(): array
    {
        return request()->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
    }
}
