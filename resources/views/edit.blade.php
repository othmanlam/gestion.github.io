<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #181818;
            color: #fff;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .form-label {
            font-weight: bold;
        }
        .card {
            background-color: #242424;
            border-radius: 8px;
            color: #fff;
        }
        .form-control:focus {
            border-color: #ff4500;
            box-shadow: 0 0 0 0.2rem rgba(255, 69, 0, 0.25);
        }
        .btn-custom {
            background-color: #ff4500;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #ff6347;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .card-header {
            background-color: #222;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h3><i class="bi bi-pencil-square"></i> Modifier l'utilisateur</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('utilisateurs.update', $utilisateur->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $utilisateur->nom) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $utilisateur->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Rôle</label>
                        <select class="form-control" id="role" name="role">
                            <option value="Admin" {{ $utilisateur->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Technicien" {{ $utilisateur->role == 'Technicien' ? 'selected' : '' }}>Technicien</option>
                            <option value="Employé" {{ $utilisateur->role == 'Employé' ? 'selected' : '' }}>Employé</option>
                            <option value="AgentHyperdesk" {{ $utilisateur->role == 'AgentHyperdesk' ? 'selected' : '' }}>AgentHyperdesk</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-custom">Mettre à jour</button>
                    <a href="{{ route('utilisateurs.index') }}" class="btn btn-secondary ms-3">Retour</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
