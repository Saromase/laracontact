@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="card-deck">
        <!-- Affiche les contacts sous formes de carte -->
        @foreach ($contacts as $contact)
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://images.pexels.com/photos/67636/rose-blue-flower-rose-blooms-67636.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $contact->name }}</h5>
              <p class="card-text">0{{ $contact->phone_number }}</p>
              <a href=" {{ route('contact.edit', ['id' => $contact->id]) }}" class="btn btn-primary">Edit</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
</div>
@endsection
