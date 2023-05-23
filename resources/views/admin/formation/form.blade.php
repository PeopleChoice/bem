@extends('layouts.app')



@section('content')

<div class="card mt-4">
    
<div class="row justify-content-center m-4">
    <div class="col-12">

        <a href="{{ route('admin.formation.index') }}" class="btn btn-primary float-right mt-4 mx-4">Retour</a>
    </div>
    <div class="col-12 mx-4 mt-4">

          <div class="card">
            <form action="{{ route( $typeFormation->id ? 'admin.formation.update' : 'admin.formation.store',$typeFormation) }}" method="post" class="m-4">
                @csrf
    
                @method($typeFormation->id ? 'PUT' : 'POST')
             
                <div class="row container">
                   
                     <div class="col-12">
                        <div class="form-group">
                            <label for="">École <span style="color:red">*</span></label>
                            <select name="ecole_id" id="ecole_id" class="form-control">
                                <option value="">Choisir une école</option>
                                @foreach ($ecoles as $ecole )
                                    <option value="{{ $ecole->id }}">{{ $ecole->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                     </div>
                     <div class="col-12">
                        @include('shared.input',['type'=>'text','name'=>'libelle','label'=>'Nom Formation','require'=>true,'value'=>$typeFormation->libelle])
                     </div>
                    
    
                     <div class="col-12">
                        @if($typeFormation->id)
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