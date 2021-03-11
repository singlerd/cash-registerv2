<?php

namespace App\Http\Controllers;

use App\Models\CurrentState;
use App\Models\Drink;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceController extends Controller
{
    public function show()
    {

        $drinks = Drink::all();
        foreach ($drinks as $drink) {
            $customer = new Buyer([
                'name' => $drink->name,
                'custom_fields' => [
                    'email' => 'test@example.com',
                ],
            ]);


            $item = (new InvoiceItem())->title($drink->name)->pricePerUnit(2);

            $today = date('YmdHi');
            $startDate = date('YmdHi', strtotime('-10 days'));
            $range = $today - $startDate;
            $rand = rand(0, $range);
            $randSerialNumber = "Flash" . $rand;

            $invoice = Invoice::make()
                ->buyer($customer)
                ->dateFormat("d/m/Y")
                ->addItem($item)
                ->name('Obračun')
                ->serialNumberFormat($randSerialNumber)
                ->logo(public_path('storage/drinks/flash-royal.jpg'));

            return $invoice->stream();

        }

    }
}
