@extends('admin.layouts.app')

@section('title', 'Pusat Notifikasi')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow-md">

        {{-- HEADER --}}
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Pusat Notifikasi</h2>

            {{-- Tombol Tandai Semua --}}
            @if($notifikasi->where('is_read', false)->count() > 0)
            <form action="{{ route('admin.notifikasi.mark_all_read') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-full transition">
                    <i class="fas fa-check-double mr-1"></i> Tandai semua telah dibaca
                </button>
            </form>
            @endif
        </div>

        {{-- DAFTAR NOTIFIKASI --}}
        <div class="space-y-4">
            @forelse ($notifikasi as $item)
                @php
                    // Logika untuk menampilkan pesan yang lebih ramah
                    $modelName = class_basename($item->model_type); // Misal: 'Kos'
                    $userEmail = $item->user->email ?? 'Sistem';
                    $actionText = '';
                    $icon = 'fa-info-circle';
                    $color = 'text-gray-500';

                    switch ($item->action) {
                        case 'created':
                            $actionText = 'dibuat';
                            $icon = 'fa-plus-circle';
                            $color = 'text-green-500';
                            break;
                        case 'updated':
                            $actionText = 'diperbarui';
                            $icon = 'fa-pencil-alt';
                            $color = 'text-blue-500';
                            break;
                        case 'deleted':
                            $actionText = 'dihapus';
                            $icon = 'fa-trash-alt';
                            $color = 'text-red-500';
                            break;
                    }
                @endphp

                <div class="flex items-start p-4 rounded-lg transition {{ $item->is_read ? 'bg-gray-50' : 'bg-blue-50 border border-blue-200' }}">

                    {{-- Icon --}}
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center {{ $color }} bg-opacity-10">
                        <i class="fas {{ $icon }} fa-lg"></i>
                    </div>

                    {{-- Konten Teks --}}
                    <div class="ml-4 flex-grow">
                        <p class="text-sm {{ $item->is_read ? 'text-gray-600' : 'text-gray-900 font-semibold' }}">
                            Data <span class="font-bold">{{ $modelName }}</span> (ID: {{ $item->model_id }}) telah {{ $actionText }}
                            oleh <span class="font-bold">{{ $userEmail }}</span>.
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>

                    {{-- Tanda Belum Dibaca --}}
                    @if (!$item->is_read)
                    <div class="ml-4 flex-shrink-0">
                        <span class="w-3 h-3 bg-blue-500 rounded-full block" title="Belum dibaca"></span>
                    </div>
                    @endif
                </div>

            @empty
                <div class="text-center text-gray-500 p-10">
                    <i class="fas fa-bell-slash fa-3x mb-4"></i>
                    <p>Tidak ada notifikasi untuk Anda.</p>
                </div>
            @endforelse
        </div>

        {{-- Paginasi --}}
        <div class="mt-6">
            {{ $notifikasi->links() }}
        </div>

    </div>
</div>
@endsection
