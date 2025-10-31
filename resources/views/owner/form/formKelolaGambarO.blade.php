@extends('owner.layouts.app')

@section('title', 'Kelola Gambar: ' . $kos->nama_kos)

@section('content')

{{-- ASUMSI: $kos dan $gambarList sudah dikirimkan dari Controller --}}
@php use Illuminate\Support\Str; @endphp

<div class="p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Kelola Gambar Kos: {{ $kos->nama_kos }}</h2>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            {{ session('error') }}
        </div>
    @endif

    {{-- BAGIAN 1: FORM UPLOAD GAMBAR BARU --}}
    <div class="bg-white rounded-xl shadow p-6 mb-8">
        <h3 class="text-xl font-bold text-gray-700 mb-4 border-b pb-2">Unggah Gambar Baru</h3>

        {{-- ACTION: POST ke route store (tanpa parameter path) --}}
        <form method="POST" action="{{ route('owner.store_gambar') }}" enctype="multipart/form-data">
            @csrf

            {{-- HIDDEN INPUT PENTING: Mengirimkan ID Kos untuk verifikasi kepemilikan di Controller --}}
            <input type="hidden" name="id_kos" value="{{ $kos->id_kos }}">

            <div class="mb-4">
                <label for="gambar_baru" class="block font-semibold text-gray-700 mb-2">Pilih File Gambar (Max 2MB)</label>
                <input type="file" id="gambar_baru" name="gambar_baru" required
                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#8B70AC] file:text-white hover:file:bg-[#704E98] @error('gambar_baru') border-red-500 @enderror">
                @error('gambar_baru')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('owner.kelolaGambar') }}" class="bg-gray-500 text-white px-6 py-2 rounded-full font-semibold hover:bg-gray-600 transition">
                    ← Kembali
                </a>
                <button type="submit" class="bg-orange-400 text-white px-8 py-2 rounded-full font-semibold hover:bg-orange-500 transition">
                    Unggah Gambar
                </button>
            </div>
        </form>
    </div>

    {{-- BAGIAN 2: DAFTAR GAMBAR YANG SUDAH ADA --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-xl font-bold text-gray-700 mb-4 border-b pb-2">Gambar yang Sudah Diunggah (Total: {{ $gambarList->count() }})</h3>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse ($gambarList as $gambar)
                @if (!$gambar->id)
                    @continue
                @endif

                <div class="relative group">
                    <img src="{{ asset('storage/' . $gambar->url_gambar) }}"
                        alt="Foto Kos"
                        class="w-full h-32 object-cover rounded-lg shadow"
                        onerror="this.onerror=null;this.src='{{ asset('img/image_not_found.png') }}';">

                    {{-- Tombol Hapus Overlay --}}
                    <form action="{{ route('owner.destroy_gambar', $gambar->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gambar ini?');"
                        class="absolute top-1 right-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 p-1 rounded-full text-white hover:bg-red-700 transition">
                            <i class="fas fa-trash-alt text-sm"></i>
                        </button>
                    </form>

                    <p class="text-xs text-gray-500 mt-1 truncate">{{ Str::limit($gambar->url_gambar, 20) }}</p>
                </div>
            @empty
                <p class="col-span-4 text-gray-500 italic">Belum ada foto yang diunggah untuk kos ini.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection
