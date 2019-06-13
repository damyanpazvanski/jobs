<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Candidates</title>

    <link rel="stylesheet" href="css/app.css">

    <style>
        .card-header {
            background: #26c6da!important;
            color: #ffffff!important;
        }
        input, select {
            height: 15px!important;
        }
        body {
            background: #ffffff!important;
        }
        h1 {
            margin: 0!important;
            padding: 0!important;
            font-size: 23px!important;
        }
        .card-header {
            background: #26c6da!important;
            color: #ffffff!important;
        }
        .bold {
            font-weight: 700!important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card alert p-0">
            <div class="row card-header mr-0 ml-0">
                <table class="table">
                    <thead>
                    <tr class="bold">
                        <th scope="col"><h1>{{ config('app.name') }}</h1></th>
                        <th scope="col" class="text-right"><h1>INVOICE</h1></th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="card-body">
                <div class="col-md-12 mt-5">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Bill To: {{ $user->first_name }} {{ $user->last_name }}</th>
                            <th scope="col">Paid To: Innocative Future Ltd.</th>
                            <th scope="col" class="text-right">Invoice Id: {{ $invoice->id }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Email: {{ $user->email }}</td>
                            <td>Email: support@cleverhires.com</td>
                            <th scope="col" class="text-right">Invoice Id: 2</th>
                        </tr>
                        <tr>
                            <td>Address: {{ $company->address }}</td>
                            <td>Address: Petko D. Petkov Str. 38</td>
                            <td class="text-right">Invoice Date: {{ $invoice->subscriptionDetails->billingPeriodStartDate->format('m/d/Y') }}</td>
                        </tr>
                        <tr>
                            <td>{{ $company->city }}, {{ optional($company->country)->name }}</td>
                            <td>City: Plovdiv, Bulgaria</td>
                            <td class="text-right">Subscription End Date: {{ $invoice->subscriptionDetails->billingPeriodEndDate->format('m/d/Y') }}</td>
                        </tr>
                        <tr>
                            <td>Company: {{ $company->name }}</td>
                            <td>Registration number: 205235680</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>VAT ID/TAX ID: BG205235680</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Phone: (+359)89-458-7337</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12 mt-5 mb-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>{{ $plan->name }}</td>
                            <td class="text-right">{{ $invoice->subtotal() }}</td>
                        </tr>
                        <tr class="text-right">
                            <td colspan="2" style="border: 1px solid #ffffff!important; border-right: 1px solid #ddd!important">Subtotal:</td>
                            <td colspan="1" style="border: 1px solid #ddd!important">{{ $invoice->subtotal() }}</td>
                        </tr>
                        <tr class="text-right">
                            <td colspan="2" style="border: 1px solid #ffffff!important; border-right: 1px solid #ddd!important">Tax:</td>
                            <td colspan="1" style="border: 1px solid #ddd!important">$0.00</td>
                        </tr>
                        <tr class="text-right">
                            <td colspan="2" style="border: 1px solid #ffffff!important; border-right: 1px solid #ddd!important">Discount:</td>
                            <td colspan="1" style="border: 1px solid #ddd!important">{{ $invoice->discount() }}</td>
                        </tr>
                        <tr class="text-right">
                            <td colspan="2" style="border: 1px solid #ffffff!important; border-right: 1px solid #ddd!important; font-weight: 700!important;">Total:</td>
                            <td colspan="1" style="border: 1px solid #ddd!important; font-weight: 700!important;">{{ $invoice->total() }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
