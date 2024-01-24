<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Edit Invoice Product | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="container-fluid">

            <x-form.type.standard title="Edit Invoice Product" action="{{ route('invoice_product.update', $data['id']) }}">
                @method('patch')
                <x-form.element.form-group title="Invoice Detail">
                    <x-form.element.input1 name="name" :value="$data['name']" label="Product Name" required="required" />
                    <x-form.element.input1 name="description" :value="$data['description']" label="Description" />
                    <x-form.element.input1 name="hsn_code" :value="$data['hsn_code']" type="number" label="HSN Code" required="required" />
                    <x-form.element.input1 name="sale_price" :value="$data['sale_price']" type="number" label="Sale Price" required="required" />
                    <x-form.element.input1 name="quantity" :value="$data['quantity']" label="Quantity" required="required" />
                    <x-form.element.input1 name="gst_percentage" :value="$data['gst_percentage']" label="GST Percentage" required="required" />
                </x-form.element.form-group>
                
            </x-form.type.standard>

        </div>
    </section>
</x-layout.user.app>
