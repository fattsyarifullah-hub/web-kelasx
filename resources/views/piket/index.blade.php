<x-layout>
@auth
    <a href="{{ route('piket.create') }}">create sini</a>
@endauth
<div class="card" style="padding: 0; overflow: hidden;">
    <table style="width: 100%; border-collapse: collapse;">
        <thead style="background: #f1f5f9;">
            <tr>
                <th style="padding: 15px; text-align: left;">HARI</th>
                <th style="padding: 15px; text-align: left;">PETUGAS</th>
            </tr>
        </thead>
        <tbody>
            <tr style="border-top: 1px solid #eee;">
                <td style="padding: 15px; color: var(--primary-red); font-weight: bold;">Senin</td>
                <td style="padding: 15px;">
                    <ul>
                        <li>Abbiyadsjach Nobel Fibrayir</li>
                        <li>Abian Pranata</li>
                        <li>Ahmad Asmalul Faiz </li>
                        <li>Bariq Ainul Fikri</li>
                        <li>Algo Athallah Hayatuna</li>
                        <li>Alifandra Moamar Farizy</li>
                        <li>Ahmad Muzakki</li>
                    </ul>
                </td>
            </tr>
            <tr style="border-top: 1px solid #eee;">
                <td style="padding: 15px; color: var(--primary-yellow); font-weight: bold;">Selasa</td>
                <td style="padding: 15px;">
                    <ul>
                        <li>Bintang Arya</li>
                        <li>Daffa Khoiri</li>
                        <li>Daffa Rifqi</li>
                        <li>Micko Putra Tanabi</li>
                        <li>Damar Kholis</li>
                        <li>Fadhil Dafiamsyah</li>
                        <li>Qeeiro Abiyasa</li>
                    </ul>
                </td>
            </tr>
            <tr style="border-top: 1px solid #eee;">
                <td style="padding: 15px; color: var(--primary-green); font-weight: bold;">Rabu</td>
                <td style="padding: 15px;">
                    <ul>
                        <li>Kafi Fathillia Rahman</li>
                        <li>Ikhwan Al Ghifari</li>
                        <li>Ida Widia</li>
                        <li>Haidhir Hikal</li>
                        <li>Gustaf Aufa Al Husein</li>
                        <li>Fathan Syarifullah</li>
                        <li>Alicia Aisha Amini</li>
                    </ul>
                </td>
            </tr>
            <tr style="border-top: 1px solid #eee;">
                <td style="padding: 15px; color: var(--primary-blue); font-weight: bold;">Kamis</td>
                <td style="padding: 15px;">
                    <ul>
                        <li>Kaliza Rafliani</li>
                        <li>Khaira Nurvia</li>
                        <li>Kevin Mahardika Kumaeni</li>
                        <li>Lintang Pannatan</li>
                        <li>Lionel Keffas</li>
                        <li>Mahesa Rafka Kanigara</li>
                        <li>Marwan Mehdivika Sasmita</li>
                    </ul>
                </td>
            </tr>
            <tr style="border-top: 1px solid #eee;">
                <td style="padding: 15px; color: var(--primary-brown); font-weight: bold;">Jumat</td>
                <td style="padding: 15px;">
                    <ul>
                        <li>M. Galih Almustafid</li>
                        <li>M. Gianluigi Cannavaro</li>
                        <li>M. Haikal Wijaya</li>
                        <li>M. Aldrich Putra Yuda</li>
                        <li>M. Azka Raissa</li>
                        <li>M. Bayu Alfariza</li>
                        <li>M. Dhirgam Irhab Jamaludin</li>
                        <li>Patrick Nicholas Lemmuel</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div>
    @if ($photo)
        <img src="{{ asset('storage/photo/' . $photo->photo) }}" alt="poto piket" loading="lazy">
    @else
        <p>tidak ada foto</p>
    @endif
</div>
</x-layout>