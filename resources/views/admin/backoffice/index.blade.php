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
                                            
                                        
                                            <a href="{{ route('admin.backoffice.show',$historique->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                          
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


@endpush
