<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Show Business Detail | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <x-table.type.responsive title="Business Detail">

                <x-table.element.tbody>
                    <x-resources.business-application.show-business-data :data="$data" />
                    <x-resources.business-application.show-bank-data :data="$data" />
                    <x-table.element.tr>
                        <x-table.element.td colspan="2">
                            <div class="col-12 py-3">
                                <a href="{{ route('business.edit', $data['id']) }}"
                                    type="button" class="btn btn-primary">
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
