<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Pesan Layanan Laundry') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if(session('success')) <div class="mb-4 bg-green-100 text-green-700 p-4 rounded">{{ session('success') }}</div> @endif
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-bold mb-4">Data Pelanggan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="customer_name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp</label>
                            <input type="text" name="whatsapp_number" class="w-full border-gray-300 rounded-md shadow-sm" required placeholder="08xxxxxxxxxx">
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-bold mb-4">Pilih Layanan</h3>
                    @foreach($services as $category => $items)
                        <h4 class="font-bold text-gray-700 bg-gray-100 p-2 rounded mb-2">{{ $category }}</h4>
                        @foreach($items as $s)
                        <div class="flex justify-between items-center p-3 border-b">
                            <div>
                                <p class="font-bold">{{ $s->service_name }}</p>
                                <p class="text-sm text-gray-500">Rp {{ number_format($s->price_per_unit) }} / {{ $s->unit_type }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="hidden" name="service_id[]" value="{{ $s->id }}">
                                <input type="number" name="quantity[]" class="w-24 border-gray-300 rounded-md text-center" value="0" min="0">
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg shadow hover:bg-blue-700">Kirim Pesanan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
