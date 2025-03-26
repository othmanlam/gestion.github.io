<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technicien - Gestion des Interventions</title>
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
            <a class="navbar-brand" href="#"><i class="bi bi-tools"></i> Technicien - Interventions</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-house-door"></i> Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-tools"></i> Mes Interventions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-clipboard-check"></i> Historique</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Technicien -->
    <div class="container mt-4">
        <h1 class="text-center"><i class="bi bi-wrench"></i> Tableau de Bord</h1>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <i class="bi bi-list-check h1"></i>
                    <h5 class="fw-bold">Mes Interventions</h5>
                    <p>Voir les pannes assignées et leur état.</p>
                    <a href="#" class="btn btn-outline-light">Accéder</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <i class="bi bi-tools h1"></i>
                    <h5 class="fw-bold">Diagnostic & Réparation</h5>
                    <p>Mettre à jour l'état des pannes et enregistrer les actions effectuées.</p>
                    <a href="#" class="btn btn-outline-light">Accéder</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <i class="bi bi-clipboard-check h1"></i>
                    <h5 class="fw-bold">Historique</h5>
                    <p>Consulter les interventions passées et les réparations effectuées.</p>
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
