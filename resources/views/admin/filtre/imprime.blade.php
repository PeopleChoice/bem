<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.css') }}">
</head>
<body>
       <div class="row">
           <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date appels</th>
                            <th>Heure</th>
                            <th>Profil</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Ecole concernée</th>
                            <th>Type formation</th>
                            <th>Diplôme</th>
                            <th>Programme concernée</th>
                            <th>Motif</th>
                            <th>Objet</th>
                            <th>Résolution apportée</th>
                            <th>Agent ayant traité la demande </th>
                            <th>Commentaire</th>

                        </tr>
                </thead>
                    <tbody>
                    @isset($historiques)
                        
                        @foreach ($historiques as $historique)
                       
                                    <tr>
                                        <td>{{ $historique->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $historique->created_at->format('h:i') }}</td>
                                        <td>{{ $historique->profil }}</td>
                                        <td>{{ $historique->nom }}</td>
                                        <td>{{ $historique->prenom }}</td>
                                        <td>{{ $historique->tel }}</td>
                                        <td>{{ $historique->email }}</td>
                                        <td>{{ $historique->ecole_id}}</td>
                                        <td>{{ $historique->type_formation_id }}</td>
                                        <td>{{ $historique->diplome_id }}</td>
                                        <td>{{ $historique->programme_id }}</td>
                                        <td>{{ $historique->motif_appel_id }}</td>
                                        <td>{{ $historique->objet_appel_id }}</td>
                                        <td>{{ $historique->resolution_apporter_id}}</td>
                                        <td>{{ $historique->agent }}</td>
                                        <td>{{ $historique->details }}</td>

                                    </tr>
                        
                            
                        @endforeach
                    @endisset
                </tbody>
                </table>
         
           </div>
       </div>
</body>
</html>