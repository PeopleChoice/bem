@extends('layouts.app')
@push('style')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>
    
    #example1 th, td {
    white-space: nowrap;
    }
</style>
@endpush


@section('content')

<div class="card mt-4" >
    
    <div class="row justify-content-center m-4">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-3 form-group">
                            <label for="">Téléphone</label>
                             <input type="tel" name="tel" id="tel" class="form-control" placeholder="Saisir numéro téléphone">
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label for="">Ecole</label>
                            <select name="ecole_id" id="ecole_id" class="form-control">
                                <option value="">Choisir une école</option>
                                    @foreach ($ecoles as $ecole )
                                        <option value="{{ $ecole->id }}">{{ $ecole->libelle }}</option>
                                    @endforeach

                            </select>
                        </div>
                        <div class="col-12 col-md-3 form-group">
                        
                            <label for="">Type de formation</label>
                            <select name="type_formation_id" id="type_formation_id" class="form-control">
                                <option value="">Choisir une formation</option>
                                    

                            </select>
                        
                        </div>
                        <div class="col-12  col-md-3 form-group">
                            <label for="">Motif appel</label>
                            <select name="motif_appel_id" id="motif_appel_id" class="form-control" required>
                                <option value="">Choisir un motid d'appel</option>
                                    @foreach ($motifs as $motif )
                                        <option value="{{ $motif->id }}">{{ $motif->libelle }}</option>
                                    @endforeach

                            </select>
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="">Objet appel</label>
                            <select name="objet_appel_id" id="objet_appel_id" class="form-control" required>
                                <option value="">Choisir un objet d'appel</option>
                                    

                            </select>
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="">Date debut <span style="color:red">*</span></label>
                            <input type="date" name="date_debut" id="date_debut" class="form-control">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="">Date Fin <span style="color:red">*</span></label>
                            <input type="date" name="date_fin" id="date_fin" class="form-control">
                        </div>
                        <div class="col-12">
                            <a href="#" id="print" value="print" class="btn btn-default float-right"><i class="fa fa-download"></i></a> &nbsp;
                             <a href="#" id="filtre" value="filtre" class="btn btn-success float-right"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                
                <hr>
                <div class="col-12 table-responsive mt-4">
                    <table id="example1" class="table table-striped table-bordered table-sm" cellspacing="0" >
                        <thead>
                            <tr>
                               <th>Date</th>
                               <th>Heure</th>
                               <th>Nom</th>
                               <th>Prénom</th>
                               <th>Téléphone</th>
                               <th>Ecole </th>
                               <th>Formation </th>
                               <th>Diplome </th>
                               <th>Programme </th>
                               <th>Motif</th>
                               <th>Objet</th>
                               <th>Résolution</th>
                               <th>Agent</th>
                               <th>Commentaire</th>
                               <th>Action</th>

                            </tr>
                      </thead>
                       <tbody id="body">
                          @isset($historiques)
                              @forelse ($historiques as $historique)
                             
                              <tr>
                                
                                  <td>{{ $historique->created_at->format('d-m-Y') }}</td>
                                  <td>{{ $historique->created_at->format('h:i') }}</td>
                                  <td>{{ $historique->nom }}</td>
                                  <td>{{ $historique->prenom }}</td>
                                  <td>{{ $historique->tel }}</td>
                                  <td>{{ $historique->ecole_id }}</td>
                                  <td>{{ $historique->type_formation_id }}</td>
                                  <td>{{ $historique->diplome_id }}</td>
                                  <td>{{ $historique->programme_id }}</td>
                                  <td>{{ $historique->motif_appel_id }}</td>
                                  <td>{{ $historique->objet_appel_id }}</td>
                                  <td>{{ $historique->resolution_apporter_id }}</td>
                                  <td>{{ $historique->agent }}</td>
                                  <td>{{ $historique->details }}</td>
                                  <td>
                                    
                                   
                                    <a href="{{ route('admin.filtre.show',$historique->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    @if(Auth()->user()->profil == "Administrateur")
                                    <a href="{{ route('admin.filtre.edit',$historique) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    @endif  
                                  </td>


                               </tr>
                              @empty
                                  
                              @endforelse
                          @endisset
                      </tbody>
                    </table>
                </div>
          
    </div>
