<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Afficher toutes les tâches
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('todos.create');
    }

    // Stocker une nouvelle tâche
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => false,
        ]);

        return redirect()->route('todos.index')->with('success', 'Tâche ajoutée avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    // Mettre à jour une tâche
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('todos.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Supprimer une tâche
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
