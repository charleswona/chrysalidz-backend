<?php

namespace App\Http\Controllers;

use App\projet;
use App\campagneFinancement;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function listProjetSoumis()
    {
        $projet = projet::join('soumissions', 'soumissions.projet_id', '=', 'projets.id')
            ->join('membres', 'membres.id', '=', 'soumissions.membre_id')
            // ->join('users','users.id','=','membres.user_id')
            ->join('categorie_projets', 'categorie_projets.id', '=', 'projets.categorie_projet_id')
            ->select(
                'membres.user_id',
                'membres.civilite',
                'membres.noms',
                'membres.prenoms',
                'membres.code_postal',
                'membres.telephone',
                'membres.denomination_social',
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
                'categorie_projets.libelle',
            )
            ->get();

        return response()->json($projet);
    }


    public function publierProjet(Request $request)
    {
        $projet = new projet();

        $projet->categorie_projet_id  = $request->categorie_projet_id;
        $projet->denomination  = $request->denomination;
        $projet->description  = $request->description;
        $projet->montant_projet  = $request->montant_projet;
        $projet->publié  = 1;
        $projet->besoin_reponse_projet = $request->besoin_reponse_projet;
        $projet->ville_pays_projet = $request->ville_pays_projet;
        $projet->genese_idee_projet = $request->genese_idee_projet;
        $projet->identite_projet = $request->identite_projet;
        $projet->image_premier_plan = $request->image_premier_plan;
        $projet->autre_images = $request->autre_images;
        $projet->liens_video_projet = $request->liens_video_projet;

        $save = $projet->save();

        if ($save) {
            $lastIsertId = $projet->getKey();

            $capagnefinancement = new campagneFinancement();
            $capagnefinancement->projet_id =  $lastIsertId;
            $capagnefinancement->date_debut = $request->date_debut_financement;
            $capagnefinancement->date_fin = $request->date_fin_financement;
            $capagnefinancement->montant_cible = $request->montant_projet;

            $capagnefinancement->save();


            return response()->json(array('success' => true, 'message' => 'projet publié'));
        }

        return response()->json(array('success' => false, 'message' => 'erreur de publication'));
    }

    public function editerProjet(Request $request)
    {

        $projet = projet::find($request->id);

        $projet->categorie_projet_id  = $request->categorie_projet_id;
        $projet->denomination  = $request->denomination;
        $projet->description  = $request->description;
        $projet->montant_projet  = $request->montant_projet;
        $projet->publie  = 1;
        $projet->besoin_reponse_projet = $request->besoin_reponse_projet;
        $projet->ville_pays_projet = $request->ville_pays_projet;
        $projet->genese_idee_projet = $request->genese_idee_projet;
        $projet->identite_projet = $request->identite_projet;
        $projet->image_premier_plan = $request->image_premier_plan;
        $projet->autre_images = $request->autre_images;
        $projet->liens_video_projet = $request->liens_video_projet;

        $save = $projet->save();

        if ($save) {
            $lastIsertId = $projet->getKey();

            $capagnefinancement = new campagneFinancement();
            $capagnefinancement->projet_id =  $lastIsertId;
            $capagnefinancement->date_debut = $request->date_debut_financement;
            $capagnefinancement->date_fin = $request->date_fin_financement;
            $capagnefinancement->montant_cible = $request->montant_projet;

            $capagnefinancement->save();


            return response()->json(array('success' => true, 'message' => 'projet publié'));
        }

        return response()->json(array('success' => false, 'message' => 'erreur de publication'));
    }

    public function listeProjetPublier()
    {
        $getListe = projet::where('publie', 1)
            ->leftjoin('categorie_projets', 'categorie_projets.id', '=', 'projets.categorie_projet_id')
            ->get();
        return response()->json($getListe);
    }

    public function listProjet($limit)
    {
        $projet = projet::join('soumissions', 'soumissions.projet_id', '=', 'projets.id')
            ->join('membres', 'membres.id', '=', 'soumissions.membre_id')
            // ->join('users','users.id','=','membres.user_id')
            // ->join('users', 'users.id', '=', 'membres.user_id')
            ->join('categorie_projets', 'categorie_projets.id', '=', 'projets.categorie_projet_id')
            ->select(
                'membres.user_id',
                'membres.civilite',
                'membres.noms',
                'membres.prenoms',
                'membres.code_postal',
                'membres.telephone',
                'membres.denomination_social',
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
                'categorie_projets.libelle',
            )
            ->offset($limit)
            ->limit(3)
            ->get();
        return response()->json($projet);
    }
}
