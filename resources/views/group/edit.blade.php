@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter un groupe</div>

                <div class="card-body">
                    <form method="POST" >
                        @csrf
                        <!-- Nom du groupe -->
                        <div class="form-group" method="post" action="{{ route('group.update', ['id' => $group->id]) }}">
                          <label for="groupName">Nom du Groupe</label>
                          <input type="text" class="form-control" id="groupName" placeholder="Entrer le nom du groupe" name="groupName" value="{{(isset($group)) ? $group->name : ''}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <table class="table table-light table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Numéro</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contacts as $key => $contact)
              <tr>
                <th scope="row">{{ ($key + 1) }}</th>
                <td>{{ $contact->name }}</td>
                <td>0{{ $contact->phone_number }}</td>
                <td>Actions bientot</td>
              </tr>
            @endforeach
          </tbody>
      </table>
      </div>
    </div>
</div>
@endsection
