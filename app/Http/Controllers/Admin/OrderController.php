<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use App\Traits\Searchable;

class OrderController extends Controller
{

    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:order index']);
    }

    
    public function index(){

        $query = Order::query();
        $query->with(['company', 'plan']);
        $this->search($query, ['package_name', 'transaction_id', 'order_id', 'payment_provider', 'payment_status']);
        $orders = $query->orderBy('id', 'DESC')->paginate(20);

        return view('admin.order.index', compact('orders'));
    }

    function show(string $id) {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }


    public function invoice(string $id) {
        $order = Order::findOrFail($id);

        $customer = new Buyer([
            'name'          => $order->company->name,
            'custom_fields' => [
                'email' => $order->company->email,
                'transaction' => $order->transaction_id,
                'payment method' => $order->payment_provider,
            ],
        ]);

        $seller = new Party([
            'name'          => config('settings.site_name'),
            'phone'         => config('settings.site_phone'),
            'custom_fields' => [
                'email' => config('settings.site_email')
            ],
        ]);

        $item = InvoiceItem::make($order->package_name.' Plan')->pricePerUnit($order->amount);

        $invoice = Invoice::make()
            ->series($order->order_id)
            ->currencyCode($order->paid_in_currency)
            ->currencySymbol($order->paid_in_currency)
            ->buyer($customer)
            ->seller($seller)
            ->status('paid')
            ->payUntilDays(0)
            ->addItem($item);

        return $invoice->download();
    }


}
