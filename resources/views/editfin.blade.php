<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer l'Intervention</title>

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

    <!-- Formulaire d'édition de l'intervention -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Éditer l'Intervention</h1>

        <!-- Formulaire de mise à jour de l'intervention -->
        <form action="{{ route('interventions.update', $intervention->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Utiliser la méthode PUT pour la mise à jour -->

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $intervention->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="pieces_remplacees" class="form-label">Pièces Remplacées :</label>
                <input type="text" name="pieces_remplacees" value="{{ old('pieces_remplacees', $intervention->pieces_remplacees) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="date_fin" class="form-label">Date de Fin :</label>
                <input type="date" name="date_fin" value="{{ old('date_fin', $intervention->date_fin) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="statut_intervention" class="form-label">Statut de l'Intervention :</label>
                <select name="statut_intervention" class="form-control" required>
                    <option value="En cours" {{ old('statut_intervention', $intervention->statut_intervention) == 'En cours' ? 'selected' : '' }}>En cours</option>
                    <option value="Terminé" {{ old('statut_intervention', $intervention->statut_intervention) == 'Terminé' ? 'selected' : '' }}>Terminé</option>
                    <option value="Annulé" {{ old('statut_intervention', $intervention->statut_intervention) == 'Annulé' ? 'selected' : '' }}>Annulé</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
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
