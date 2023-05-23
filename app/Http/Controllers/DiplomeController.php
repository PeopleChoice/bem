<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiplomeRequest;
use App\Models\Diplome;
use App\Models\Ecole;
use App\Models\TypeFormation;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DiplomeController extends Controller
{
    public function index()
    {
        $diplomes = Diplome::with('typeFormation.ecole')->get();
        return view('admin.diplome.index',['diplomes'=>$diplomes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ecoles = Ecole::get(); 
        return view('admin.diplome.form',['diplome'=>new Diplome(),'ecoles'=>$ecoles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiplomeRequest $request)
    {
  
       $diplome =  Diplome::create(Arr::except($request->validated(),['ecole_id']));
 

        return to_route('admin.diplome.index')->with('success','Diplome '.$diplome->libelle.' est ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        return view('admin.diplome.form',['diplome'=> Diplome::find((int)$id),'ecoles'=>Ecole::get() ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        

        Diplome::where('id',(int)$id)->update(Arr::except($request->all(),['_token','_method','ecole_id']));
       

      
        return to_route('admin.diplome.index')->with('success','Diplome modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {

        TypeFormation::find((int)$id)->delete();
        return to_route('admin.diplome.index')->with('success','Diplome supprimé');
    }
}
