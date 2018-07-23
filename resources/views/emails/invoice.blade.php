@extends('layouts.noMenuApp')
<style>
    .card-header {
        background: #26c6da!important;
        color: #ffffff!important;
    }
</style>
@section('content')
    <div class="container">
        <div class="card alert p-0">
            <div class="row card-header mr-0 ml-0">
                <div class="col-md-6 text-left"><h2 class="mt-0 mb-0 pt-1 pb-0"><strong>Pazvany Corporation</strong></h2></div>
                <div class="col-md-6 text-right"><h1 class="mt-0 mb-0 pt-0 pb-0"><strong>INVOICE</strong></h1></div>
            </div>
            <div class="card-body">
                <div class="col-md-12 mt-5">
                    <div class="col-md-5">
                        Bill To: John Doe
                    </div>
                    <div class="col-md-7">
                        <div class="col-md-9 text-right">Invoice Number:</div>
                        <div class="col-md-3 text-right">rn63zxew</div>
                    </div>
                </div>
                <div class="col-md-12 mt-1">
                    <div class="col-md-7 col-md-offset-5">
                        <div class="col-md-9 text-right">Invoice Date:</div>
                        <div class="col-md-3 text-right">07/19/2018</div>
                    </div>
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
                            <td>Lorem..</td>
                            <td class="text-right">$2,333</td>
                        </tr>
                        <tr class="text-right">
                            <td colspan="2" style="border: 1px solid #ffffff!important; border-right: 1px solid #ddd!important">Subtotal</td>
                            <td colspan="1" style="border: 1px solid #ddd!important">$2,333</td>
                        </tr>
                        <tr class="text-right">
                            <td colspan="2" style="border: 1px solid #ffffff!important; border-right: 1px solid #ddd!important">Fee 2%</td>
                            <td colspan="1" style="border: 1px solid #ddd!important">$40.23</td>
                        </tr>
                        <tr class="text-right">
                            <td colspan="2" style="border: 1px solid #ffffff!important; border-right: 1px solid #ddd!important">Total</td>
                            <td colspan="1" style="border: 1px solid #ddd!important">$2400</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
