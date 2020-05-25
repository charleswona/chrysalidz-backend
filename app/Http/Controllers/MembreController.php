<?php

namespace App\Http\Controllers;

use App\membre;
use App\projet;
use App\ressource;
use App\soumission;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    public function soumissionProjet( Request $request) {
        $membre = new membre();
        $membre->user_id = $request->user_id;
        $membre->civilite = $request->civilite;
        $membre->noms = $request->noms;
        $membre->prenoms = $request->prenoms;
        $membre->code_postal = $request->code_postal;
        $membre->telephone = $request->telephone;
        $membre->denomination_social = $request->denomination_social;
        $membre->structure_juridique = $request->structure_juridique;
        $membre->valorisation_entreprise = $request->valorisation_entreprise;
        $membre->capital_social = $request->capital_social;
        $membre->nombre_action = $request->nombre_action;
        $membre->activite = $request->activite;
        $membre->site_internet = $request->site_internet;
        $membre->adresse_fiscale = $request->adresse_fiscale;
        $membre->code_postal_siege = $request->code_postal_siege;
        $membre->ville = $request->ville;
        $membre->save();
        if ($membre->save()){
            $membre_id = $membre->getKey();
            // creation du projet initier par le membre
            $projet = new projet();
            $projet->categorie_projet_id  = $request->categorie_projet_id;
            $projet->denomination  = $request->denomination;
            $projet->description  = $request->description;
            $projet->montant_projet  = $request->montant_projet;
            $projet->publié  = false;
            $projet->save();
            if ($projet->save()) {
                $projet_id = $projet->getKey();
                // creation de la ressource tu projet encour
                $ressource = new ressource();
                $ressource->projet_id = $projet_id;
                $ressource->type_ressource_id = $request->type_ressource_id;
                $ressource->denomination = $request->denomination;
                $ressource->path = $request->path;
                $ressource->save();

                $soumission = new soumission();

                $soumission->membre_id = $membre_id;
                $soumission->projet_id = $projet_id;
                $soumission->save();

                return response()->json(array('message' => 'votre projet a été soumis avec succes, nous vous contacterons apres étude ', 'success' => true, 200));
            }else {
                return response()->json(array('message' => 'une erreur est survenue lors de la soumission du projet, veuillez réessayer', 'success' => false, 401));
            }

        } else {
            return response()->json(array('message' => 'une erreur est survenue lors de l\'enregistrement des informations personnels, veuillez réessayer', 'success' => false, 401));
        }
    }
}
