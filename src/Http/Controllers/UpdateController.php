<?php

namespace Innoboxrr\LaravelAppUpdate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class UpdateController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function update()
    {
        $id_restriction = config('update.id_restriction');

        if (count($id_restriction) > 0) {

            if (!in_array(auth()->user()->id, $id_restriction)) {

                return response()->json([
                    'message' => 'You are not allowed to update the system.'
                ], 403);

            }

        }

        Artisan::call('app:update');

        return response()->json([
            'message' => 'System updated successfully.',
            'output' => $output
        ], 200);
        
    }

}
