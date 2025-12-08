@extends('layouts')
@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Commentaires</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Commentaires</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')

<div class="container-fluid">
    <!-- Header + bouton -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="card-title">Liste des commentaires</h3>
        <a href="{{ route('commentaires.create') }}" class="btn btn-primary">
            Nouveau
        </a>
    </div>

 <div class="card card-outline mb-4">
     <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Auteur</th>
                    <th>Message</th>
                    <th>Type_contenu</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($commentaires as $commentaire)
                    <tr>
                        <td>{{ $commentaire->auteur }}</td>
                        <td>{{ Str::limit($commentaire->message, 40) }}</td>
                        <td>{{ $commentaire->type->libelle ?? '-' }}</td>
                        

                        <td class="text-center">

                            <a href="{{ route('commentaires.show', $commentaire) }}" class="text-info mx-1">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('commentaires.edit', $commentaire) }}" class="text-warning mx-1">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('commentaires.destroy', $commentaire) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link text-danger p-0 mx-1"
                                    onclick="return confirm('Supprimer ce contenu ?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">Aucun commentaire disponible.</td></tr>
                @endforelse
            </tbody>

        </table>
    </div>
 </div>  
</div>

@endsection
