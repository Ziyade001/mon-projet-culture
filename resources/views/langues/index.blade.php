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

    <!-- Header + bouton + recherche -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="card-title">Liste des langues</h3>

        <div class="d-flex gap-2">

            <!-- Barre de recherche -->
            <form action="{{ route('langues.index') }}" method="GET" class="d-flex">
                <input type="text"
                       name="search"
                       class="form-control me-2"
                       placeholder="Rechercher..."
                       value="{{ request('search') }}">

                <!-- Dropdown sélection -->
                    <select name="langue_id" class="form-control me-2">
                     <option value="">-- Select --</option>

                      <option value="fr" {{ request('langue_id') == 'fr' ? 'selected' : '' }}>
                         Français
                      </option>

                      <option value="en" {{ request('langue_id') == 'en' ? 'selected' : '' }}>
                         Anglais
                      </option>

                      <option value="fn" {{ request('langue_id') == 'fn' ? 'selected' : '' }}>
                        Fon
                      </option>

                      <option value="ng" {{ request('langue_id') == 'ng' ? 'selected' : '' }}>
                        Nago
                      </option>

                      <option value="gn" {{ request('langue_id') == 'gn' ? 'selected' : '' }}>
                        Goun
                      </option>
                    </select>


                <button class="btn btn-secondary">OK</button>
            </form>

            <!-- Bouton Nouveau -->
            <a href="{{ route('langues.create') }}" class="btn btn-primary">
                Nouveau
            </a>

        </div>
    </div>

    <!-- Table -->
    <div class="card card-outline mb-4">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($langues as $langue)
                        <tr class="align-middle">
                            <td>{{ $langue->code_langues }}</td>
                            <td>{{ $langue->nom_langues }}</td>
                            <td>{{ $langue->description }}</td>

                            <td class="text-center">
                                <a href="{{ route('langues.show', $langue->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{ route('langues.edit', $langue->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('langues.destroy', $langue->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Supprimer cet élément ?')" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Aucune langue trouvée</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-end mt-3">
                {{ $langues->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

</div>
@endsection
