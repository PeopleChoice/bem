@extends('layouts.app')



@section('content')

<div class="card mt-4">
    
<div class="row justify-content-center m-4">
    <div class="col-12">

        <a href="{{ route('admin.objet.index') }}" class="btn btn-primary float-right mt-4 mx-4">Retour</a>
    </div>
    <div class="col-12 mx-4 mt-4">

          <div class="card">
            <form action="{{ route( $objet->id ? 'admin.objet.update' : 'admin.objet.store',$objet) }}" method="post" class="m-4">
                @csrf
    
                @method($objet->id ? 'PUT' : 'POST')
             
                <div class="row container">
                     <div class="col-12">
                        @include('shared.input',['type'=>'text','name'=>'libelle','label'=>"Nom Objet d'appel",'require'=>true,'value'=>$objet->libelle])
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                            <select name="motif_appel_id" id="motif_appel_id" class="form-control">
                                <option value="">Faite votre choix</option>
                                @foreach ($motifs as $motif )
                                    <option value="{{ $motif->id }}">{{ $motif->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                     </div>
                    
    
                     <div class="col-12">
                        @if($objet->id)
                                <button class="btn btn-primary">Modifier</button>
                        @else
                                <button class="btn btn-primary">Valider</button>
                        @endif
                     </div>
                </div>
            </form>
          </div>
    </div>
</div>
</div>


@endsection