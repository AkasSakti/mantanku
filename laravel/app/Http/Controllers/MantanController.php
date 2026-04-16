<?php

namespace App\Http\Controllers;

use App\Models\Mantan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MantanController extends Controller
{
    public function index(): View
    {
        $mantan = Mantan::orderByDesc('id_mantan')->paginate(10);

        return view('mantan.index', compact('mantan'));
    }

    public function create(): View
    {
        return view('mantan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'Nama_mantan' => ['required', 'string', 'max:100'],
            'Alamat' => ['required', 'string'],
            'No_Hp' => ['required', 'string', 'max:15'],
        ]);

        Mantan::create($validated);

        return redirect()
            ->route('mantan.index')
            ->with('success', 'Data mantan berhasil ditambahkan.');
    }

    public function edit(Mantan $mantan): View
    {
        return view('mantan.edit', compact('mantan'));
    }

    public function update(Request $request, Mantan $mantan): RedirectResponse
    {
        $validated = $request->validate([
            'Nama_mantan' => ['required', 'string', 'max:100'],
            'Alamat' => ['required', 'string'],
            'No_Hp' => ['required', 'string', 'max:15'],
        ]);

        $mantan->update($validated);

        return redirect()
            ->route('mantan.index')
            ->with('success', 'Data mantan berhasil diperbarui.');
    }

    public function destroy(Mantan $mantan): RedirectResponse
    {
        $mantan->delete();

        return redirect()
            ->route('mantan.index')
            ->with('success', 'Data mantan berhasil dihapus.');
    }
}
