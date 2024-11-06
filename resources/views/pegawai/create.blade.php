<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <x-input-label for="nama" :value="__('Nama')" />
                    <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" required />
                </div>

                <div class="mb-3">
                    <x-input-label for="nip" :value="__('NIP')" />
                    <x-text-input id="nip" class="block mt-1 w-full" type="text" name="nip" required />
                </div>

                @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                    <div class="mb-3">
                        <x-input-label for="{{ $dokumen }}" :value="__(ucfirst(str_replace('_', ' ', $dokumen)))" />
                        <input type="file" id="{{ $dokumen }}" name="{{ $dokumen }}" class="block mt-1 w-full">
                    </div>
                @endforeach

                <x-primary-button class="mt-3">{{ __('Simpan') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
