<?php


///////////////////////////////////////////////////////////////////////////
//  Home                                                                 //
///////////////////////////////////////////////////////////////////////////


// Dashboard
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('app.general:dashboard'), action('HomeController@index'));
});

///////////////////////////////////////////////////////////////////////////
//  Accounts                                                             //
///////////////////////////////////////////////////////////////////////////

//  >  Accounts
Breadcrumbs::register('accounts', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('app.general:accounts'), action('AccountController@index'));
});

//  >  Accounts > New Account
Breadcrumbs::register('new-account', function ($breadcrumbs) {
    $breadcrumbs->parent('accounts');
    $breadcrumbs->push(trans('app.account:new'));
});

//  > Accounts > Offices
Breadcrumbs::register('account', function ($breadcrumbs, $account) {
    $breadcrumbs->parent('accounts');
    $breadcrumbs->push($account->name, action('AccountController@show', $account->id));
});

//  > Accounts > Edit
Breadcrumbs::register('edit-account', function ($breadcrumbs, $account) {
    $breadcrumbs->parent('account', $account);
    $breadcrumbs->push($account->name . " : " . trans('app.breadcrumb:edit'));
});

//  > Accounts > Offices > New Office

Breadcrumbs::register('new-office', function ($breadcrumbs, $account) {
    $breadcrumbs->parent('account', $account);
    $breadcrumbs->push(trans('app.office:create-title'));
});

//  > Accounts > Offices > Edit Office

Breadcrumbs::register('edit-office', function ($breadcrumbs, $account, $office) {
    $breadcrumbs->parent('account', $account);
    $breadcrumbs->push($office->name . " : " . trans('app.breadcrumb:edit'));
});

// > Accounts > Offices > New Contact

Breadcrumbs::register('add-contact-office', function ($breadcrumbs, $account, $office) {
    $breadcrumbs->parent('account', $account);
    $breadcrumbs->push($office->name . " : " . trans('app.contact:new'));
});


///////////////////////////////////////////////////////////////////////////
//  Leads                                                                //
///////////////////////////////////////////////////////////////////////////

//  >  Leads
Breadcrumbs::register('leads', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('app.general:leads'), action('LeadController@index'));
});

//  >  Leads > New Lead
Breadcrumbs::register('new-lead', function ($breadcrumbs) {
    $breadcrumbs->parent('leads');
    $breadcrumbs->push(trans('app.lead:new'));
});

//  > Leads > Offices
Breadcrumbs::register('lead', function ($breadcrumbs, $lead) {
    $breadcrumbs->parent('leads');
    $breadcrumbs->push($lead->name, action('LeadController@show', $lead->id));
});

//  > Leads > Edit
Breadcrumbs::register('edit-lead', function ($breadcrumbs, $lead) {
    $breadcrumbs->parent('lead', $lead);
    $breadcrumbs->push($lead->name . " : " . trans('app.breadcrumb:edit'));
});

//  > Leads > Offices > New Office

Breadcrumbs::register('new-lead-office', function ($breadcrumbs, $lead) {
    $breadcrumbs->parent('lead', $lead);
    $breadcrumbs->push(trans('app.office:create-title'));
});

//  > Leads > Offices > Edit Office

Breadcrumbs::register('edit-lead-office', function ($breadcrumbs, $lead, $office) {
    $breadcrumbs->parent('lead', $lead);
    $breadcrumbs->push($office->name . " : " . trans('app.breadcrumb:edit'));
});

// > Leads > Offices > New Contact

Breadcrumbs::register('add-contact-lead-office', function ($breadcrumbs, $account, $office) {
    $breadcrumbs->parent('lead', $account);
    $breadcrumbs->push($office->name . " : " . trans('app.contact:new'));
});

///////////////////////////////////////////////////////////////////////////
//  Contacts                                                             //
///////////////////////////////////////////////////////////////////////////

//  >  Contacts
Breadcrumbs::register('contacts', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('app.general:contacts'), action('ContactController@index'));
});

//  > Contacts > New
Breadcrumbs::register('new-contact', function ($breadcrumbs) {
    $breadcrumbs->parent('contacts');
    $breadcrumbs->push(trans('app.contact:new'));
});

//  > Contacts > Contact
Breadcrumbs::register('contact', function ($breadcrumbs, $contact) {
    $breadcrumbs->parent('contacts');
    $breadcrumbs->push($contact->firstname . " " . $contact->lastname, action('ContactController@show', $contact->id));
});

//  > Contacts > Contact > Edit
Breadcrumbs::register('edit-contact', function ($breadcrumbs, $contact) {
    $breadcrumbs->parent('contact', $contact);
    $breadcrumbs->push($contact->firstname . " " . $contact->lastname . " : " . trans('app.breadcrumb:edit'));
});

///////////////////////////////////////////////////////////////////////////
//  Quotes                                                               //
///////////////////////////////////////////////////////////////////////////

//  >  Quotes
Breadcrumbs::register('quotes', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('app.general:quotes'), action('QuoteController@index'));
});

