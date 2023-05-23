@extends('layouts.app')



@section('content')



<div class="card mt-4">
    
<div class="row justify-content-center m-4" >
    <div class="col-12">

        <a href="{{ route('admin.motif.index') }}" class="btn btn-primary float-right mt-4 mx-4">Retour</a>
    </div>
    <div class="col-12 mx-4 mt-4">

        <form action="{{ route( $motif->id ? 'admin.motif.update' : 'admin.motif.store',$motif) }}" method="post">
            @csrf

            @method($motif->id ? 'PUT' : 'POST')

            <div class="row container">
                 <div class="col-12">
                    @include('shared.input',['type'=>'text','name'=>'libelle','label'=>'Nom Motif','require'=>true,'value'=>$motif->libelle])
                 </div>
                

                 <div class="col-12">
                    @if($motif->id)
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


@endsection