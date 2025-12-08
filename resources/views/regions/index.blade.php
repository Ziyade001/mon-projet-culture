@extends('layouts')
@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Region</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Region</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')

<div class="container-fluid">
    <!-- Header + bouton -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="card-title">Liste des regions</h3>
        <a href="{{ route('regions.create') }}" class="btn btn-primary">
            Nouveau
        </a>
    </div>

    <!-- Table -->
    <div class="card card-outline mb-4">
     <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($regions as $region)
                <tr class="align-middle">
                    <td>{{ $region->code_region }}</td>
                    <td>{{ $region->nom_region }}</td>
                    <td>{{ $region->description }}</td>

                    <td class="text-center">
                        <a href="{{ route('regions.show', $region->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('regions.destroy', $region->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Supprimer cet élément ?')" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
 </div>
</div>
@endsection
