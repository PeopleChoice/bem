{{-- {{ $telephone }} --}}


@extends('layouts.app_public')

@push('style')
    <style>
        
    
        #example1 th, td {
          white-space: nowrap;
        }

    </style>
@endpush
@section('content')

<div id="modal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
         <div class="row">
              <div class="col-12">
                <img src="{{ asset('img/logo.png') }}" style="width: 10%" class="ml-4 mt-4" alt="">
                <p style="font-size: large;font-weight: 700;text-align: center;margin-top: -50px;" >Fiche Traitement Appel Entrant</p>
              </div>
              

              <div class="col-12">
                   <div class="card m-4">
              
                       <form action="{{ route('store') }}" method="post" >
                        @csrf
                        @method('POST')
                        <div class="accordion" id="accordion">
                         <div class="card" style="border: 2px solid #ce0040">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100 ml-4 mt-4 mb-4" style="color: black;font-weight: 800;" data-toggle="collapse" href="#collapseOne">
                                        Identification de l'appelant
                                    </a>
                                </h4>
                            
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    
                                        <div class="row m-4">
                                            <div class="col-12 col-md-4">
                                                @include('shared.input',['label'=>'Nom','name'=>'nom','type'=>'text','require'=>true,'value'=>sizeof($historiques) > 0 ? $historiques[0]->nom : ''])
                                            </div>
                                            <div class="col-12 col-md-4">
                                                @include('shared.input',['label'=>'Prénom','name'=>'prenom','type'=>'text','require'=>true,'value'=>sizeof($historiques) > 0 ? $historiques[0]->prenom : ''])
                                            </div>
                                            <div class="col-12 col-md-4">
                                                @include('shared.input',['label'=>'Téléphone','name'=>'tel','type'=>'text','require'=>true,'value'=>$telephone])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                @include('shared.input',['label'=>'Email','name'=>'email','type'=>'email','require'=>false,'value'=>sizeof($historiques) > 0 ? $historiques[0]->email : ''])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Statut <span style="color:red">*</span></label>
                                                    <select name="profil" id="profil" class="form-control" required>
                                                        <option value="Etudiant">Etudiant(e)</option>
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
                             
                            <div id="collapse2" class="collapse " data-parent="#accordion">
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
                                                <option value="">Chosir un diplôme concernée</option>
                                                    
            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Programme concernée</label>
                                            <select name="programme_id" id="programme_id" class="form-control">
                                                <option value="">Choisir un programme concernée</option>
                                                    
            
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
                              
                            <div id="collapse3" class="collapse " data-parent="#accordion">
                                    <div class="row m-4">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Motif appel <span style="color:red">*</span></label>
                                            <select name="motif_appel_id" id="motif_appel_id" class="form-control" required>
                                                <option value="">Choisir un motif appel</option>
                                                    @foreach ($motifs as $motif )
                                                        <option value="{{ $motif->id }}">{{ $motif->libelle }}</option>
                                                    @endforeach
            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Objet appel <span style="color:red">*</span></label>
                                            <select name="objet_appel_id" id="objet_appel_id" class="form-control" required>
                                                <option value="">Choisir un objet appel</option>
                                                    
            
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
                            
                            <div id="collapse4" class="collapse " data-parent="#accordion">
                                    <div class="row m-4">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label for="">Résolution apportée <span style="color:red">*</span></label>
                                                <select name="resolution_apporter_id" id="motif_appel_id" class="form-control" required>
                                                    <option value="">Choisir une résolution</option>
                                                        @foreach ($resolutions as $resolution)
                                                            <option value="{{ $resolution->id }}">{{ $resolution->libelle }}</option>
                                                        @endforeach
                
                                                </select>
                                            </div>
                                        </div>
                                    
                                    
                                    
                                    </div>
                            </div>
                            
                        </div>
                        </div>
                       <div class="col-12">
                        
                        <input type="submit" value="Enregistrer" class="btn  float-right mr-4" style="background-color: #ce0040;color:white;">
                       </div>
                       </form>
                       <div class="row">
                         
                            <div class="col-12 table-responsive">
                                  <fieldset>
                                      <p style="font-size: 19px;font-weight: 700;">Historique des appels</p>
                                      <table id="exemple1" class="table table-striped">
                                         <thead>
                                              <tr>
                                                 <th>Date appels</th>
                                                 <th>Ecole concernée</th>
                                                 <th>Programme concernée</th>
                                                 <th>Motif</th>
                                                 <th>Objet</th>
                                                 <th>Résolution apportée</th>
                                                 <th>Agent ayant traité la demande </th>

                                              </tr>
                                        </thead>
                                         <tbody>
                                            @isset($historiques)
                                                @forelse ($historiques as $historique)
                                               
                                                <tr>
                                                    <td>{{ $historique->created_at->format('d-m-Y  h:i') }}</td>
                                                    <td>{{ $historique->ecole_id}}</td>
                                                    <td>{{ $historique->programme_id }}</td>
                                                    <td>{{ $historique->motif_appel_id }}</td>
                                                    <td>{{ $historique->objet_appel_id }}</td>
                                                    <td>{{ $historique->resolution_pporter_id}}</td>
                                                    <td>{{ $historique->agent }}</td>
   
                                                 </tr>
                                                @empty
                                                    
                                                @endforelse
                                            @endisset
                                        </tbody>
                                      </table>
                                  </fieldset>
                            </div>
                       </div>
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