<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function download()
    {
        $invoice = (object) [
            'id' => 1001,
            'date' => date('d/m/Y'),
            'items' => collect([
                (object) [
                    'product' => 'Beras Premium 5 Kg',
                    'price' => 75000,
                    'quantity' => 1,
                    'total' => 75000,
                ],
                (object) [
                    'product' => 'Minyak Goreng',
                    'price' => 25000,
                    'quantity' => 1,
                    'total' => 25000,
                ],
                (object) [
                    'product' => 'Gula Pasir',
                    'price' => 10000,
                    'quantity' => 1,
                    'total' => 10000,
                ],
            ]),
            'total' => 110000,
        ];

        $pdf = Pdf::loadView(
            'invoices.invoice',
            ['invoice' => $invoice]
        );

        return $pdf->download(
            'invoice_' . $invoice->id . '.pdf'
        );
    }
}
