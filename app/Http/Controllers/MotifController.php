<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotifRequest;
use App\Models\MotifAppel;
use Illuminate\Http\Request;

class MotifController extends Controller
{
    
    public function index()
    {
        $motifs = MotifAppel::get();
        return view('admin.motif.index',['motifs'=>$motifs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.motif.form',['motif'=>new MotifAppel()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MotifRequest $request)
    {

       $motif =  MotifAppel::create($request->validated());

        return to_route('admin.motif.index')->with('success','Motif du nom '.$motif->libelle.' est ajouté');
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
    public function edit(MotifAppel $motif)
    {
        return view('admin.motif.form',['motif'=>$motif]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MotifRequest $request, string $id)
    {
        $data = $request->validated();

        MotifAppel::where('id',(int)$id)->update($data);
       

      
        return to_route('admin.motif.index')->with('success','Motif appel  modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MotifAppel $motif)
    {
        $motif->delete();
        return to_route('admin.motif.index')->with('success','Motif appel supprimé');
    }
}
