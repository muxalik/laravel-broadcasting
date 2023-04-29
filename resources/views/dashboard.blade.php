<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-around">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <h2 class="mb-2 mt-0 text-2xl font-medium leading-tight text-primary">
                                        Orders
                                    </h2>
                                    <table class="min-w-full text-center text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">Id</th>
                                                <th scope="col" class="px-6 py-4">User</th>
                                                <th scope="col" class="px-6 py-4">Price</th>
                                                <th scope="col" class="px-6 py-4">Quantity</th>
                                                <th scope="col" class="px-6 py-4">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr class="border-b border-primary-200 bg-primary-100 text-neutral-800">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                        {{ $order->id }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $order->user->name }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ formatPrice($order->getPrice()) . "$" }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $order->getQuantity() }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $order->status }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>It's empty...</p>
                                            @endforelse
                                            {{-- <tr
                                                class="border-b border-neutral-100 bg-neutral-50 text-neutral-800 dark:bg-neutral-50">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                    Light
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">Cell</td>
                                                <td class="whitespace-nowrap px-6 py-4">Cell</td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <h2 class="mb-2 mt-0 text-2xl font-medium leading-tight text-primary">
                                        Products
                                    </h2>
                                    <table class="min-w-full text-center text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">Id</th>
                                                <th scope="col" class="px-6 py-4">Price</th>
                                                <th scope="col" class="px-6 py-4">Discount</th>
                                                <th scope="col" class="px-6 py-4">Quantity</th>
                                                <th scope="col" class="px-6 py-4">Times bought</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr class="border-b border-primary-200 bg-primary-100 text-neutral-800">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                        {{ $product->id }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ formatPrice($product->price) . "$" }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $product->discount . '%' }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $product->quantity }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $product->times_bought }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>It's empty...</p>
                                            @endforelse
                                            {{-- <tr
                                                class="border-b border-neutral-100 bg-neutral-50 text-neutral-800 dark:bg-neutral-50">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                    Light
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">Cell</td>
                                                <td class="whitespace-nowrap px-6 py-4">Cell</td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
