<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Edit Invoice Application | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="container-fluid">

            <x-form.type.standard title="Edit Invoice Application" action="{{ route('invoice.update', $data['id']) }}">
                @method('patch')
                <x-form.element.form-group title="Customer Detail">
                    <x-form.element.input1 name="customer_name" :value="$data['customer_name']" label="Name" required="required" />
                    <x-form.element.input1 name="customer_gstin" :value="$data['customer_gstin']" label="GSTIN" />
                    <x-form.element.input1 name="customer_phone" :value="$data['customer_phone']" label="Phone" />
                    <x-form.element.input1 name="customer_email" :value="$data['customer_email']" label="Email" />
                    <x-form.element.input1 name="customer_address" :value="$data['customer_address']" label="Address" />
                    <x-form.element.input1 name="customer_city" :value="$data['customer_city']" label="City" />
                    <x-form.element.input1 name="customer_pin" :value="$data['customer_pin']" label="Pin" />
                    <x-form.element.input1 name="customer_state_id" :value="$data['customer_state_id']" label="State" type="select" :options="$states" />
                </x-form.element.form-group>

                <x-form.element.form-group title="Business Detail">
                    <x-form.element.input1 name="business_name" :value="$data['business_name']" label="Name" required="required" />
                    <x-form.element.input1 name="business_gstin" :value="$data['business_gstin']" label="GSTIN" />
                    <x-form.element.input1 name="business_phone" :value="$data['business_phone']" label="Phone" />
                    <x-form.element.input1 name="business_email" :value="$data['business_email']" label="Email" />
                    <x-form.element.input1 name="business_address" :value="$data['business_address']" label="Address" />
                    <x-form.element.input1 name="business_city" :value="$data['business_city']" label="City" />
                    <x-form.element.input1 name="business_pin" :value="$data['business_pin']" label="Pin" />
                    <x-form.element.input1 name="business_state_id" :value="$data['business_state_id']" label="State" type="select" :options="$states" />
                </x-form.element.form-group>
                
            </x-form.type.standard>

        </div>
    </section>
</x-layout.user.app>
