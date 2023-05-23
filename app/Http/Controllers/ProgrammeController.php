<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgrammeRequest;
use App\Models\Diplome;
use App\Models\Ecole;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::with('diplome.typeFormation.ecole')->get();
        return view('admin.programme.index',['programmes'=>$programmes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ecoles = Ecole::get(); 
        return view('admin.programme.form',['programme'=>new Programme(),'ecoles'=>$ecoles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          
       $programme =  Programme::create(Arr::except($request->all(),['_method','_token']));
 

        return to_route('admin.programme.index')->with('success','Programme '.$programme->libelle.' est ajouté');
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
        return view('admin.programme.form',['programme'=> Programme::find((int)$id),'ecoles'=>Ecole::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        

        Programme::where('id',(int)$id)->update(Arr::except($request->all(),['_token','_method','ecole_id','type_formation_id']));
       

      
        return to_route('admin.programme.index')->with('success','Programme modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {

        Programme::find((int)$id)->delete();
        return to_route('admin.programme.index')->with('success','Programme supprimé');
    }

}
