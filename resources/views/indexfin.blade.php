<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Interventions</title>

    <!-- Ajout de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body { background-color: #181818; color: #fff; }
        .navbar { background-color: #222; }
        .card { background-color: #242424; color: #fff; }
        .card i { color: #ff4500; }
        a { color: #ff4500; }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-wrench"></i> Gestion des Interventions</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('interventions.index') }}"><i class="bi bi-house-door"></i> Accueil</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Liste des interventions -->
    <div class="container mt-4">
        <h1 class="text-center">Liste des Interventions</h1>

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif


        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Panne</th>
                    <th>Technicien</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Pièces Remplacées</th>
                    <th>Date de Fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($interventions as $intervention)
                    <tr>
                        <td>{{ $intervention->id }}</td>
                        <td>{{ $intervention->panne ? $intervention->panne->type_panne : 'Non renseigné' }}</td>
                        <td>{{ $intervention->technicien ? $intervention->technicien->utilisateur->nom : 'Non renseigné' }}</td>
                        <td>{{ $intervention->description }}</td>
                        <td>{{ $intervention->statut_intervention }}</td>
                        <td>{{ $intervention->pieces_remplacees }}</td>
                        <td>{{ $intervention->date_fin }}</td>
                        <td>
                            <a href="{{ route('interventions.edit', $intervention->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Footer -->
    <footer class="mt-5 p-4 text-center">
        <div class="container">
            <p>&copy; 2025 Gestion des Interventions.</p>
        </div>
    </footer>

    <!-- Ajouter le script Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
