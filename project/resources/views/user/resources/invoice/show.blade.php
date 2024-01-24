<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Show Invoice Detail | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="container-fluid">

            <a href="{{ route('invoice.generate', [$data['id'], 'original']) }}" target="_blank" class="btn btn-primary">
                <i class="fa fa-download"> Original for Receipent</i>
            </a>
            <a href="{{ route('invoice.generate', [$data['id'], 'duplicate']) }}" target="_blank"
                class="btn btn-secondary">
                <i class="fa fa-download"> Duplicate for Supplier</i>
            </a>


            <x-table.type.responsive title="All Invoice Product" :add-url="route('invoice.create')">

                <x-table.element.thead>
                    <x-table.element.tr>
                        <x-table.element.th data="Name" />
                        <x-table.element.th data="HSN Code" />
                        <x-table.element.th data="Quantity" />
                        <x-table.element.th data="Sale Price" />
                        <x-table.element.th data="GST" />
                        <x-table.element.th data="Amount" />
                        <x-table.element.th data="Action" />
                    </x-table.element.tr>
                </x-table.element.thead>

                <x-table.element.tbody>
                    @forelse ($data['products'] as $i)
                        <x-table.element.tr>
                            <x-table.element.td>
                                <h6> {{ $i['name'] }} </h6>
                                {{ $i['description'] }}
                            </x-table.element.td>
                            <x-table.element.td :data="$i['hsn_code']" />
                            <x-table.element.td :data="$i['quantity']" />
                            <x-table.element.td>
                                {{ App\Helpers\Helper::customMoneyFormat($i['sale_price']) }}
                            </x-table.element.td>
                            <x-table.element.td>
                                {{ App\Helpers\Helper::customMoneyFormat($i['quantity'] * $i['sale_price'] * (0.01 * $i['gst_percentage'])) }}
                            </x-table.element.td>
                            <x-table.element.td>
                                {{ App\Helpers\Helper::customMoneyFormat($i['quantity'] * $i['sale_price'] * (1 + 0.01 * $i['gst_percentage'])) }}
                            </x-table.element.td>
                            <x-table.element.td>
                                <a href="{{ route('invoice_product.edit', $i['id']) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </x-table.element.td>
                        </x-table.element.tr>
                    @empty
                        <x-table.element.tr>
                            <x-table.element.td colspan="6" data="No Data Found" />
                        </x-table.element.tr>
                    @endforelse

                </x-table.element.tbody>

            </x-table.type.responsive>


            <x-table.type.responsive title="Invoice Detail">

                <x-table.element.tbody>
                    <x-resources.invoice.show-data :data="$data" />

                    <x-table.element.tr>
                        <x-table.element.td colspan="2">
                            <div class="col-12 py-3">
                                <a href="{{ route('invoice.edit', $data['id']) }}" type="button"
                                    class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                    <span class="btn-icon-end"> Edit Detail </span>
                                </a>
                            </div>
                        </x-table.element.td>
                    </x-table.element.tr>

                </x-table.element.tbody>

            </x-table.type.responsive>

        </div>
    </section>
</x-layout.user.app>
