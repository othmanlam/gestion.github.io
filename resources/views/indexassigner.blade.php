<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des Pannes</title>

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
    <h1 class="text-center mb-4"><i class="bi bi-tools"></i> Assignation des Techniciens</h1>

    @if(session('success'))
        <div class="alert alert-success"><i class="bi bi-check-circle"></i> {{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger"><i class="bi bi-x-circle"></i> {{ session('error') }}</div>
    @endif

    @if($pannes->isEmpty())
        <div class="alert alert-warning text-center">
            <i class="bi bi-info-circle"></i> Aucune demande de suivi à afficher.
        </div>
    @else
        <table class="table table-bordered table-dark table-hover">
            <thead>
                <tr class="text-center">
                    <th><i class="bi bi-upc"></i> Emplacement</th>
                    <th><i class="bi bi-laptop"></i> Modèle</th>
                    <th><i class="bi bi-exclamation-circle"></i> Type Panne</th>
                    <th><i class="bi bi-person"></i> Responsable</th>
                    <th><i class="bi bi-info-circle"></i> Statut</th>
                    <th><i class="bi bi-calendar"></i> Date</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pannes as $panne)
                    <tr class="text-center">
                        <td>{{ $panne->poste->emplacement }}</td>
                        <td>{{ $panne->poste->modele }}</td>
                        <td>{{ $panne->type_panne }}</td>
                        <td>{{ $panne->poste->responsable->nom }}</td>
                        <td>
                            <span class="badge {{ $panne->statut == 'Résolu' ? 'badge-success' : ($panne->statut == 'En cours' ? 'badge-warning' : 'badge-danger') }}">
                                {{ $panne->statut }}
                            </span>
                        </td>
                        <td>{{ $panne->date_signalement }}</td>
                        <td>
                            <a href="{{ route('assigner.technicians', $panne->id) }}" class="btn btn-warning mt-3">Assigner un Technicien</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
