<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Daftar Layanan') }}</h2>
            <div class="flex gap-2">
                <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded text-sm">Kembali</a>
                <a href="{{ route('admin.services.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">+ Tambah</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if(session('success')) <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">{{ session('success') }}</div> @endif
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100"><tr><th class="p-4 border-b">Nama</th><th class="p-4 border-b">Kategori</th><th class="p-4 border-b">Harga</th><th class="p-4 border-b text-center">Aksi</th></tr></thead>
                    <tbody>
                        @foreach($services as $s)
                        <tr>
                            <td class="p-4 border-b font-bold">{{ $s->service_name }}</td>
                            <td class="p-4 border-b">{{ $s->category }}</td>
                            <td class="p-4 border-b">Rp {{ number_format($s->price_per_unit) }}</td>
                            <td class="p-4 border-b text-center">
                                <a href="{{ route('admin.services.edit', $s->id) }}" class="text-blue-600 mr-2">Edit</a>
                                <form action="{{ route('admin.services.destroy', $s->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="text-red-600">Hapus</button></form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
