<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Order;

class InvoiceController extends Controller
{
    public function create()
    {
        return view('invoice.create');
    }

    public function store(CreateInvoiceRequest $request)
    {
        $order = Order::where('user_id', $request->user()->id)->firstOrFail();
        $total = $order->total;
        $billing_information = $request->get('billing_information');

        $pdf = \PDF::loadView('invoice.show', compact('order', 'billing_information', 'total'));

        return $pdf->download('getting-git-invoice-' . $order->id . '.pdf');
    }
}
