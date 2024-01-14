<x-layout.sidebar.li1 name="Home" href="{{ route('dashboard') }}" icon="fas fa-tv" />
<x-layout.sidebar.li1 name="Business Detail" href="{{ route('business.show', 1) }}" icon="fa fa-city" />
<x-layout.sidebar.li2 name="Customer" icon="fas fa-user">
    <x-layout.sidebar.li21 name="All Customer" href="{{ route('customer.index') }}" />
    <x-layout.sidebar.li21 name="Create Customer" href="{{ route('customer.create') }}" />
</x-layout.sidebar.li2>
<x-layout.sidebar.li2 name="Product" icon="fab fa-product-hunt">
    <x-layout.sidebar.li21 name="All Product" href="{{ route('product.index') }}" />
    <x-layout.sidebar.li21 name="Create Product" href="{{ route('product.create') }}" />
</x-layout.sidebar.li2>
<x-layout.sidebar.li2 name="Invoice" icon="fas fa-shopping-cart">
    <x-layout.sidebar.li21 name="All Invoice" href="{{ route('invoice.index') }}" />
    <x-layout.sidebar.li21 name="Create Invoice" href="{{ route('invoice.create') }}" />
</x-layout.sidebar.li2>
