<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employé - Gestion des Postes</title>
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
            <a class="navbar-brand" href="#"><i class="bi bi-person"></i> Employé - Gestion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-house-door"></i> Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('mes.pannes') }}"><i class="bi bi-pc-display"></i> Mes Postes</a></li>
                    <li class="nav-item"><a class="nav-link" ><i class="bi bi-exclamation-triangle"></i> Signaler un Problème</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-clock-history"></i> Suivi des Demandes</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Employé -->
    <div class="container mt-4">
        <h1 class="text-center"><i class="bi bi-pc"></i> Tableau de Bord</h1>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <i class="bi bi-pc-display h1"></i>
                    <h5 class="fw-bold">Mes Postes</h5>
                    <p>Consulter la liste des postes informatiques sous votre responsabilité.</p>
                    <a class="btn btn-outline-light" href="{{ route('mes.pannes') }}">voir </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <i class="bi bi-exclamation-triangle h1"></i>
                    <h5 class="fw-bold">Signaler un Problème</h5>
                    <p>Remplissez un formulaire pour signaler un problème avec votre poste.</p>
                    <a class="btn btn-outline-light" href="{{ route('mes.pannes') }}">Signaler </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <i class="bi bi-clock-history h1"></i>
                    <h5 class="fw-bold">Suivi des Demandes</h5>
                    <p>Suivez l'état de vos demandes de réparation.</p>
                    <a href="{{ route('demandeSuivi')}}" class="btn btn-outline-light">Suivre</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5 p-4 text-center">
        <div class="container">
            <p>&copy; 2025 Gestion des Interventions</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
