@extends('layouts.app')



@section('content')

<div class="card mt-4">
   <div class="row justify-content-center m-4">
      <div class="col-12">
  
          <a href="{{ route('admin.user.index') }}" class="btn btn-primary float-right mt-4 mx-4">Retour</a>
      </div>
      <div class="col-12 mx-4 mt-4">
  
          <form action="{{ route( $user->id ? 'admin.user.update' : 'admin.user.store',$user) }}" method="post">
              @csrf
  
              @method($user->id ? 'PUT' : 'POST')
  
              <div class="row container">
                   <div class="col-12">
                      @include('shared.input',['type'=>'text','name'=>'name','label'=>'Prénom et Nom','require'=>true,'value'=>$user->name])
                   </div>
                   <div class="col-12">
                      @include('shared.input',['type'=>'email','name'=>'email','label'=>'Email','require'=>true,'value'=>$user->email])
                   </div>
                   <div class="col-12">
                      @include('shared.select',['name'=>'profil','label'=>'Profil','list_item'=>array(['id'=>'Administrateur','name'=>'Administrateur'],['id'=>'Superviseur','name'=>'Superviseur']),'placholder'=>'Faite  votre choix'])
                   </div>
                   <div class="col-12">
                      @include('shared.input',['type'=>'password','name'=>'password','label'=>'Password','require'=>true])
                   </div>
                   <div class="col-md-12">
                      @include('shared.input',['type'=>'password','name'=>'password_confirmation','label'=>'Confirme Password','require'=>true])
                  </div>
  
                   <div class="col-12">
                      @if($user->id)
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