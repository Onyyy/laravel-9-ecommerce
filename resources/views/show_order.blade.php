@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Odrder Detail')}}</div>

                    @php
                        $total_price=0;
                    @endphp

                    <div class="card-body">
                        <h1 class="card-title">Order ID {{$order->id}}</h1>
                        <h5 class="card-subtitle">By {{$order->user->name}}</h5>

                        @if ($order->is_paid==true)
                            <p class="card-text">Paid</p>
                        @else
                            <p class="card-text">Unpaid</p>
                        @endif
                        <hr>
                        @foreach ($order->transactions as $transaction)
                            <p>Product : {{$transaction->product->name}} - {{$transaction->amount}} pcs</p>
                            @php
                                $total_price += $transaction->product->price * $transaction->amount;
                            @endphp
                        @endforeach
                        <hr>
                        <p>Total: Rp{{$total_price}}</p>
                        <hr>
                        @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                            <form action="{{route('submit_payment_receipt', $order)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Upload your payment receipt</label>
                                    <input type="file" name="payment_receipt" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit Payment</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
