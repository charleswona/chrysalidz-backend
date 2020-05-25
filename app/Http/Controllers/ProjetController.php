<?php

namespace App\Http\Controllers;

use App\projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function listProjetSoumis()
    {
        $projet = projet::join('soumissions', 'soumissions.projet_id','=', 'projets.id')
            ->join('membres','membres.id','=','soumissions.membre_id')
            // ->join('users','users.id','=','membres.user_id')
            ->join('categories', 'categories.id','=','projets.categorie_projet_id')
            ->select(
                'membres.user_id',
                'membres.civilite',
                'membres.noms',
                'membres.prenoms',
                'membres.code_postal',
                'membres.telephone',
                'membres.denomination',
                'membres.structure_juridique',
                'membres.valorisation_entreprise',
                'membres.capital_social',
                'membres.nombre_action',
                'membres.registre_commerce',
                'membres.activite',
                'membres.site_internet',
                'membres.adresse_fiscale',
                'membres.code_postal_siege',
                'membres.ville',
                'projets.*',
                'categories.libelle',
            )
            ->get();

        return response()->json($projet);
    }

    

}
