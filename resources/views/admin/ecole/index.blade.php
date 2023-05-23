@extends('layouts.app')


@push('style')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush


@section('content')

<div class="card mt-4" >
    
    <div class="row justify-content-center m-4">
        <div class="col-12">

            <a href="{{ route('admin.ecole.create') }}" class="btn btn-primary float-right mt-4 mx-4">Ajouter une école</a>
        </div>
        <div class="col-12 mx-4 mt-4 table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom Ecole</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                        
                  
                    
                    @foreach ($ecoles as $ecole)
                        <tr>
                          
                            <td>{{$ecole->id}}</td>
                            <td>{{$ecole->libelle}}</td>
                           
                           
                            <td>
                                <div class="d-flex gap-2 w-100 justify-content-end">                               
                                    @if(Auth()->user()->profil == "Administrateur")
                                        <a href="{{ route('admin.ecole.edit', $ecole) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    @endif  
                                    &nbsp;&nbsp;
                                    @if(Auth()->user()->profil == "Administrateur")
                                        <form action="{{ route('admin.ecole.destroy',$ecole) }}" method="post">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                       </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
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
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script>
	$(function () {

$("#example1").DataTable({
"responsive": true,
"lengthChange": false,
"autoWidth": false,
"buttons": [
"copy",
"csv",
"excel",
"pdf",
"print",
"colvis"
]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>
@endpush