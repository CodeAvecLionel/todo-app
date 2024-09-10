@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Ajouter une nouvelle tâche</h2>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Ajouter</button>
        <a href="{{ route('todos.index') }}" class="btn btn-secondary mt-2">Retour</a>
    </form>
</div>
@endsection
