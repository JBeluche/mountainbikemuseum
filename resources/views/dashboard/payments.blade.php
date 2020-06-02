

@extends('dashboard.show')


@section('data')

@parent
    <div class="dashboard__table-container">
        <div class="dashboard__table">
            <p class="dashboard__table--header">Detail</p>
            <p class="dashboard__table--header">Datuum</p>
            <p class="dashboard__table--header">Beschrijving</p>
            <p class="dashboard__table--header">Prijs</p>
            <p class="dashboard__table--header">Methode</p>

            {{--Here all the records will be looped--}}
            @foreach($payments as $payment)
        <p class="dashboard__table--item dashboard__table--item-id">{{$payment->is_subscription === '1' ? 'Subscription' : 'Eenmalig'}}</p>
                <p class="dashboard__table--item">{{date('d-m-Y', strtotime($payment->created_at)) }}</p>
                <p class="dashboard__table--item">{{$payment->description}}</p>
                <p class="dashboard__table--item">&euro; {{$payment->price}}</p>
        <p class="dashboard__table--item">{{$payment->payment_platforms_id === '4' ? 'Ideal' : 'Paypal'}}</p>
            @endforeach

        </div>
    
    </div>
    @stop