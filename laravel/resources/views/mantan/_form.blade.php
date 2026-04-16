@if ($errors->any())
    <div class="error-list">
        <strong>Validasi gagal:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="Nama_mantan">Nama Mantan</label>
<input type="text" id="Nama_mantan" name="Nama_mantan" value="{{ old('Nama_mantan', $mantan->Nama_mantan ?? '') }}" required maxlength="100">

<label for="Alamat">Alamat</label>
<textarea id="Alamat" name="Alamat" required>{{ old('Alamat', $mantan->Alamat ?? '') }}</textarea>

<label for="No_Hp">No HP</label>
<input type="text" id="No_Hp" name="No_Hp" value="{{ old('No_Hp', $mantan->No_Hp ?? '') }}" required maxlength="15">

<div class="actions">
    <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
    <a href="{{ route('mantan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
