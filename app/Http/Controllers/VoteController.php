<?php

namespace App\Http\Controllers;

use App\vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
   public function voteProjet(Request $request){
        $vote = new vote();
        $vote->user_id = $request->user_id;
        $vote->projet_id = $request->projet_id;
        $vote->note = $request->note;
        $vote->commentaire = $request->commentaire;

        $vote->save();
        if ($vote->save()) {
            return response()->json(array('message' => 'vote pris en compte', 'success' => false, 401));
        } else {
            return response()->json(array('message' => 'Erreur dans d\'enregistrement', 'success' => false, 401));
        }
   }
}
