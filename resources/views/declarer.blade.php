<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déclarer un Problème</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body { background-color: #181818; color: #fff; }
        .container { background-color: #222; padding: 20px; border-radius: 10px; max-width: 500px; }
        .form-control, .form-select { background-color: #333; color: #fff; border: 1px solid #444; }
        .form-control:focus, .form-select:focus { background-color: #444; color: #fff; }
        .btn-primary { background-color: #ff4500; border: none; }
        .btn-primary:hover { background-color: #e03e00; }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4"><i class="bi bi-exclamation-triangle"></i> Déclarer un Problème</h1>

        @if(session('success'))
            <div class="alert alert-success"><i class="bi bi-check-circle"></i> {{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger"><i class="bi bi-x-circle"></i> {{ session('error') }}</div>
        @endif

        <form action="{{ route('pannes.storeDeclaration', $poste->id) }}" method="POST">
            @csrf

            <!-- Type de Panne -->
            <div class="mb-3">
                <label for="type_panne" class="form-label"><i class="bi bi-bug"></i> Type de Panne</label>
                <input type="text" class="form-control" id="type_panne" name="type_panne" required>
            </div>

            <!-- Date de Signalement -->
            <div class="mb-3">
                <label for="date_signalement" class="form-label"><i class="bi bi-calendar"></i> Date de Signalement</label>
                <input type="date" class="form-control" id="date_signalement" name="date_signalement" value="{{ now()->toDateString() }}" required>
            </div>

            <!-- Statut -->
            <div class="mb-3">
                <label for="statut" class="form-label"><i class="bi bi-info-circle"></i> Statut</label>
                <select class="form-select" id="statut" name="statut" required>
                    <option value="En Panne">🔴 En Panne</option>
                    <option value="En Réparation">🟡 En Réparation</option>
                    <option value="Réparé">🟢 Réparé</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100"><i class="bi bi-send"></i> Déclarer le Problème</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
