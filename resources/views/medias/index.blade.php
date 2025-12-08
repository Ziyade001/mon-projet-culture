@extends('layouts')
@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Medias</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Medias</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')

<div class="container-fluid">
    <!-- Header + bouton -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="card-title">Liste des medias</h3>
        <a href="{{ route('medias.create') }}" class="btn btn-primary">
            Nouveau
        </a>
    </div>

    <!-- Table -->
    <div class="card card-outline mb-4">
     <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>url</th>
                    <th>Titre</th>
                    <th>Type_media</th>
                    <th>Contenu_id</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($medias as $media)
                    <tr>
                        <td>{{ $media->url }}</td>
                        <td>{{ $media->titre }}</td>
                        <td>{{ $media->type->libelle ?? '-' }}</td>
                        <td>{{ $media->contenu->id ?? '-' }}</td>
                        

                    <td class="text-center">
                        <a href="{{ route('medias.show', $media->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('medias.edit', $media->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('medias.destroy', $media->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Supprimer cet élément ?')" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">Aucun media disponible.</td></tr>
                @endforelse
            </tbody>

        </table>
    </div>
 </div>
</div>
@endsection
