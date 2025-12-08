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
        <div class="card-title"><h3>Modifier une langue</h3></div>
    </div>

    <form method="POST" action="{{ route('langues.update', $langue->id) }}">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input
                    type="text"
                    class="form-control"
                    id="code"
                    name="code_langues"
                    value="{{ $langue->code_langues }}"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="nom_langues"
                    value="{{ $langue->nom_langues }}"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input
                    type="text"
                    class="form-control"
                    id="description"
                    name="description"
                    value="{{ $langue->description }}"
                />
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Enregistrer</button>

            <a href="{{ route('langues.index') }}" class="btn btn-danger float-end">
                Annuler
            </a>
        </div>

    </form>

 </div>
</div>
@endsection
