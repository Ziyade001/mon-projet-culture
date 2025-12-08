@extends('layouts')
@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Roles</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')

<div class="container-fluid">
 
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="card-title">Liste des roles</h3>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">
            Nouveau
        </a>
    </div>
    <div class="card card-outline mb-4">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Code_role</th>
                    <th>Nom_role</th>
                    <th>Description</th>
                    <th width="120">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    
                    <td>{{ $role->code_role }}</td>
                    <td>{{ $role->nom_role }}</td>
                    <td>{{ $role->description }}</td>

                    <td class="text-center">
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
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

@endsection
