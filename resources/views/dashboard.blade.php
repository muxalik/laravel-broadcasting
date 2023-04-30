<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 100%;width: 56%;">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                        <div class="o sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <h2 class="mb-2 mt-0 text-2xl font-medium leading-tight text-primary">
                                        Orders
                                    </h2>
                                    <table class="min-w-full text-center text-sm font-light" id="orders">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">Id</th>
                                                <th scope="col" class="px-6 py-4">User</th>
                                                <th scope="col" class="px-6 py-4">Price</th>
                                                <th scope="col" class="px-6 py-4">Quantity</th>
                                                <th scope="col" class="px-6 py-4">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="orders-body">
                                            @forelse ($orders as $order)
                                                <tr
                                                    class="border-b border-primary-200 bg-primary-100 text-neutral-800 tr-anim">
                                                    <td class="whitespace-nowrap px-6 py-4">
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 100%;width: 42%;">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <h2 class="mb-2 mt-0 text-2xl font-medium leading-tight text-primary">
                                        Products
                                    </h2>
                                    <table class="min-w-full text-center text-sm font-light" id="products">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">Id</th>
                                                <th scope="col" class="px-6 py-4">Price</th>
                                                <th scope="col" class="px-6 py-4">Discount</th>
                                                <th scope="col" class="px-6 py-4">Quantity</th>
                                                <th scope="col" class="px-6 py-4">Bought</th>
                                            </tr>
                                        </thead>
                                        <tbody id="products-body">
                                            @forelse ($products as $product)
                                                <tr
                                                    class="border-b border-primary-200 bg-primary-100 text-neutral-800 tr-anim">
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $product->id }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ formatPrice(prettyPrice($product->calculatePrice())) . "$" }}
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
    <script type="module">
        function animateRow(tr) 
        {
            anime({
                targets: tr.getElementsByTagName('td'),
                opacity: [0, 1],
                scale: [2, 1],
                easing: 'easeInOutQuad',
                delay: function(el, i, l) {
                    return 100 + i * 100;
                },
                endDelay: function(el, i, l) {
                    return (l - i) * 100;
                },
            });
        }

        function animateCellIn(td) 
        {
            anime({
                targets: td,
                opacity: [1, 0],
                scale: [1, 1.5],
                easing: 'easeInQuad',
                duration: 400,
            });
        }

        function animateCellOut(td) 
        {
            anime({
                targets: td,
                opacity: [0, 1],
                scale: [1.5, 1],
                easing: 'easeOutQuad',
                duration: 400,
            });
        }

        function animateDelete(tr)
        {
            anime({
                targets: tr,
                scale: [1, 0],
                easing: 'easeInOutQuad',
                duration: 400,
            });
        }
                
        Echo.channel('products')
            .listen('.product.created', (e) => {
                let body = document.getElementById('products-body');
                let tr = document.createElement('tr');

                tr.classList.add('border-b', 'border-primary-200', 'bg-primary-100', 'text-neutral-800', 'tr-anim', 'tr-animating');
                tr.innerHTML = '<td class="whitespace-nowrap px-6 py-4">'
                    + +e.product.id + 
                    '</td>' + 
                    '<td class="whitespace-nowrap px-6 py-4">'
                        + e.product.price + '$' + 
                        '</td>' +
                    '<td class="whitespace-nowrap px-6 py-4">'
                        + e.product.discount + '%' +
                    '</td>' +
                    '<td class="whitespace-nowrap px-6 py-4">'
                        + e.product.quantity + 
                    '</td>' +
                    '<td class="whitespace-nowrap px-6 py-4">'
                        + e.product.times_bought +
                    '</td>';

                body.append(tr);

                animateRow(tr);

                setTimeout(() => {
                    tr.classList.remove('tr-animating');
                }, 500);
            }).listen('.product.bought', (e) => {
                let trs = document.getElementById('products-body').getElementsByTagName('tr');

                [...trs].every(tr => {
                    let children = [...tr.getElementsByTagName('td')];      

                    if (children[0].textContent == e.product.id) {
                        animateCellIn(children[children.length - 1]);
                        setTimeout(() => {
                            children[children.length - 1].textContent = e.product.times_bought;
                            animateCellOut(children[children.length - 1]);
                        }, 400);
                        

                        animateCellIn(children[children.length - 2]);
                        setTimeout(() => {
                            children[children.length - 2].textContent = e.product.quantity;
                            animateCellOut(children[children.length - 2]);
                        }, 400);

                        return false;
                    }

                    return true;
                });
            }).listen('.product.price.changed', (e) => {
                let trs = document.getElementById('products-body').getElementsByTagName('tr');

                [...trs].every(tr => {
                    let children = [...tr.getElementsByTagName('td')];      

                    if (children[0].textContent == e.product.id) {
                        animateCellIn(children[1]);
                        setTimeout(() => {
                            children[1].textContent = e.product.price + "$";
                            animateCellOut(children[1]);
                        }, 400);

                        animateCellIn(children[2]);
                        setTimeout(() => {
                            children[2].textContent = e.product.discount + "%";
                            animateCellOut(children[2]);
                        }, 400);

                        return false;
                    }

                    return true;
                });
            });

        Echo.channel('orders')
            .listen('.order.created', (e) => {
                let body = document.getElementById('orders-body');
                let tr = document.createElement('tr');

                tr.classList.add('border-b', 'border-primary-200', 'bg-primary-100', 'text-neutral-800', 'tr-anim', 'tr-animating');
                tr.innerHTML = `<td class="whitespace-nowrap px-6 py-4">
                        ` + e.order.id + `
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        ` + e.order.username + `
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        ` + e.order.price + `$
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        ` + e.order.quantity + `
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        ` + e.order.status + `
                    </td>`;

                body.append(tr);

                animateRow(tr);

                setTimeout(() => {
                    tr.classList.remove('tr-animating');
                }, 500);
            }).listen('.order.status.changed', (e) => {
                let trs = document.getElementById('orders-body').getElementsByTagName('tr');

                [...trs].every(tr => {
                    let children = [...tr.getElementsByTagName('td')];      

                    if (children[0].textContent == e.order.id) {
                        animateCellIn(children[children.length - 1]);
                        setTimeout(() => {
                            children[children.length - 1].textContent = e.order.status;
                            animateCellOut(children[children.length - 1]);
                        }, 400);

                        return false;
                    }

                    return true;
                });
            }).listen('.order.deleted', (e) => {
                let trs = document.getElementById('orders-body').getElementsByTagName('tr');

                [...trs].every(tr => {
                    let children = [...tr.getElementsByTagName('td')];      

                    if (children[0].textContent == e.id) {
                        animateDelete(tr);
                        setTimeout(() => {
                            tr.remove();
                        }, 400);

                        return false;
                    }

                    return true;
                });
            });

    </script>
</x-app-layout>
