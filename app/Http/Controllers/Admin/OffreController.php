<?php

namespace App\Http\Controllers\admin;

use App\Models\Offre;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TypeContrat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class OffreController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'offre.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }
        $offres = Offre::get();
        return view('admin.offre.index',compact('offres'));
    }

    public function create()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'offre.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }
        $categories = Categorie::get();
        $typesContrats = TypeContrat::get();
        return view('admin.offre.create',compact('categories', 'typesContrats'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string',
            'date_publication' => 'required|date',
            'date_limite' => 'required|date',
            'nombre_place' => 'required|integer',
            'categorie_id' => 'required|integer',
            'description' => 'required|string',
            'type_contrat_id' => 'required|integer',
        ]);

        try {
            $offre = new Offre;
            $offre->titre = $validatedData['titre'];
            $offre->date_publication = $validatedData['date_publication'];
            $offre->date_limite = $validatedData['date_limite'];
            $offre->nombre_place = $validatedData['nombre_place'];
            $offre->categorie_id = $validatedData['categorie_id'];
            $offre->type_contrat_id = $validatedData['type_contrat_id'];
            $offre->description = $validatedData['description'];
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $ext = $file->getClientOriginalExtension($file);
                $filename = time() . '.' . $ext;
                $file->move('uploads/admin/offre', $filename);

                $offre->image = $filename;
            }
            $offre->save();

            toastr()->success("Offre créée avec succès");
            return redirect('admin/offres');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect('admin/offres');
        }
    }

    public function edit($id)
    {
        try {
            $autorisation = $this->autorisation(Auth::user()->role, 'offre.index');
            if ($autorisation == 'false') {
                toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
                return redirect()->route('dashboard');
            }
            $offre_id = decrypt($id);
            if ($offre_id) {
                $offre = Offre::find($offre_id);
                if ($offre) {
                    $categories = Categorie::get();
                    $typesContrats = TypeContrat::get();
                    return view('admin.offre.edit', compact('categories', 'offre', 'typesContrats'));
                }
            } else {
                toastr()->error('Aucun element trouve', 'Tentative échoué');
                return redirect('admin/offres');
            }
        } catch (\Throwable $th) {
            toastr()->error('Une Erreur est survenue lors du traitement', 'Tentative échoué');
            return redirect('admin/offres');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string',
            'date_publication' => 'required|date',
            'date_limite' => 'required|date',
            'nombre_place' => 'required|integer',
            'categorie_id' => 'required|integer',
            'description' => 'required|string',
            'type_contrat_id' => 'required|integer',
        ]);
        $offre_id = decrypt($id);
        try {
            $offre = Offre::find($offre_id);
            $offre->titre = $validatedData['titre'];
            $offre->date_publication = $validatedData['date_publication'];
            $offre->date_limite = $validatedData['date_limite'];
            $offre->nombre_place = $validatedData['nombre_place'];
            $offre->categorie_id = $validatedData['categorie_id'];
            $offre->type_contrat_id = $validatedData['type_contrat_id'];
            $offre->description = $validatedData['description'];

            if ($request->hasFile('photo')) {
                $path = 'uploads/admin/offre/' . $offre->image;
                if (File::exists($path)) {
                    File::delete($path);
                }

                $file = $request->file('photo');
                $ext = $file->getClientOriginalExtension($file);
                $filename = time() . '.' . $ext;
                $file->move('uploads/admin/offre/', $filename);

                $offre->image = $filename;
            }
            $offre->save();

            toastr()->success("Offre Modifiée avec succès");
            return redirect('admin/offres');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect('admin/offres');
        }
    }
}

