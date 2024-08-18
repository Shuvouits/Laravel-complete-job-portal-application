<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy('id', 'DESC')->with('company')->paginate(20);
        return view('admin.order.index', compact('orders'));
    }

    function show(string $id) {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    function invoice(string $id) {
        $order = Order::findOrFail($id);

        $customer = new Buyer([
            'name'          => 'Jhon Doe',
            'custom_fields' => [
                'email' => $order->company->email,

            ],
        ]);

        $item = InvoiceItem::make('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()

            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();


    }


}
