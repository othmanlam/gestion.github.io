<!-- resources/views/pannes/create.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une nouvelle Panne</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Créer une nouvelle Panne</h2>
        <form action="{{ route('pannes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="technicien_id">Choisir un technicien :</label>
                <select name="technicien_id" id="technicien_id" class="form-control" required>
                    <option value="">Choisir un technicien</option>
                    @foreach($techniciens as $technicien)
                        <option value="{{ $technicien->id }}">{{ $technicien->name }} - {{ $technicien->specialite }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Créer la Panne</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
