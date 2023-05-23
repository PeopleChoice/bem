<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjetRequest;
use App\Models\MotifAppel;
use App\Models\ObjetAppel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ObjetController extends Controller
{
    public function index()
    {
        $objets = ObjetAppel::with('motifAppel')->get();
        return view('admin.objet.index',['objets'=>$objets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $motifs = MotifAppel::get(); 
        return view('admin.objet.form',['objet'=>new ObjetAppel(),'motifs'=>$motifs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
       $objet =  ObjetAppel::create(Arr::except($request->all(),['_token','_method']));
 

        return to_route('admin.objet.index')->with('success','Objet appel du nom '.$objet->libelle.' est ajouté');
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
        return view('admin.objet.form',['objets'=> ObjetAppel::find((int)$id),'motifs'=>MotifAppel::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        

        ObjetAppel::where('id',(int)$id)->update(Arr::except($request->all(),['_token','_method']));
       

      
        return to_route('admin.objet.index')->with('success','Objet appel modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {

        ObjetAppel::find((int)$id)->delete();
        return to_route('admin.objet.index')->with('success','Objet appel supprimé');
    }
}
