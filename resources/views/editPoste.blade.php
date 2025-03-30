<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Poste</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #181818; color: #fff; }
        .container { max-width: 600px; }
        .card { background-color: #242424; color: #fff; padding: 20px; border-radius: 10px; }
        .btn-primary { background-color: #ff4500; border: none; }
        .btn-primary:hover { background-color: #e03e00; }
        .form-control, .form-select { background-color: #333; color: #fff; border: 1px solid #555; }
        .form-control:focus, .form-select:focus { background-color: #444; color: #fff; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">✏️ Modifier le Poste</h2>

    <div class="card shadow-lg">
        <form action="{{ route('postes.update', $poste->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Numéro de Série</label>
                <input type="text" name="numero_serie" class="form-control @error('numero_serie') is-invalid @enderror" value="{{ old('numero_serie', $poste->numero_serie) }}" required>
                @error('numero_serie')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Modèle</label>
                <input type="text" name="modele" class="form-control @error('modele') is-invalid @enderror" value="{{ old('modele', $poste->modele) }}" required>
                @error('modele')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Emplacement</label>
                <input type="text" name="emplacement" class="form-control @error('emplacement') is-invalid @enderror" value="{{ old('emplacement', $poste->emplacement) }}" required>
                @error('emplacement')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Responsable</label>
                <select name="responsable_id" class="form-select" required>
                    <option value="">Sélectionnez un responsable</option>
                    @foreach($responsables as $responsable)
                        <option value="{{ $responsable->id }}" {{ old('responsable_id', $poste->responsable_id) == $responsable->id ? 'selected' : '' }}>
                            {{ $responsable->nom }}
                        </option>
                    @endforeach
                </select>
                @error('responsable_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">État</label>
                <select name="etat" class="form-select @error('etat') is-invalid @enderror" required>
                    <option value="Disponible" {{ old('etat', $poste->etat) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="En Panne" {{ old('etat', $poste->etat) == 'En Panne' ? 'selected' : '' }}>En Panne</option>
                    <option value="En Réparation" {{ old('etat', $poste->etat) == 'En Réparation' ? 'selected' : '' }}>En Réparation</option>
                </select>
                @error('etat')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('postes.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
