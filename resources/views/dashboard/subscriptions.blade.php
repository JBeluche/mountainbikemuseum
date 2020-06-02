

@extends('dashboard.show')


@section('data')

@parent
    <div class="dashboard__table-container">
        <div class="dashboard__table">
            <p class="dashboard__table--header">Status</p>
            <p class="dashboard__table--header">Datuum</p>
            <p class="dashboard__table--header">Beschrijving</p>
            <p class="dashboard__table--header">Prijs</p>
            <p class="dashboard__table--header"></p>

            {{--Here all the records will be looped--}}
            @foreach($subscriptions as $subscription)
                <p class="dashboard__table--item dashboard__table--item-id">{{$subscription->status}}</p>
                <p class="dashboard__table--item"">{{date('d-m-Y', strtotime($subscription->created_at)) }}</p>
                <p class="dashboard__table--item"">{{$subscription->product->description}}</p>
                <p class="dashboard__table--item"">&euro; {{$subscription->product->price}} </p>
            <p class="dashboard__table--item dashboard__table--cancel"><a href="/payment/cancel/{{$subscription->id}}"> Opzeggen</a></p>
            @endforeach

        </div>
    
    </div>
    @stop