</div>


@endsection

@push('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script>
    $(function(){
        $("#example1").DataTable({
                    "scrollX": true,
                    "responsive": false,
                    "lengthChange":false,
                    "autoWidth": true,
                    'bFilter': false,
                   
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function () {



               $('#type_formation_id').prop('disabled', true);
                $('#diplome_id').prop('disabled', true);
                $('#programme_id').prop('disabled', true);
                $('#objet_appel_id').prop('disabled', true);
                $('#date_de_rappel').prop('disabled', true);
});

   

     $('#print').on('click',function(){
        var tel = $('#tel').val();
        var ecole_id = $('#ecole_id').val();
        var diplome_id = $('#diplome_id').val();
        var type_formation_id = $('#type_formation_id').val();
        var objet_appel_id = $('#objet_appel_id').val();
        var motif_appel_id = $('#motif_appel_id').val();
        var date_debut = $('#date_debut').val();
        var date_fin = $('#date_fin').val();

        var data = 'tel='+tel+'&ecole_id='+ecole_id+'&diplome_id='+diplome_id+'&type_formation_id='+type_formation_id+'&objet_appel_id='+objet_appel_id+'&motif_appel_id='+motif_appel_id+'&date_debut='+date_debut+'&date_fin='+date_fin;

       
            if(date_debut == "" || date_fin == "")
            {
                Swal.fire("Merci de saisir les dates svp","error");
            }else{
                Swal.fire({
                    title: 'Veuillez patienter quelques instants',
                    allowEscapeKey:false,
                    allowOutsideKey:false,
                    didOpen:()=>{
                       
                        Swal.showLoading();
                        
                        var url = "{{route('admin.filtre.imprime')}}?" + data;
                        window.open(url, '_blank');
                        Swal.hideLoading();
                    //     var url = "{{route('admin.filtre.imprime')}}";
                    //    let win =  window.open(url, '_blank');
                    //     win['data'] = data; 
                    //     Swal.hideLoading();
                        // $.ajax({
                        // tyepe:"GET",
                        // url: "{{ route('admin.filtre.imprime') }}",
                        // data: data
                        // }).done(function(data) {
                           
                        //     console.log(data);
                        //     Swal.hideLoading();
                        //     var a = document.createElement("a");
                        //     a.href = response.file; 
                        //     a.download = response.name;
                        //     document.body.appendChild(a);
                        //     a.click();
                        //     a.remove();
                         
                        // });
                    }
                });
           
                 
            }

        });


        $('#filtre').on('click',function(){
        var tel = $('#tel').val();
        var ecole_id = $('#ecole_id').val();
        var diplome_id = $('#diplome_id').val();
        var type_formation_id = $('#type_formation_id').val();
        var objet_appel_id = $('#objet_appel_id').val();
        var motif_appel_id = $('#motif_appel_id').val();
        var date_debut = $('#date_debut').val();
        var date_fin = $('#date_fin').val();

        var data = {'tel': tel,'ecole_id':ecole_id,'diplome_id':diplome_id,'type_formation_id':type_formation_id,'objet_appel_id':objet_appel_id,'motif_appel_id':motif_appel_id,'date_debut':date_debut,'date_fin':date_fin};

       
            if(date_debut == "" || date_fin == "")
            {
                Swal.fire("Merci de saisir les dates svp","error");
            }else{
                Swal.fire({
                    title: 'Veuillez patienter quelques instants',
                    allowEscapeKey:false,
                    allowOutsideKey:false,
                    didOpen:()=>{
                       
                        Swal.showLoading();
                        $.ajax({
                        tyepe:"GET",
                        url: "{{ route('admin.filtre.getfiltre') }}",
                        data: data
                        }).done(function(data) {
                           
                            $('#body').html(data);
                            Swal.hideLoading();
                         
                        });
                    }
                });
           
                 
            }

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
