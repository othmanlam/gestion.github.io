<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Postes en Panne</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body { background-color: #181818; color: #fff; }
        .navbar { background-color: #222; }
        .table-dark { background-color: #242424; }
        .table-hover tbody tr:hover { background-color: #333 !important; }
        .badge-success { background-color: #28a745; }
        .badge-danger { background-color: #dc3545; }
        .badge-warning { background-color: #ffc107; color: #000; }
        .btn-outline-light:hover { background-color: #ff4500; border-color: #ff4500; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-tools"></i> Gestion des Pannes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-house-door"></i> Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('demandeSuivi') }}"><i class="bi bi-clock-history"></i> Suivi des Demandes</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container mt-5">
        <h1 class="text-center mb-4"><i class="bi bi-exclamation-triangle-fill text-danger"></i> Postes en Panne</h1>

        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif

        @if($pannes->isEmpty())
            <div class="alert alert-warning text-center">
                <i class="bi bi-info-circle"></i> Aucun poste en panne à afficher.
            </div>
        @else
            <table class="table table-bordered table-dark table-hover">
                <thead>
                    <tr class="text-center">
                        <th><i class="bi bi-upc"></i> Numéro Série</th>
                        <th><i class="bi bi-laptop"></i> Modèle</th>
                        <th><i class="bi bi-geo-alt"></i> Emplacement</th>
                        <th><i class="bi bi-info-circle"></i> État</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pannes as $panne)
                        <tr class="text-center">
                            <td>{{ $panne->numero_serie }}</td>
                            <td>{{ $panne->modele }}</td>
                            <td>{{ $panne->emplacement }}</td>
                            <td>
                                <span class="badge {{ $panne->etat == 'Disponible' ? 'badge-success' : ($panne->etat == 'En Panne' ? 'badge-danger' : 'badge-warning') }}">
                                    {{ $panne->etat }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('pannes.declarerProbleme', $panne->id) }}" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-exclamation-triangle"></i> Déclarer Problème
                                </a>
                                <a href="{{ route('demandeSuivi') }}" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-clock-history"></i> Suivi
                                </a>
                                @if($panne->probleme)
                                    <form action="{{ route('pannes.supprimerDeclaration', $panne->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette déclaration ?')">
                                            <i class="bi bi-trash"></i> Supprimer
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Footer -->
    <footer class="mt-5 p-4 text-center">
        <div class="container">
            <p>&copy; 2025 Gestion des Interventions</p>
        </div>
    </footer>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
