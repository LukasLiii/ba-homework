<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class AddItemController extends Controller
{
    public function index()
    {
        return view('addentry');
    }

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
        return request()->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
    }
}
