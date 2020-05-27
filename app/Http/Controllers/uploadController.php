<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        if ($request->hasFile('fileUpload')) {
            $files = $request->file('fileUpload');
            $request->fileUpload->move('storage/', $files->getClientOriginalName());
            return response()->json(array('message' => 'fichier enregistré', 'success' => true));
        }
    }
}
