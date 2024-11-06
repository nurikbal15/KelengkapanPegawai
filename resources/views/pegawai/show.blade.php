<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between mb-4">
                @role('admin')
                    <a href="{{ route('pegawai.index') }}" class="bg-gray-500 text-white font-semibold py-2 px-4 rounded hover:bg-gray-600">
                        {{ __('Kembali') }}
                    </a>
                @endrole
                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded hover:bg-yellow-600">
                    {{ __('Edit') }}
                </a>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">{{ __('Informasi Pegawai') }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
                        <div class="flex">
                            <strong class="w-32 text-gray-800">{{ __('NIP:') }}</strong>
                            <p class="text-gray-600">{{ $pegawai->nip }}</p>
                        </div>
                        <div class="flex">
                            <strong class="w-32 text-gray-800">{{ __('Nama:') }}</strong>
                            <p class="text-gray-600">{{ $pegawai->nama }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">{{ __('Dokumen') }}</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                            <div class="flex items-center">
                                <strong class="w-32 text-gray-800">{{ ucfirst(str_replace('_', ' ', $dokumen)) }}:</strong>
                                @if($pegawai->$dokumen)
                                    <a href="{{ asset('storage/' . $pegawai->$dokumen) }}" target="_blank" class="ml-2 text-blue-500 hover:underline">
                                        {{ __('Lihat') }}
                                    </a>
                                @else
                                    <span class="text-red-500 ml-2">{{ __('Tidak Tersedia') }}</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
