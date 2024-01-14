<div>

<div class="row">

    <div class="col-lg-6">
        <x-table.type.responsive title="Customer">
            <x-form.element.input1 name="customer" label="Select Customer" type='select' :options="$customers" wire:model.change="selectedCustomer" />
    
            <x-table.element.tbody>
                <x-table.element.tr>
                    <x-table.element.th data="Name" />
                    <x-table.element.td :data="$customer_detail['name'] ?? ''" />
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="GSTIN" />
                    <x-table.element.td :data="$customer_detail['gstin'] ?? ''" />
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="Email" />
                    <x-table.element.td :data="$customer_detail['email'] ?? ''" />
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="Phone" />
                    <x-table.element.td :data="$customer_detail['phone'] ?? ''" />
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="Address" />
                    <x-table.element.td :data="$customer_detail['address'] ?? ''" />
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="City" />
                    <x-table.element.td :data="$customer_detail['city'] ?? ''" />
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="Pin" />
                    <x-table.element.td :data="$customer_detail['pin'] ?? ''" />
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="State" />
                    <x-table.element.td :data="$customer_detail['state']->name ?? ''" />
                </x-table.element.tr>
            </x-table.element.tbody>
    
        </x-table.type.responsive>
    </div>
    
    <div class="col-lg-12">
        <x-form.type.standard title="Add Product">
            <x-form.element.form-group title="Product Detail">
                <x-form.element.input1 name="product" label="Select Product" wire:model.live="sku" />
                <x-form.element.input1 name="name" label="Title" required="required" wire:model="product.name" />
                <x-form.element.input1 name="description" label="Description" wire:model="product.description" />
                <x-form.element.input1 name="sale_price" label="Sale Price" type="number" required="required" wire:model="product.sale_price" />
                <x-form.element.input1 name="quantity" label="Quantity" required="required" wire:model="quantity" />
                <x-form.element.input1 name="gst_percentage" label="GST Percentage" required="required" wire:model="gstPercentage" />
            </x-form.element.form-group>
            <x-form.element.button1 title="Add Now" type="add" wire:click="addProduct" />
            
        </x-form.type.standard>
    </div>
    
</div>

    

    <x-table.type.responsive title="Added Product">

        <x-table.element.thead>
            <x-table.element.tr>
                {{-- <x-resources.invoice.index-th /> --}}
                <x-table.element.th data="Serial No." />
                <x-table.element.th data="Description" />
                <x-table.element.th data="Price" />
                <x-table.element.th data="Quantity" />
                <x-table.element.th data="Total" />
                <x-table.element.th data="Action" />
            </x-table.element.tr>
        </x-table.element.thead>

        <x-table.element.tbody>
            @php
                $total = 0;
            @endphp
            @forelse ($added_products as $key => $i)
                <x-table.element.tr>
                    {{-- <x-resources.invoice.index-td :data="$i" /> --}}
                    <x-table.element.td  data="{{ $key+1 }}" />
                    <x-table.element.td>
                        {{ $i['name'] }} <br>
                        {{ $i['description'] }} 
                    </x-table.element.td>
                    <x-table.element.td  data="{{ $i['sale_price'] }}" />
                    <x-table.element.td  data="{{ $i['quantity'] }}" />
                    <x-table.element.td  data="{{ $i['sale_price'] * $i['quantity'] }}" />
                    <x-table.element.td>
                        <span wire:click=removeProduct({{ $key }})>
                            <i class="fas fa-window-close"></i>
                        </span>
                    </x-table.element.td>
                </x-table.element.tr>
                @php
                    $total += $i['sale_price'] * $i['quantity'];
                @endphp
            @empty
                <x-table.element.tr>
                    <x-table.element.td colspan="6" data="No Data Found" />
                </x-table.element.tr>
            @endforelse
            <x-table.element.tr>
                <x-table.element.td colspan="4" data="Sub Total" />
                <x-table.element.td colspan="1" data="{{ $total }}" />
                <x-table.element.td colspan="1" data="" />
            </x-table.element.tr>
        </x-table.element.tbody>

    </x-table.type.responsive>

    
    <x-form.element.button1 title="Submit" type="submit" wire:click="submit" />

    
</div>