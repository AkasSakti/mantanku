<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mantan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MantanApiController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'Data mantan berhasil diambil.',
            'data' => Mantan::orderByDesc('id_mantan')->get(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'Nama_mantan' => ['required', 'string', 'max:100'],
            'Alamat' => ['required', 'string'],
            'No_Hp' => ['required', 'string', 'max:15'],
        ]);

        $mantan = Mantan::create($validated);

        return response()->json([
            'message' => 'Data mantan berhasil ditambahkan.',
            'data' => $mantan,
        ], 201);
    }

    public function show(Mantan $mantan): JsonResponse
    {
        return response()->json([
            'message' => 'Detail mantan berhasil diambil.',
            'data' => $mantan,
        ]);
    }

    public function update(Request $request, Mantan $mantan): JsonResponse
    {
        $validated = $request->validate([
            'Nama_mantan' => ['required', 'string', 'max:100'],
            'Alamat' => ['required', 'string'],
            'No_Hp' => ['required', 'string', 'max:15'],
        ]);

        $mantan->update($validated);

        return response()->json([
            'message' => 'Data mantan berhasil diperbarui.',
            'data' => $mantan->fresh(),
        ]);
    }

    public function destroy(Mantan $mantan): JsonResponse
    {
        $mantan->delete();

        return response()->json([
            'message' => 'Data mantan berhasil dihapus.',
        ]);
    }
}
