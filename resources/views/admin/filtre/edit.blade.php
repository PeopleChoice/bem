@extends('layouts.app')




@section('content')

<div class="card mt-4" >
    
    <div class="row  m-4">
                <div class="col-12">
        
                    <a href="{{ route('admin.filtre') }}" class="btn btn-primary float-right mt-4 mx-4 mb-4">Retour</a>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                              <h1 style="text-align: center">Formulaire de modification FTAE</h1>
                        </div>
          
                        <div class="col-12">
                             <div class="card m-4">
                        
                                 <form action="{{ route('admin.filtre.update') }}" method="post" >
                                  @csrf
                                  @method('PUT')
                                    <input type="hidden" name="id" value="{{ $historique->id }}">
                                   <div class="card" style="border: 2px solid #ce0040">
                                          <h4 class="card-title w-100">
                                              <a class="d-block w-100 ml-4 mt-4 mb-4" style="color: black;font-weight: 800;" data-toggle="collapse" href="#collapseOne">
                                                  Identification de l'appelant
                                              </a>
                                          </h4>
                                      
                                          <div>
                                              
                                                  <div class="row m-4">
                                                      <div class="col-12 col-md-4">
                                                          @include('shared.input',['label'=>'Nom','name'=>'nom','type'=>'text','require'=>true,'value'=>$historique->nom])
                                                      </div>
                                                      <div class="col-12 col-md-4">
                                                          @include('shared.input',['label'=>'Prenom','name'=>'prenom','type'=>'text','require'=>true,'value'=>$historique->prenom])
                                                      </div>
                                                      <div class="col-12 col-md-4">
                                                          @include('shared.input',['label'=>'Telephone','name'=>'tel','type'=>'text','require'=>true,'value'=>$historique->tel])
                                                      </div>
                                                      <div class="col-12 col-md-6">
                                                          @include('shared.input',['label'=>'Email','name'=>'email','type'=>'email','require'=>true,'value'=>$historique->email])
                                                      </div>
                                                      <div class="col-12 col-md-6">
                                                          <div class="form-group">
                                                              <label for="">Statut</label>
                                                              <select name="profil" id="profil" class="form-control" required>
                                                                  <option value="">Choisir un statut</option>
                                                                  <option value="Etudiant">Etudiant</option>
                                                                  <option value="Parent">Parent</option>
                                                                  <option value="Autres">Autres</option>
                          
                                                              </select>
                                                          </div>
                                                      </div>
                                                  </div>
                                              
                                          </div>
                                    
                                   </div>
                                   <div class="card" style="border: 2px solid #ce0040">
                                      <h4 class="card-title w-100">
                                          <a class="d-block w-100 ml-4 mt-4 mb-4"  style="color: black;font-weight: 800;" data-toggle="collapse" href="#collapse2">
                                              Identification du programme concerné par l'appel
                                          </a>
                                      </h4>
                                       
                                      <div>
                                              <div class="row m-4">
                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label for="">École concernée</label>
                                                      <select name="ecole_id" id="ecole_id" class="form-control">
                                                          <option value="">Choisir une école</option>
                                                              @foreach ($ecoles as $ecole )
                                                                  <option value="{{ $ecole->id }}">{{ $ecole->libelle }}</option>
                                                              @endforeach
                      
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label for="">Type de formation</label>
                                                      <select name="type_formation_id" id="type_formation_id" class="form-control">
                                                          <option value="">Choisir une formation</option>
                                                              
                      
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label for="">Diplôme concernée</label>
                                                      <select name="diplome_id" id="diplome_id" class="form-control">
                                                          <option value="">Choisir un diplôme</option>
                                                              
                      
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label for="">Programme concernée</label>
                                                      <select name="programme_id" id="programme_id" class="form-control">
                                                          <option value="">Choisir un programme</option>
                                                              
                      
                                                      </select>
                                                  </div>
                                              </div>
                                              
                                              </div>
                                         
                                      </div>
                                  </div>
                                 
          
                                  <div class="card" style="border: 2px solid #ce0040">
                                      <h4 class="card-title w-100">
                                          <a class="d-block w-100 ml-4 mt-4 mb-4"  style="color: black;font-weight: 800;" data-toggle="collapse" href="#collapse3">
                                              Codification de l'objet de l'appel
                                          </a>
                                      </h4>
                                        
                                      <div>
                                              <div class="row m-4">
                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label for="">Motif appel</label>
                                                      <select name="motif_appel_id" id="motif_appel_id" class="form-control" required>
                                                          <option value="">Choisir un motif d'appel</option>
                                                              @foreach ($motifs as $motif )
                                                                  <option value="{{ $motif->id }}">{{ $motif->libelle }}</option>
                                                              @endforeach
                      
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="col-12 col-md-6">
                                                  <div class="form-group">
                                                      <label for="">Objet appel</label>
                                                      <select name="objet_appel_id" id="objet_appel_id" class="form-control" required>
                                                          <option value="">Choisir un Objet d'appel</option>
                                                              
                      
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                      <div class="form-group">
                                                          <label for="">Détails</label>
                                                          <textarea name="details" id="details" cols="30" rows="5" class="form-control"></textarea>
                                                      </div>
                                              </div>
                                              
                                              
                                              </div>
                                      </div>
                                       
                                  </div>
                                  <div class="card" style="border: 2px solid #ce0040">
                                      <h4 class="card-title w-100">
                                          <a class="d-block w-100 ml-4 mt-4 mb-4"  style="color: black;font-weight: 800;" data-toggle="collapse" href="#collapse4">
                                              Résolution apportée
                                          </a>
                                      </h4>
                                      
                                      <div >
                                              <div class="row m-4">
                                                  <div class="col-12 col-md-12">
                                                      <div class="form-group">
                                                          <label for="">Résolution apportée</label>
                                                          <select name="motif_appel_id" id="motif_appel_id" class="form-control" required>
                                                              <option value="">Choisir un résolution</option>
                                                                  @foreach ($resolutions as $resolution)
                                                                      <option value="{{ $resolution->id }}">{{ $resolution->libelle }}</option>
                                                                  @endforeach
                          
                                                          </select>
                                                      </div>
                                                  </div>
                                                 
                                              
                                              
                                              </div>
                                      </div>
                                      
                                  </div>
                                  
                                 <div class="col-12">
                                  
                                  <input type="submit" value="Modifier" class="btn  float-right mr-4" style="background-color: #ce0040;color:white;">
                                 </div>
                                 </form>
                               
                             </div>
                        </div>
                   </div>
                </div>
    </div>

