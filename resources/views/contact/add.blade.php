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
                        <!-- Nom -->
                        <div class="form-group" method="post" action="{{ route('contact.store') }}">
                          <label for="contactName">Nom du contact</label>
                          <input type="text" class="form-control" id="contactName" placeholder="Entrer le nom du contact" name="contactName">
                        </div>

                        <!-- Numéro de téléphone -->
                        <div class="form-group">
                          <label for="phoneNumber">Numéro de téléphone</label>
                          <input type="phone" class="form-control" id="phoneNumber" placeholder="Entrer le numéro de téléphone" name="phoneNumber">
                        </div>

                        <!-- Liste des groupes -->
                        <div class="form-group">
                          <label for="contactGroup">Choix du groupe de contact</label>
                          <select class="form-control" id="contactGroup" name="contactGroup">
                            @foreach ($groups as $group)
                                <option value=" {{ $group->id }}">{{$group->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
