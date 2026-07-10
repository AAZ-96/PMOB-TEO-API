<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

/**
 * REST API CRUD untuk entitas Task.
 * Diakses oleh aplikasi Flutter melalui HTTP (Minggu 13: Akses Data / REST API).
 */
class TaskController extends Controller
{
    // GET /api/tasks
    public function index()
    {
        return response()->json(Task::orderBy('deadline')->get());
    }

    // POST /api/tasks
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'mata_kuliah' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'selesai' => 'boolean',
        ]);

        $task = Task::create($validated);
        return response()->json($task, 201);
    }

    // GET /api/tasks/{id}
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    // PUT /api/tasks/{id}
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'mata_kuliah' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'selesai' => 'boolean',
        ]);

        $task->update($validated);
        return response()->json($task);
    }

    // DELETE /api/tasks/{id}
    public function destroy(string $id)
    {
        Task::findOrFail($id)->delete();
        return response()->json(['message' => 'Task berhasil dihapus']);
    }
}
