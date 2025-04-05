<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>

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
            <a class="navbar-brand" href="#"><i class="bi bi-laptop"></i> Admin - Gestion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard')}}"><i class="bi bi-house-door"></i> Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-person-plus"></i> Gérer Utilisateurs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-pc-display"></i> Gérer Postes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-bar-chart"></i> Statistiques</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Liste des utilisateurs -->
    <div class="container mt-4">
        <h1 class="text-center">Liste des utilisateurs</h1>

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

       
        <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary mb-3" >Ajouter un utilisateur</a>

        <table class="table table-bordered table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Spécialité</th>
            <th>Charge de Travail</th>
            <th>Disponibilité</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($utilisateurs as $utilisateur)
            <tr>
                <td>{{ $utilisateur->id }}</td>
                <td>{{ $utilisateur->nom }}</td>
                <td>{{ $utilisateur->email }}</td>
                <td>{{ $utilisateur->role }}</td>

                @if($utilisateur->role == 'Technicien')
                    {{-- Vérifie si la relation technicien existe --}}
                    @if($utilisateur->technicien)
                        <td>{{ $utilisateur->technicien->specialite ?? 'Non renseignée' }}</td>
                        <td>{{ $utilisateur->technicien->charge_de_travail ?? 'Non renseignée' }}</td>
                        <td>{{ $utilisateur->technicien->disponible ? 'Disponible' : 'Indisponible' }}</td>
                    @else
                        <td colspan="3">Aucune donnée de technicien</td>
                    @endif
                @else
                    <td colspan="3">null</td>
                @endif
                
                <td>
                    <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    |
                    <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                    </form>
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
