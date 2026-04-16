@extends('layouts.app')

@section('title', 'Daftar Mantan')

@section('content')
    <div class="header">
        <div>
            <h1>Data Mantan</h1>
            <p>CRUD Laravel 11 untuk database <strong>data_mantan</strong>.</p>
        </div>
        <a href="{{ route('mantan.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card">
        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mantan as $item)
                    <tr>
                        <td>{{ $item->id_mantan }}</td>
                        <td>{{ $item->Nama_mantan }}</td>
                        <td>{{ $item->Alamat }}</td>
                        <td>{{ $item->No_Hp }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('mantan.edit', $item) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('mantan.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada data mantan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            {{ $mantan->links() }}
        </div>
    </div>
@endsection
