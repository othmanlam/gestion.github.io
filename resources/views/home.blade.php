<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des Interventions</title>
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
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-house-door"></i> Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-person-plus"></i> Gérer Utilisateurs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-pc-display"></i> Gérer Postes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-bar-chart"></i> Statistiques</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Admin -->
    <div class="container mt-4">
        <h1 class="text-center"><i class="bi bi-speedometer2"></i> Tableau de Bord</h1>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <i class="bi bi-people h1"></i>
                    <h5 class="fw-bold">Gérer Utilisateurs</h5>
                    <p>Ajouter, modifier ou supprimer des employés et techniciens.</p>
                    <a href="#" class="btn btn-outline-light" Action="{{ route('utilisateurs.dashbord') }}">Accéder</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <i class="bi bi-pc-display h1"></i>
                    <h5 class="fw-bold">Gérer Postes</h5>
                    <p>Ajouter et suivre les postes informatiques.</p>
                    <a href="#" class="btn btn-outline-light" Action="{{ route('Postes.dashbord') }}">Accéder</a>
                </div>
               
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <i class="bi bi-bar-chart h1"></i>
                    <h5 class="fw-bold">Statistiques & Rapports</h5>
                    <p>Consulter les statistiques et générer des rapports.</p>
                    <a href="#" class="btn btn-outline-light">Voir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5 p-4 text-center">
        <div class="container">
            <p>&copy; 2025 Gestion des Interventions.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
