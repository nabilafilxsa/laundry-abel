<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Layanan') }}</h2></x-slot>
    <div class="py-12"><div class="max-w-3xl mx-auto sm:px-6 lg:px-8"><div class="bg-white shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4"><label class="block mb-1">Nama Layanan</label><input type="text" name="service_name" value="{{ $service->service_name }}" class="w-full border-gray-300 rounded-md" required></div>
            <div class="mb-4"><label class="block mb-1">Harga</label><input type="number" name="price_per_unit" value="{{ $service->price_per_unit }}" class="w-full border-gray-300 rounded-md" required></div>
            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-md">Update</button>
        </form>
    </div></div></div>
</x-app-layout>
