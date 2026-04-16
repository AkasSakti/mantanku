@extends('layouts.app')

@section('title', 'Edit Mantan')

@section('content')
    <div class="header">
        <div>
            <h1>Edit Data Mantan</h1>
            <p>Perbarui data mantan dengan ID <strong>{{ $mantan->id_mantan }}</strong>.</p>
        </div>
    </div>

    <div class="card">
        <form action="{{ route('mantan.update', $mantan) }}" method="POST">
            @csrf
            @method('PUT')
            @php($submitLabel = 'Update')
            @include('mantan._form')
        </form>
    </div>
@endsection
