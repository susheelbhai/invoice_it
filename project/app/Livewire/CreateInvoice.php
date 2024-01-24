<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Helpers\Helper;
use App\Models\Invoice;
use App\Models\Product;
use Livewire\Component;
use App\Models\Business;
use App\Models\Customer;
use App\Models\InvoiceProduct;
use Illuminate\Support\Facades\Session;

class CreateInvoice extends Component
{
    public $sku;
    public $added_products = [];
    public $product =[];
    public $products;
    public $customers;
    public $selectedCustomer;
    public $customer_detail;
    public $business_detail;
    public $quantity = 1;
    public $gstPercentage = 18;
    public $user_session;

    function mount() {
        $this->customers = Customer::all();
        $this->products = Product::all();
        $this->business_detail = Business::find(1)->first();
        $this->user_session = \Illuminate\Support\Facades\Session::get('user');
    }

    public function updatedSku($a)
    {
        $this->sku = $a;
        $product = Product::where('id', $a)->first();
        $this->product['name'] = $product['name'] ?? '';
        $this->product['description'] = $product['description'] ?? '';
        $this->product['sale_price'] = $product['sale_price'] ?? '';
        $this->product['gst_percentage'] = $product['gst_percentage'] ?? '';
        $this->product['hsn_code'] = $product['hsn_code'] ?? '';
        Session::put('user',$this->user_session);
    }
    public function updatedSelectedCustomer($a)
    {
        $this->customer_detail = Customer::find($a);
        Session::put('user',$this->user_session);
    }

    public function render()
    {
        return view('livewire.create-invoice');
    }

    public function addProduct(){
         $new = [
            'name' => $this->product['name'],
            'description' => $this->product['description'],
            'sale_price' => $this->product['sale_price'],
            'hsn_code' => $this->product['hsn_code'],
            'quantity' => $this->quantity,
            'gst_percentage' => $this->gstPercentage,
        ];

        array_push($this->added_products, $new);
        Session::put('user',$this->user_session);
    }

    public function removeProduct($key){
        array_splice($this->added_products, $key, 1);
        Session::put('user',$this->user_session);
    }

    public function submit(){
        $date = Carbon::now();
        // dd($this->business_detail['state']['gst_state_short_name']);
        $invoice = Invoice::create(
            [
                'business_id' => 1,
                
                'invoice_date' => Carbon::now(),
                'customer_id' => $this->customer_detail['id'],
                'customer_gstin' => $this->customer_detail['gstin'],
                'customer_name' => $this->customer_detail['name'],
                'customer_email' => $this->customer_detail['email'],
                'customer_phone' => $this->customer_detail['phone'],
                'customer_address' => $this->customer_detail['address'],
                'customer_city' => $this->customer_detail['city'],
                'customer_pin' => $this->customer_detail['pin'],
                'customer_state_id' => $this->customer_detail['state_id'],
                'business_cin' => $this->business_detail['registration_number'],
                'business_gstin' => $this->business_detail['gstin'],
                'business_name' => $this->business_detail['name'],
                'business_email' => $this->business_detail['email'],
                'business_phone' => $this->business_detail['phone'],
                'business_address' => $this->business_detail['address'],
                'business_city' => $this->business_detail['city'],
                'business_pin' => $this->business_detail['pin'],
                'business_state_id' => $this->business_detail['state_id'],
                'bank_name' => $this->business_detail['bank_name'],
                'bank_account_number' => $this->business_detail['bank_account_number'],
                'bank_account_holder_name' => $this->business_detail['bank_account_holder_name'],
                'bank_ifsc' => $this->business_detail['bank_ifsc'],
                'bank_swift' => $this->business_detail['bank_swift'],
            ]
        );
        foreach ($this->added_products as $key => $value) {
            InvoiceProduct::create(
                [
                    'invoice_id'=> $invoice->id,
                    'name'=> $value['name'],
                    'hsn_code'=> $value['hsn_code'],
                    'description'=> $value['description'],
                    'sale_price'=> $value['sale_price'],
                    'quantity'=> $value['quantity'],
                    'gst_percentage'=> $value['gst_percentage'],
                ]
            );
        }
        $invoice['state_code'] = $this->business_detail['state']['gst_state_short_name'];
        Invoice::find($invoice->id)->update(['invoice_number' => Helper::invoiceNumber($invoice)]);
        return redirect()->route('invoice.index');
    }
}
