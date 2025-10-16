@extends('admin.layouts.app')

@section('title', isset($user) ? 'Edit Akun Login' : 'Tambah Akun Login')

@section('content')

<div class="flex justify-center mt-6">
    <div class="w-full md:w-2/3 lg:w-1/2 bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-left">{{ isset($user) ? 'Edit Akun' : 'Tambah Akun Login' }} User</h2>

        <form method="POST" action="{{ isset($user) ? route('admin.update_user', $user->id) : route('admin.store_user') }}">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif

            <div class="mb-6">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Jenis Akun (Role)</label>
                <select id="role" name="role" required
                        class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('role') border-red-500 @enderror">
                    @php $currentRole = old('role', $user->role ?? ''); @endphp
                    <option value="pemilik" {{ $currentRole == 'pemilik' ? 'selected' : '' }}>Pemilik Kos</option>
                    <option value="admin" {{ $currentRole == 'admin' ? 'selected' : '' }}>Admin Kelurahan</option>
                </select>
                @error('role')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6" id="pemilik_select_group">
                <label for="id_pemilik" class="block text-sm font-medium text-gray-700 mb-2">Hubungkan ke Pemilik</label>
                <select id="id_pemilik" name="id_pemilik"
                        class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('id_pemilik') border-red-500 @enderror">
                    <option value="">-- Pilih Pemilik yang Belum Punya Akun --</option>

                    {{-- LOOP BERGANTI MENGGUNAKAN $pemilikTersedia --}}
                    @php $currentPemilikId = old('id_pemilik', $user->id_pemilik ?? $idPemilikAwal ?? ''); @endphp

                    @foreach ($pemilikTersedia as $pemilik)
                        <option value="{{ $pemilik->id_pemilik }}"
                            {{ (int)$currentPemilikId === (int)$pemilik->id_pemilik ? 'selected' : '' }}>

                            {{ $pemilik->nama_pemilik }} (ID: {{ $pemilik->id_pemilik }})

                            {{-- Tambahkan label jika ini pemilik yang sedang diedit --}}
                            @if(isset($user) && $user->id_pemilik === $pemilik->id_pemilik)
                                (Pemilik Saat Ini)
                            @endif
                        </option>
                    @endforeach
                    {{-- END LOOP --}}
                </select>
                @error('id_pemilik')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if(isset($user))
            <div class="mb-6">
                <label for="status_akun" class="block text-sm font-medium text-gray-700 mb-2">Status Akun</label>
                <select id="status_akun" name="status_akun" required
                        class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('status_akun') border-red-500 @enderror">
                    @php $currentStatus = old('status_akun', $user->status_akun ?? ''); @endphp
                    <option value="active" {{ $currentStatus == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ $currentStatus == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status_akun')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            @endif

            <hr class="my-6">

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Login</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email ?? '') }}"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('email') border-red-500 @enderror"
                    placeholder="Masukkan Email (digunakan untuk login)">
                @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi {{ isset($user) ? '(Kosongkan jika tidak ingin diubah)' : '' }}</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('password') border-red-500 @enderror"
                    placeholder="Masukkan Kata Sandi minimal 6 karakter">
                @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-between items-center">
                <a href="{{ route('admin.kelola_user') }}"
                    class="bg-gray-500 text-white px-6 py-2 rounded-full hover:bg-gray-600 transition">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <button type="submit"
                    class="bg-[#704E98] text-white px-6 py-2 rounded-full hover:bg-[#5b3f7a] transition">
                    {{ isset($user) ? 'Perbarui Akun' : 'Buat Akun Login' }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role');
        const pemilikGroup = document.getElementById('pemilik_select_group');

        function togglePemilikSelect() {
            if (roleSelect.value === 'pemilik') {
                pemilikGroup.style.display = 'block';
            } else {
                pemilikGroup.style.display = 'none';
                // Note: Agar logika store tetap aman, kita tidak mereset nilai disini
                // jika sedang mode edit, hanya menyembunyikan tampilan.
            }
        }

        roleSelect.addEventListener('change', togglePemilikSelect);
        togglePemilikSelect();
    });
</script>

@endsection
