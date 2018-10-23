<?php

namespace App\Http\Controllers;

use App\Creator;
use Hashids\Hashids;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function __invoke(Request $request, $hash)
    {
        $hashid = new Hashids('', 10);

        $decoded_id = $hashid->decode($hash);

        $creator = Creator::findOrFail($decoded_id)->first();

        if(is_null($creator)){
            abort(404);
        }

        return view('preview', ['creator' => $creator]);
    }
}
