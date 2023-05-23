<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeFormationRequest;
use App\Models\Ecole;
use App\Models\TypeFormation;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TypeFormationController extends Controller
{
   
    public function index()
    {
        $typeFormation = TypeFormation::with('ecole')->get();
        return view('admin.formation.index',['typeFormations'=>$typeFormation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ecoles = Ecole::get(); 
        return view('admin.formation.form',['typeFormation'=>new TypeFormation(),'ecoles'=>$ecoles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeFormationRequest $request)
    {
  
       $typeFormation =  TypeFormation::create($request->validated());
 

        return to_route('admin.formation.index')->with('success','Formation du nom '.$typeFormation->libelle.' est ajouté');
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
        return view('admin.formation.form',['typeFormation'=> TypeFormation::find((int)$id),'ecoles'=>Ecole::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        

        TypeFormation::where('id',(int)$id)->update(Arr::except($request->all(),['_token','_method']));
       

      
        return to_route('admin.formation.index')->with('success','Type Formation modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {

        TypeFormation::find((int)$id)->delete();
        return to_route('admin.formation.index')->with('success','TypeFormation supprimé');
    }
}
