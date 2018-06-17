@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter un contact</div>

                <div class="card-body">
                    <form method="POST" >
                        @csrf
                        <!-- Nom du groupe -->
                        <div class="form-group" method="post" action="{{ route('group.store') }}">
                          <label for="groupName">Nom du contact</label>
                          <input type="text" class="form-control" id="groupName" placeholder="Entrer le nom du groupe" name="groupName">
                        </div>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
