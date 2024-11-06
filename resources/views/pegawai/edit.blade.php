<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md overflow-hidden sm:rounded-lg p-6">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Field -->
                <div class="mb-6">
                    <x-input-label for="nama" :value="__('Nama')" class="text-gray-700 font-semibold"/>
                    <x-text-input id="nama" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        type="text" name="nama" value="{{ old('nama', $pegawai->nama) }}" required />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>

                <!-- Dokumen Fields -->
                <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Dokumen') }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                        <div>
                            <x-input-label for="{{ $dokumen }}" :value="__(ucfirst(str_replace('_', ' ', $dokumen)))" class="text-gray-700 font-semibold"/>
                            <input type="file" id="{{ $dokumen }}" name="{{ $dokumen }}" class="block mt-2 w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none">
                            @if($pegawai->$dokumen)
                                <p class="mt-1 text-sm text-gray-600">
                                    <span>{{ __('File saat ini:') }}</span>
                                    <a href="{{ asset('storage/' . $pegawai->$dokumen) }}" target="_blank" class="text-blue-500 hover:underline ml-1">{{ __('Lihat') }}</a>
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <x-primary-button class="w-full sm:w-auto">{{ __('Update') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
