@extends('owner.layouts.app')

@section('title', 'Atur Fasilitas: ' . $kos->nama_kos)

@section('content')

<div class="p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Atur Fasilitas Kos: {{ $kos->nama_kos }}</h2>

    {{-- Form ini akan menggunakan route UPDATE KOS, Anda perlu menambahkan logika khusus di OwnerKosController@update --}}
    <form method="POST" action="{{ route('owner.update_fasilitas', $kos->id_kos) }}">        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                Pastikan semua input sudah benar.
            </div>
        @endif

        {{-- BAGIAN HARGA SEWA DIHAPUS SESUAI PERMINTAAN --}}

        {{-- BAGIAN CHECKBOX FASILITAS --}}
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-700 mb-4 border-b pb-2">Pilih Fasilitas Kos yang Tersedia</h3>

            {{-- INPUT TERSEMBUNYI untuk memberi tahu Controller bahwa ini HANYA update fasilitas --}}
            {{-- <input type="hidden" name="update_only" value="fasilitas"> --}}

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @forelse ($fasilitasMaster as $f)
                    <div class="flex items-center">
                        @php
                            // Cek apakah fasilitas ini sudah terpilih
                            $isChecked = in_array($f->id_fasilitas, old('fasilitas_ids', $kos->fasilitas_terpilih ?? []));
                        @endphp
                        <input
                            type="checkbox"
                            name="fasilitas_ids[]"
                            value="{{ $f->id_fasilitas }}"
                            id="fasilitas_{{ $f->id_fasilitas }}"
                            class="w-4 h-4 text-[#704E98] bg-gray-100 border-gray-300 rounded focus:ring-[#704E98]"
                            {{ $isChecked ? 'checked' : '' }}>
                        <label for="fasilitas_{{ $f->id_fasilitas }}" class="ml-2 text-sm font-medium text-gray-700">
                            {{ $f->nama_fasilitas }}
                        </label>
                    </div>
                @empty
                    <p class="text-gray-500 italic col-span-4">Belum ada fasilitas yang dibuat oleh Admin.</p>
                @endforelse
            </div>
            @error('fasilitas_ids')<p class="text-xs text-red-500 mt-1 text-red-500">Pilih setidaknya satu fasilitas.</p>@enderror
        </div>

        {{-- Tombol Submit --}}
        <div class="flex justify-between mt-6">
            <a href="{{ route('owner.kelolaFasilitas') }}" class="bg-gray-500 text-white px-8 py-2 rounded-full font-semibold hover:bg-gray-600 transition">
                ← Kembali ke Daftar Kos Fasilitas
            </a>
            <button type="submit" class="bg-orange-400 text-white px-8 py-2 rounded-full font-semibold hover:bg-orange-500 transition">
                Simpan Fasilitas
            </button>
        </div>
    </form>
</div>
@endsection
