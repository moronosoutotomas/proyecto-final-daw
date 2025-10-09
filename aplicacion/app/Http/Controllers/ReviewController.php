<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Almacena una nueva reseña en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'nullable|string|max:1000',
        ]);

        $validated['user_id'] = auth()->id();

        Review::create($validated);

        return redirect()->back()->with('success', 'Reseña publicada correctamente.');
    }

    /**
     * Elimina una reseña de la base de datos.
     */
    public function destroy(Review $review)
    {
        // Verificar que el usuario sea el propietario de la reseña
        if ($review->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar esta reseña.');
        }

        $review->delete();

        return redirect()->back()->with('success', 'Reseña eliminada correctamente.');
    }
}
