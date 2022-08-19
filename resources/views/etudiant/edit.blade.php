<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modifier un etudiant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Modifier un etudiant</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('etudiant.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('etudiant.update',$etudiant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom de l'etudiant:</strong>
                        <input type="text" name="nom" value="{{ $etudiant->nom }}" class="form-control"
                            placeholder="Nom de l'etudiant">
                        @error('nom')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prenom de l'etudiant:</strong>
                        <input type="text" name="prenom" class="form-control" placeholder="Prenom de l'etudiant"
                            value="{{ $etudiant->prenom }}">
                        @error('prenom')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Adresse de l'etudiant:</strong>
                        <input type="text" name="addresse" value="{{ $etudiant->addresse }}" class="form-control"
                            placeholder="Addresse de l'etudiant">
                        @error('addresse')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Modifier</button>
            </div>
        </form>
    </div>
</body>

</html>