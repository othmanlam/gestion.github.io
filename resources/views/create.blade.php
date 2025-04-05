<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #181818;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #222;
        }

        .card {
            background-color: #242424;
            color: #fff;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .card-header {
            background-color:   #ff4500;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            background-color: #333;
            color: #fff;
            border-radius: 4px;
            border: 1px solid #555;
        }

        .btn-custom {
            background-color: #ff4500;
            color: white;
            font-weight: bold;
            border-radius: 4px;
        }

        .btn-custom:hover {
            background-color: #ff6347;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
        }

        .footer a {
            color: #ff6347;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const roleSelect = document.getElementById("role");
        const technicienFields = document.getElementById("technicien-fields");

        function toggleTechnicienFields() {
            technicienFields.style.display = roleSelect.value === "Technicien" ? "block" : "none";
        }

        roleSelect.addEventListener("change", toggleTechnicienFields);
        toggleTechnicienFields();
    });
</script>

</head>
<body>

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Ajouter un utilisateur</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('utilisateurs.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" required placeholder="Entrez le nom complet">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Entrez l'email">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Rôle</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="Admin">Admin</option>
                            <option value="Technicien">Technicien</option>
                            <option value="Employé">Employé</option>
                            <option value="AgentHyperdesk">Agent Hyperdesk</option>
                        </select>
                    </div>
                    <div id="technicien-fields" style="display: none;">
    <div class="mb-3">
        <label for="specialite" class="form-label">Spécialité</label>
        <input type="text" name="specialite" id="specialite" class="form-control">
    </div>

    <div class="mb-3">
        <label for="charge_de_travail" class="form-label">Charge de travail</label>
        <input type="number" name="charge_de_travail" id="charge_de_travail" class="form-control">
    </div>

    <div class="mb-3">
        <label for="disponible" class="form-label">Disponibilité</label>
        <select name="disponible" id="disponible" class="form-control">
            <option value="1">Disponible</option>
            <option value="0">Non disponible</option>
        </select>
    </div>
</div>


                    <div class="mb-3">
                        <label for="mot_de_passe" class="form-label">Mot de passe</label>
                        <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" required placeholder="Créez un mot de passe">
                    </div>

                    <button type="submit" class="btn btn-custom btn-block">Ajouter</button>
                </form>
            </div>
        </div>

        <div class="footer">
            <p>&copy; 2025 Gestion des utilisateurs. </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
