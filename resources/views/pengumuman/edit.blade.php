<x-layout>
<div class="edit_and_create_container">
    <div class="universal_card">
        <div class="universal_header">
            <h3 style="margin-bottom: 20px;"><i class="fas fa-bullhorn" style="color: var(--primary-red);"></i> Pengumuman Kelas</h3>
            <p>Perbarui informasi pengumuman kelas di sini</p>
        </div>
        <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data" class="universal_form">
            @csrf
            @method('PUT')
            <div class="form_group">
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" placeholder="Masukkan judul pengumuman" value="{{ old('judul', $pengumuman->judul) }}" required>
            </div>
            <div class="form_group">
                <label for="isi">Isi:</label>
                <textarea id="isi" name="isi" placeholder="Masukkan isi pengumuman" required>{{ old('isi', $pengumuman->isi) }}</textarea>
            </div>
            <button type="submit" class="btn_login">Update Pengumuman</button>
        </form>
    </div>
</div>
</x-layout>
