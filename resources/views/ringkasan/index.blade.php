<x-layout>
    <div class="summary-wrapper">
        <div class="summary-header">
            <h1>Ringkasan Kelas</h1>
            <p>Semua informasi penting siswa, jadwal pelajaran, jadwal piket, dan pengumuman dalam satu tampilan.</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card card active-border">
                <h3>Total Siswa</h3>
                <strong>{{ $totalSiswa }}</strong>
                <p><a href="{{ route('siswa.index') }}"></a></p>
            </div>
            <div class="stat-card card active-border">
                <h3>Pengumuman</h3>
                <strong>{{ $totalPengumuman }}</strong>
                <p><a href="{{ route('pengumuman.index') }}"></a></p>
            </div>
            <div class="stat-card card active-border">
                <h3>Foto Piket Aktif</h3>
                <strong>{{ $activePiket }}</strong>
                <p><a href="{{ route('piket.index') }}"></a></p>
            </div>
            <div class="stat-card card active-border">
                <h3>Jadwal Tambahan</h3>
                <strong>Soft Skill</strong>
            </div>
        </div>

        <div class="ringkasan-grid">
            <section class="summary-card card">
                <div class="section-header">
                    <h3>Pengumuman Terbaru</h3>
                    <a href="{{ route('pengumuman.index') }}">Lihat semua</a>
                </div>
                @forelse ($pengumuman as $item)
                    <article class="announcement-item">
                        <div>
                            <h4>{{ $item->judul }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit($item->isi, 120) }}</p>
                        </div>
                        <span class="date-badge">{{ optional($item->created_at)->format('d M Y') }}</span>
                    </article>
                @empty
                    <p>Tidak ada pengumuman terbaru.</p>
                @endforelse
            </section>

            <section class="summary-card card">
                <div class="section-header">
                    <h3>Bukti Foto Piket</h3>
                    <a href="{{ route('piket.index') }}">Lihat lengkap</a>
                </div>
                @if ($photo->isNotEmpty())
                    <img class="summary-photo" src="{{ asset('storage/photo/' . $photo->first()->photo) }}" alt="Foto bukti piket" loading="lazy">
                    <p>Foto bukti piket.</p>
                @else
                    <p>Belum ada bukti foto piket yang diunggah.</p>
                @endif
            </section>

            <section class="summary-card card">
                <div class="section-header">
                    <h3>Nama Orang-Orang Piket</h3>
                    <a href="{{ route('piket.index') }}">Lihat lengkap</a>
                </div>
                <div class="announcement-item" style="flex-direction: column; gap: 8px; padding: 0; border-left: 0;">
                    @foreach ($piketNames as $name)
                        <span style="display: block; padding: 10px 14px; background: #f8fafc; border-radius: 10px;">{{ $name }}</span>
                    @endforeach
                </div>
            </section>

            <section class="summary-card card">
                <div class="section-header">
                    <h3>Jadwal Tambahan</h3>
                    <a href="/jadwal">Lihat lengkap</a>
                </div>
                <div class="schedule-preview">
                    @foreach ($schedulePreview as $item)
                        <div class="schedule-preview-row">
                            <span>{{ $item['time'] }}</span>
                            <span>{{ $item['title'] }}</span>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-layout>