//  > Quotes > New
Breadcrumbs::register('new-quote', function ($breadcrumbs) {
    $breadcrumbs->parent('quotes');
    $breadcrumbs->push(trans('app.quote:new'));
});

//  > Quotes > Quote
Breadcrumbs::register('quote', function ($breadcrumbs, $quote) {
    $breadcrumbs->parent('quotes');
    $breadcrumbs->push($quote->topic, action('QuoteController@show', $quote->id));
});

//  > Quotes > Quote > Edit
Breadcrumbs::register('edit-quote', function ($breadcrumbs, $quote) {
    $breadcrumbs->parent('quote', $quote);
    $breadcrumbs->push($quote->topic . " : " . trans('app.breadcrumb:edit'));
});

///////////////////////////////////////////////////////////////////////////
//  Receipts                                                             //
///////////////////////////////////////////////////////////////////////////

//  >  Receipts
Breadcrumbs::register('receipts', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('app.general:receipts'), action('ReceiptController@index'));
});


//  > Receipts > Receipt
Breadcrumbs::register('receipt', function ($breadcrumbs, $receipt) {
    $breadcrumbs->parent('receipts');
    $breadcrumbs->push($receipt->topic, action('ReceiptController@show', $receipt->id));
});

///////////////////////////////////////////////////////////////////////////
//  Invoices                                                             //
///////////////////////////////////////////////////////////////////////////

//  >  Invoices
Breadcrumbs::register('invoices', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('app.general:invoices'), action('InvoiceController@index'));
});

//  > Invoices > New
Breadcrumbs::register('new-invoice', function ($breadcrumbs) {
    $breadcrumbs->parent('invoices');
    $breadcrumbs->push(trans('app.invoice:new'));
});

//  > Invoices > Invoice
Breadcrumbs::register('invoice', function ($breadcrumbs, $invoice) {
    $breadcrumbs->parent('invoices');
    $breadcrumbs->push($invoice->topic, action('InvoiceController@show', $invoice->id));
});

//  > Invoices > Invoice > Edit
Breadcrumbs::register('edit-invoice', function ($breadcrumbs, $invoice) {
    $breadcrumbs->parent('invoice', $invoice);
    $breadcrumbs->push($invoice->topic . " : " . trans('app.breadcrumb:edit'));
});


///////////////////////////////////////////////////////////////////////////
//  Products                                                             //
///////////////////////////////////////////////////////////////////////////

//  >  Products
Breadcrumbs::register('products', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('app.general:products'), action('ProductController@index'));
});

//  > Products > New
Breadcrumbs::register('new-product', function ($breadcrumbs) {
    $breadcrumbs->parent('products');
    $breadcrumbs->push(trans('app.invoice:new'));
});

//  > Products > Product
Breadcrumbs::register('product', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('products');
    $breadcrumbs->push($product->name, action('ProductController@show', $product->id));
});

//  > Products > Product > Edit
Breadcrumbs::register('edit-product', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('product', $product);
    $breadcrumbs->push($product->name . " : " . trans('app.breadcrumb:edit'));
});

///////////////////////////////////////////////////////////////////////////
//  Services                                                             //
///////////////////////////////////////////////////////////////////////////

//  >  Services
Breadcrumbs::register('services', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('app.general:services'), action('ServiceController@index'));
});

//  > Services > New
Breadcrumbs::register('new-service', function ($breadcrumbs) {
    $breadcrumbs->parent('services');
    $breadcrumbs->push(trans('app.invoice:new'));
});

//  > Services > Service
Breadcrumbs::register('service', function ($breadcrumbs, $service) {
    $breadcrumbs->parent('services');
    $breadcrumbs->push($service->name, action('ServiceController@show', $service->id));
});

//  > Services > Service > Edit
Breadcrumbs::register('edit-service', function ($breadcrumbs, $service) {
    $breadcrumbs->parent('product', $service);
    $breadcrumbs->push($service->name . " : " . trans('app.breadcrumb:edit'));
});

///////////////////////////////////////////////////////////////////////////
//  Taxes                                                               //
///////////////////////////////////////////////////////////////////////////

//  >  Taxes
Breadcrumbs::register('taxes', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('app.general:taxes'), action('TaxController@index'));
});

//  > Taxes > New
Breadcrumbs::register('new-tax', function ($breadcrumbs) {
    $breadcrumbs->parent('taxes');
    $breadcrumbs->push(trans('app.tax:new'));
});

//  > Taxes > Tax
Breadcrumbs::register('tax', function ($breadcrumbs, $tax) {
    $breadcrumbs->parent('taxes');
    $breadcrumbs->push($tax->name, action('TaxController@show', $tax->id));
});

//  > Taxes > Tax > Edit
Breadcrumbs::register('edit-tax', function ($breadcrumbs, $tax) {
    $breadcrumbs->parent('tax', $tax);
    $breadcrumbs->push($tax->name . " : " . trans('app.breadcrumb:edit'));
});