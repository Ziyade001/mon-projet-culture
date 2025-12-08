@extends('layouts')
@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Langues</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Langues</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="container-fluid">
 <div class="card card-outline mb-4">
    <div class="card-header">
        <div class="card-title"><h3>Détails de la langue</h3></div>
    </div>

    <div class="card-body">

        <p><strong>Code :</strong> {{ $langue->code_langues }}</p>
        <p><strong>Nom :</strong> {{ $langue->nom_langues }}</p>
        <p><strong>Description :</strong> {{ $langue->description }}</p>

    </div>

    <div class="card-footer">

        <a href="{{ route('langues.edit', $langue->id) }}" class="btn btn-warning">
            Modifier
        </a>

        <a href="{{ route('langues.index') }}" class="btn btn-secondary float-end">
            Retour
        </a>

    </div>

 </div>

</div>

@endsection
