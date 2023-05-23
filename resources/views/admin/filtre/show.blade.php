@extends('layouts.app')




@section('content')

<div class="card mt-4" >
    
    <div class="row  m-4">
                <div class="col-12">
        
                    <a href="{{ route('admin.filtre') }}" class="btn btn-primary float-right mt-4 mx-4 mb-4">Retour</a>
                </div>
                <div class="col-12">
                     
                        <div class="container">
                                
                            <table class="table table-striped" width="100%">
                                <tr>
                                    <td colspan="2"><h3>IDENTIFICATION</h3></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Nom</td>
                                    <td style=" " >{{ $historique->nom }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Prénom</td>
                                    <td style=" ">{{ $historique->prenom }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Téléphone</td>
                                    <td style=" ">{{ $historique->tel }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Email</td>
                                    <td style=" ">{{ $historique->email }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Statut</td>
                                    <td style=" ">{{ $historique->profil }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h3>INFOS CODIFICATIONS</h3></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Ecole concernée</td>
                                    <td style=" " >{{ $historique->ecole_id }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Diplôme</td>
                                    <td style=" ">{{ $historique->diplome_id }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Programme concernée</td>
                                    <td style=" ">{{ $historique->programme_id }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Moti Appel</td>
                                    <td style=" ">{{ $historique->motif_appel_id }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Objet Appel</td>
                                    <td style=" ">{{ $historique->objet_appel_id }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Résolution Apportée</td>
                                    <td style=" ">{{ $historique->resolution_apporter_id }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Agent</td>
                                    <td style=" ">{{ $historique->agent }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800;">Commentaire</td>
                                    <td style=" ">{{ $historique->details }}</td>
                                </tr>


                        </table>
                        </div>

                        
                    
                </div>
    </div>
</div>
@endsection