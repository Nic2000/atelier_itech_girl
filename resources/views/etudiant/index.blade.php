<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des etudiants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Liste des etudiants</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('etudiant.create') }}"> Ajouter nouveau etudiant</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th> Nom </th>
                    <th> Prenom </th>
                    <th> Adresse </th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etudiant as $etu)
                    <tr>
                        <td>{{ $etu->id }}</td>
                        <td>{{ $etu->nom }}</td>
                        <td>{{ $etu->prenom }}</td>
                        <td>{{ $etu->addresse }}</td>
                        <td>
                            <form action="{{ route('etudiant.destroy',$etu->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('etudiant.edit',$etu->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>