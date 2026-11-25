<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard Admin') }}</h2>
            <div class="flex gap-2">
                <a href="{{ route('admin.services.index') }}" class="bg-gray-800 text-white px-4 py-2 rounded-md text-sm">Kelola Layanan</a>
                <form action="{{ route('logout') }}" method="POST">@csrf<button class="bg-red-600 text-white px-4 py-2 rounded-md text-sm">Logout</button></form>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <!-- Form Filter -->
                <form action="{{ route('dashboard') }}" method="GET" class="mb-4 flex gap-2">
                    <select name="status" onchange="this.form.submit()" class="border p-2 rounded text-sm">
                        <option value="">-- Semua Status --</option>
                        <option value="Antrean" {{ request('status') == 'Antrean' ? 'selected' : '' }}>Antrean</option>
                        <option value="Dicuci" {{ request('status') == 'Dicuci' ? 'selected' : '' }}>Dicuci</option>
                        <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </form>

                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr><th class="p-4 border-b">Pelanggan</th><th class="p-4 border-b">Total</th><th class="p-4 border-b">Status</th></tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="p-4 border-b"><div class="font-bold">{{ $order->customer_name }}</div><div class="text-sm text-gray-500">{{ $order->whatsapp_number }}</div></td>
                            <td class="p-4 border-b font-bold text-green-600">Rp {{ number_format($order->total_price) }}</td>
                            <td class="p-4 border-b">
                                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="text-sm rounded font-bold border p-1">
                                        <option value="Antrean" {{ $order->status == 'Antrean' ? 'selected' : '' }}>Antrean</option>
                                        <option value="Dicuci" {{ $order->status == 'Dicuci' ? 'selected' : '' }}>Dicuci</option>
                                        <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
