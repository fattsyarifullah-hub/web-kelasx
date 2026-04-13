<x-layout>
    <h1 class="h1-pengumuman">PENGUMUMAN</h1>
    <div>
        <div class="create-pengumuman">
            @auth
                <a href="{{ route('pengumuman.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#e3e3e3">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                    Tambah Pengumuman</a>
            @endauth
        </div>

        <ul>
            @foreach ($allPengumuman as $pengumuman)
                <li>
                    <h1>{{ $pengumuman->judul }}</h1>
                    <p>{{ $pengumuman->isi }}</p>
                </li>
                <a href="{{ route('pengumuman.show', $pengumuman->id) }}">Lihat pengumuman</a>
                @auth
                    <a href="{{ route('pengumuman.edit', $pengumuman->id) }}">Edit pengumuman</a>
                    <form action="{{ route('pengumuman.destroy', $pengumuman->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus pengumuman</button>
                    </form>
                @endauth
            @endforeach
        </ul>
    </div>
</x-layout>
