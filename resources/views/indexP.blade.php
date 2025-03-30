<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Postes</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Ton fichier CSS personnalisé (si besoin) -->
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">📋 Liste des Postes</h2>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('postes.create') }}" class="btn btn-success mb-3">
        <i class="fa fa-plus"></i> Ajouter un poste
    </a>

    <div class="table-responsive">
        <table class="table table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th><i class="fa fa-barcode"></i> Numéro Série</th>
                    <th><i class="fa fa-laptop"></i> Modèle</th>
                    <th><i class="fa fa-map-marker-alt"></i> Emplacement</th>
                    <th><i class="fa fa-user"></i> Responsable</th>
                    <th><i class="fa fa-info-circle"></i> État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($postes as $poste)
                <tr>
                    <td>{{ $poste->id }}</td>
                    <td>{{ $poste->numero_serie }}</td>
                    <td>{{ $poste->modele }}</td>
                    <td>{{ $poste->emplacement }}</td>
                    <td>{{ $poste->responsable->nom }}</td>
                    <td>
                        <span class="badge bg-{{ $poste->etat == 'Disponible' ? 'success' : ($poste->etat == 'En Panne' ? 'danger' : 'warning') }}">
                            {{ $poste->etat }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('postes.edit', $poste->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Modifier
                        </a>

                        <form action="{{ route('postes.destroy', $poste->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce poste ?')">
                                <i class="fa fa-trash"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
