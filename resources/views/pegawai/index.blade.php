<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="flex justify-between items-center">
                <a href="{{ route('pegawai.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                    {{ __('Tambah Pegawai') }}
                </a>
                @if(session('success'))
                    <div class="text-green-700 bg-green-100 border border-green-300 rounded-md p-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">NIP</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                                @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                                    <th scope="col" class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">{{ ucfirst(str_replace('_', ' ', $dokumen)) }}</th>
                                @endforeach
                                <th scope="col" class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($pegawai as $data)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800">{{ $data->nip }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800">{{ $data->nama }}</td>
                                    @foreach(['sk_cpns', 'sk_pns', 'kk', 'akte', 'ktp', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_kuliah'] as $dokumen)
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-center">
                                            @if($data->$dokumen)
                                                <span class="text-green-500 font-bold">&#10003;</span> <!-- Tanda centang -->
                                            @else
                                                <span class="text-red-500 font-bold">&#10005;</span> <!-- Tanda silang -->
                                            @endif
                                        </td>
                                    @endforeach
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-center">
                                        <a href="{{ route('pegawai.show', $data->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">{{ __('Show') }}</a>
                                        <a href="{{ route('pegawai.downloadAll', $data->id) }}" class="text-green-600 hover:text-green-800 font-semibold ml-2">
                                            {{ __('Download Dokumen') }}
                                        </a>
                                        <form action="{{ route('pegawai.destroy', $data->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold ml-2" onclick="return confirm('Yakin ingin menghapus data ini?')">{{ __('Delete') }}</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
