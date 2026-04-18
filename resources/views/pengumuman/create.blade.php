<x-layout>
<div class="edit_and_create_container">
    <div class="universal_card">
        <div class="universal_header">
            <h3 style="margin-bottom: 20px;"><i class="fas fa-bullhorn" style="color: var(--primary-red);"></i> Pengumuman Kelas</h3>
            <p>Tambahkan informasi pengumuman kelas di sini</p>
        </div>
        <form action="{{ route('pengumuman.store') }}" method="POST" class="universal_form" class="universal_form">
            @csrf
            <div class="form_group">
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" placeholder="Masukkan judul pengumuman" required>
            </div>
            <div class="form_group">
                <label for="isi">Isi:</label>
                <textarea id="isi" name="isi" placeholder="Masukkan isi pengumuman" required></textarea>
            </div>
            <button type="submit" class="btn_login">Simpan Pengumuman</button>
        </form>
    </div>
</div>
</x-layout>
