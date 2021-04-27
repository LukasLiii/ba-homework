<?php

namespace App\Validators;

use Illuminate\Http\Request;

class ItemShareRequestValidator
{
    public static function validate(Request $request)
    {
        return $request->validate([
            'item' => 'required|integer',
            'sharer' => 'required|integer'
        ]);
    }
}
