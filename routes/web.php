<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('invoices.pdf_invoice');
});
