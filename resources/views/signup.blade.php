<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .background-shape {
            position: absolute;
            top: 0;
            left: 0;
            width: 60%;
            height: 100%;
            background-color: #dc3545; /* Rouge Bootstrap */
            border-bottom-right-radius: 50%;
        }
        .signup-container {
            position: relative;
            background-color: #1f1f1f;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            z-index: 10;
        }
        .form-control {
            background-color: #333;
            color: white;
            border: none;
        }
        .form-control:focus {
            background-color: #444;
            color: white;
            border: 2px solid #dc3545;
            box-shadow: none;
        }
        .btn-signup, .btn-join {
            background-color: #dc3545;
            border: none;
            transition: 0.3s;
        }
        .btn-signup:hover, .btn-join:hover {
            background-color: #bb2d3b;
        }
    </style>
</head>
<body>

    <div class="background-shape"></div>

    <div class="signup-container">
        <h2 class="text-center text-white mb-4">GESTION DES INTERVENTIONS</h2>

        <form method="POST"  action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label text-white">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-signup w-100 text-white py-2">Se connecter</button>
</form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
