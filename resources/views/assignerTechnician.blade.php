<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignation d'un Technicien</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body { background-color: #181818; color: #fff; }
        .container { background-color: #222; padding: 20px; border-radius: 10px; }
        .table { background-color: #242424; color: #fff; }
        .table-hover tbody tr:hover { background-color: #333 !important; }
        .badge-success { background-color: #28a745; }
        .badge-danger { background-color: #dc3545; }
        .badge-warning { background-color: #ffc107; color: #000; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4"><i class="bi bi-person-check"></i> Assigner un Technicien à la Panne</h1>

    @if(session('success'))
        <div class="alert alert-success"><i class="bi bi-check-circle"></i> {{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger"><i class="bi bi-x-circle"></i> {{ session('error') }}</div>
    @endif

    <h4 class="text-center mb-4">Panne : {{ $panne->type_panne }} ({{ $panne->poste->emplacement }})</h4>

    @if($techniciens->isEmpty())
        <div class="alert alert-warning text-center">
            <i class="bi bi-info-circle"></i> Aucun technicien disponible.
        </div>
    @else
    <form method="POST" action="{{ route('assigner.store') }}">
    @csrf
    <input type="hidden" name="panne_id" value="{{ $panne->id }}">

    

    <table class="table table-bordered table-dark table-hover">
        <thead>
            <tr class="text-center">
                <th><i class="bi bi-person"></i> Nom</th>
                <th><i class="bi bi-star"></i> Spécialité</th>
                <th><i class="bi bi-person-workspace"></i> Charge de travail</th>
                <th><i class="bi bi-check-circle"></i> Disponibilité</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($techniciens as $technicien)
                <tr class="text-center">
                    <td>{{ $technicien->utilisateur ? $technicien->utilisateur->nom : 'Nom non disponible' }}</td>
                    <td>{{ $technicien->specialite }}</td>
                    <td>{{ $technicien->interventions_count }} interventions</td>
                    <td>
                        @if($technicien->utilisateur)
                            <span class="badge {{ $technicien->utilisateur->disponible == 1 ? 'badge-success' : 'badge-danger' }}">
                                {{ $technicien->utilisateur->disponible == 1 ? 'Disponible' : 'Non Disponible' }}
                            </span>
                        @else
                            <span class="badge badge-warning">Information manquante</span>
                        @endif
                    </td>
                    
                    <td>
                        <button type="submit" name="technicien_id" value="{{ $technicien->id }}" class="btn btn-danger">Assigner</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>

    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
