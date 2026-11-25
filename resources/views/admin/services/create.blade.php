<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Layanan') }}</h2></x-slot>
    <div class="py-12"><div class="max-w-3xl mx-auto sm:px-6 lg:px-8"><div class="bg-white shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="mb-4"><label class="block mb-1">Nama Layanan</label><input type="text" name="service_name" class="w-full border-gray-300 rounded-md" required></div>
            <div class="mb-4"><label class="block mb-1">Kategori</label><select name="category" class="w-full border-gray-300 rounded-md"><option value="Kiloan">Kiloan</option><option value="Satuan">Satuan</option><option value="Express">Express</option></select></div>
            <div class="mb-4"><label class="block mb-1">Harga</label><input type="number" name="price_per_unit" class="w-full border-gray-300 rounded-md" required></div>
            <div class="mb-4"><label class="block mb-1">Satuan</label><select name="unit_type" class="w-full border-gray-300 rounded-md"><option value="Kg">Kg</option><option value="Pcs">Pcs</option></select></div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md">Simpan</button>
        </form>
    </div></div></div>
</x-app-layout>
