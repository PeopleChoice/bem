@extends('layouts.app')



@section('content')


<div class="card mt-4">
    <div class="row justify-content-center m-4">
        <div class="col-12">
    
            <a href="{{ route('admin.programme.index') }}" class="btn btn-primary float-right mt-4 mx-4">Retour</a>
        </div>
        <div class="col-12 mx-4 mt-4">
    
              <div class="card">
                <form action="{{ route( $programme->id ? 'admin.programme.update' : 'admin.programme.store',$programme) }}" method="post" class="m-4">
                    @csrf
        
                    @method($programme->id ? 'PUT' : 'POST')
                 
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
                            <div class="form-group">
                                <select name="type_formation_id" id="type_formation_id" class="form-control">
                                    <option value="">Choisir une formation</option>
                                     
                                </select>
                            </div>
                         </div>
                         <div class="col-12">
                            <div class="form-group">
                                <select name="diplome_id" id="diplome_id" class="form-control">
                                    <option value="">Choisir un diplôme</option>
                                  
                                </select>
                            </div>
                         </div>
                         <div class="col-12">
                            @include('shared.input',['type'=>'text','name'=>'libelle','label'=>'Nom Programme','require'=>true,'value'=>$programme->libelle])
                         </div>
                        
        
                         <div class="col-12">
                            @if($programme->id)
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
@push('scripts')
    <script>
              $(function(){
                $('#type_formation_id').prop('disabled', true);
                $('#diplome_id').prop('disabled', true);
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

    </script>
@endpush