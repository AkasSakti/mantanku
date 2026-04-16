@extends('layouts.app')

@section('title', 'Tambah Mantan')

@section('content')
    <div class="header">
        <div>
            <h1>Tambah Data Mantan</h1>
            <p>Masukkan data baru ke tabel <strong>mantan</strong>.</p>
        </div>
    </div>

    <div class="card">
        <form action="{{ route('mantan.store') }}" method="POST">
            @csrf
            @php($submitLabel = 'Simpan')
            @include('mantan._form')
        </form>
    </div>
@endsection
