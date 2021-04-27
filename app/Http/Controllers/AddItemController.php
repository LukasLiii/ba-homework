<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use Illuminate\Http\Request;

class AddItemController extends Controller
{
    public function index(){
        return view('addentry');
    }

    //add item form
    public function store(Item $item)
    {

        $this->validateItem();

        $item = new Item(request(['name', 'phone']));
        $item->user_id = Auth::user()->id;
        $item->save();

        return redirect('allitems');

    }

    protected function validateItem(): array
    {

        //must fill
        return request()->validate([
            'name' => 'required',
            'phone' => 'required',
            // => 'exists:tags,id'
        ]);
    }
}
