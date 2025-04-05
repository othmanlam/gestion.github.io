<!-- resources/views/indexassin.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pannes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Liste des Pannes</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID Panne</th>
                    <th>Technicien</th>
                    <th>Description</th>
                    <th>Date d'ajout</th>
                    
                    <th><i class="bi bi-upc"></i> Emplacement</th>
                    <th><i class="bi bi-laptop"></i> Modèle</th>
                    <th><i class="bi bi-exclamation-circle"></i> Type Panne</th>
                    <th><i class="bi bi-person"></i> Responsable</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($pannes as $panne)
                    <tr>
                        <td>{{ $panne->id }}</td>
                        <td>{{ $panne->technicien ? $panne->technicien->name : 'Non assigné' }}</td>
                        <td>{{ $panne->description }}</td>
                        <td>{{ $panne->created_at->format('d-m-Y H:i') }}</td>
                        <td>{{ $panne->poste->emplacement }}</td>
                        <td>{{ $panne->poste->modele }}</td>
                        <td>{{ $panne->type_panne }}</td>
                        <td>{{ $panne->poste->responsable->nom }}</td>
                        <td>
                            <!-- Bouton Assigner -->
                            <button class="btn btn-info" data-toggle="modal" data-target="#assignTechnicienModal{{ $panne->id }}">Assigner</button>

                            <!-- Modal -->
                            <div class="modal fade" id="assignTechnicienModal{{ $panne->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Assigner un Technicien</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('pannes.assign', $panne->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="technicien_id">Choisir un technicien:</label>
        <select name="technicien_id" id="technicien_id" class="form-control" required>
            <option value="">Choisir un technicien</option>
            @foreach($techniciens as $technicien)
                <option value="{{ $technicien->id }}">
                    {{ $technicien->name }} - 
                    {{ $technicien->specialite }} - 
                    {{ $technicien->charge_de_travail }} heures - 
                    {{ $technicien->disponible ? 'Disponible' : 'Indisponible' }}
                </option>
            @endforeach
        </select>
    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