</div>
@endsection

@push('scripts')
    <script>
            $(function(){
                $('#modal').modal({backdrop: 'static', keyboard: false},'show');
                $('#type_formation_id').prop('disabled', true);
                $('#diplome_id').prop('disabled', true);
                $('#programme_id').prop('disabled', true);
                $('#objet_appel_id').prop('disabled', true);
                $('#date_de_rappel').prop('disabled', true);
            });


            $('#ecole_id').on('change',function(){
                var value = $('#ecole_id').val();
                $.ajax({
                    url: "{{ route('getFormation') }}",
                    data: {'ecole_id': value}
                    }).done(function(data) {
                        $('#type_formation_id').html(data);
                        $('#type_formation_id').prop('disabled', false);
                    });
            });



            $('#type_formation_id').on('change',function(){
                var value = $('#type_formation_id').val();
                $.ajax({
                    url: "{{ route('getDiplome') }}",
                    data: {'formation_id': value}
                    }).done(function(data) {
                        $('#diplome_id').html(data);
                        $('#diplome_id').prop('disabled', false);
                    });
            });

            $('#diplome_id').on('change',function(){
                var value = $('#diplome_id').val();
                $.ajax({
                    url: "{{ route('getProgramme') }}",
                    data: {'diplome_id': value}
                    }).done(function(data) {
                        $('#programme_id').html(data);
                        $('#programme_id').prop('disabled', false);
                    });
            });

            $('#motif_appel_id').on('change',function(){
                var value = $('#motif_appel_id').val();
                $.ajax({
                    url: "{{ route('getObjet') }}",
                    data: {'motif_appel_id': value}
                    }).done(function(data) {
                        $('#objet_appel_id').html(data);
                        $('#objet_appel_id').prop('disabled', false);
                    });
            });

            $("#a_rappeler").change(function() {
                if(this.checked == true) {
                    $('#date_de_rappel').prop('disabled', false);
                }else{
                    $('#date_de_rappel').prop('disabled', true);
                }
            });
    </script>
@endpush