@extends('layout_interface')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Credit Card Payment') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('/process-payment') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="card_number" class="col-md-4 col-form-label text-md-right">{{ __('Card Number') }}</label>

                            <div class="col-md-6">
                                <input id="card_number" type="text" class="form-control" name="card_number" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="expiry_date" class="col-md-4 col-form-label text-md-right">{{ __('Expiry Date') }}</label>

                            <div class="col-md-3">
                                <input id="expiry_date" type="text" class="form-control" name="expiry_date" placeholder="MM/YY" required>
                            </div>

                            <label for="cvv" class="col-md-2 col-form-label text-md-right">{{ __('CVV') }}</label>

                            <div class="col-md-2">
                                <input id="cvv" type="text" class="form-control" name="cvv" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cardholder_name" class="col-md-4 col-form-label text-md-right">{{ __('Cardholder Name') }}</label>

                            <div class="col-md-6">
                                <input id="cardholder_name" type="text" class="form-control" name="cardholder_name" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Make Payment') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
