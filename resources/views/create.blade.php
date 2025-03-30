<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Poste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Ajouter un Poste</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('postes.store') }}" method="POST" class="shadow p-4 rounded bg-light">
        @csrf

        <div class="mb-3">
            <label for="numero_serie" class="form-label">Numéro de Série</label>
            <input type="text" class="form-control" id="numero_serie" name="numero_serie" value="{{ old('numero_serie') }}" required>
        </div>

        <div class="mb-3">
            <label for="modele" class="form-label">Modèle</label>
            <input type="text" class="form-control" id="modele" name="modele" value="{{ old('modele') }}" required>
        </div>

        <div class="mb-3">
            <label for="emplacement" class="form-label">Emplacement</label>
            <input type="text" class="form-control" id="emplacement" name="emplacement" value="{{ old('emplacement') }}" required>
        </div>

        <div class="mb-3">
            <label for="responsable_id" class="form-label">Responsable</label>
            <select class="form-control" id="responsable_id" name="responsable_id" required>
                <option value="">-- Sélectionner un responsable --</option>
                @foreach($responsables as $responsable)
                    <option value="{{ $responsable->id }}">{{ $responsable->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="etat" class="form-label">État</label>
            <select class="form-control" id="etat" name="etat" required>
                <option value="Disponible">Disponible</option>
                <option value="En Panne">En Panne</option>
                <option value="En Réparation">En Réparation</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('postes.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>