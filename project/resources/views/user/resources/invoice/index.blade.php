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
                        <x-resources.invoice.index-th />
                    </x-table.element.tr>
                </x-table.element.thead>

                <x-table.element.tbody>
                    @forelse ($data as $i)
                        <x-table.element.tr>
                            <x-resources.invoice.index-td :data="$i" />

                            
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
