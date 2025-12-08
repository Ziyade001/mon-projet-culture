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

    <!-- Header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Créer une langue</h3>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('langues.store') }}">
        @csrf

        <div class="card-body">

            <div class="mb-3">
                <label for="code" class="form-label">Code de la langue</label>
                <input
                    type="text"
                    class="form-control"
                    id="code"
                    name="code_langues"
                    placeholder="Ex : FR, EN, ESP..."
                    required
                >
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nom de la langue</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="nom_langues"
                    placeholder="Ex : Français, Anglais..."
                    required
                >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    rows="3"
                    placeholder="Description optionnelle..."
                ></textarea>
            </div>

        </div>

        <!-- Footer buttons -->
        <div class="card-footer">

            <a href="{{ route('langues.index') }}" class="btn btn-danger float-end">
                Retour
            </a>

            <button type="submit" class="btn btn-primary">
                Enregistrer
            </button>

        </div>

    </form>
 </div>
</div>
@endsection
