<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> All Invoice | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            
            <x-table.type.datatable title="All Invoice" :add-url="route('invoice.create')">

                <x-table.element.thead>
                    <x-table.element.tr>
                        <x-table.element.th data="Date" />
                        <x-table.element.th data="Customer" />
                        <x-table.element.th data="Amount" />
                        <x-table.element.th data="Download" />
                        <x-table.element.th data="Action" />
                    </x-table.element.tr>
                </x-table.element.thead>

                <x-table.element.tbody>
                    @forelse ($data as $i)
                        <x-table.element.tr>
                            <x-table.element.td :data="$i['created_at']" />
                            <x-table.element.td :data="$i['customer_name']" />
                            <x-table.element.td :data="$i['customer_name']" />
                            <x-table.element.td>
                                <a href="{{ route('invoice.generate', $i['id']) }}" target="_blank"> Generate</a>
                            </x-table.element.td>
                            <x-table.element.td>
                                <a href="{{ route('invoice.show', $i['id']) }}">
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

            </x-table.type.datatable>
        </div>
    </section>
</x-layout.user.app>
