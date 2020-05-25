<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadController extends Controller
{
    public function uploadFile( Request $request)
    {
        if ($files = $request->file('fileUpload')) {
            $destinationPath = 'public/file/'; // upload path
            $profilefile = $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);

            return response()->json(array('message' => 'fichier enregistré', 'success' => true ));
        }
    }
}
