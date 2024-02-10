<?php

namespace App\Http\Controllers;

use App\Models\invoice_details;
use App\Models\invoices;
use Illuminate\Http\Request;

class InvoiceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(invoice_details $invoice_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoices = invoices::where('id', $id)->first();
        $details = invoice_details::where('id_Invoice', $id)->get();
        return view('invoices.invoice_details', compact('invoices' , 'details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoice_details $invoice_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(invoice_details $invoice_details)
    {
        //
    }
}
