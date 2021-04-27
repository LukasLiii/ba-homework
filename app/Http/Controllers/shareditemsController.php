<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPSTORM_META\map;
use App\Models\item_shares;
use App\Models\item;
use App\Validators\ItemShareRequestValidator;

class shareditemsController extends Controller
{

    public function index() {

        $shared_items = item::join('item_shares', 'item_shares.item_id', '=', 'items.id')->where('item_shares.receiver_id', '=', auth()->id())->get();
        return view('/shareditems', compact('shared_items'));

    }

    public function store(Request $request)
    {
        $share = new item_shares;
        $share->item_id = $request->input('item');
        $share->sharer_id = auth()->id();
        $share->receiver_id = $request->input('sharer');

        $share->save();

        return back();

    }

    public function delete(item_shares $shared_item)
    {
            $sharedelete = item_shares::find($shared_item->id);
            //dd($sharedelete);
            $sharedelete->delete();
            return back();
    }
}
