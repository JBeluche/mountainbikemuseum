@extends('layouts.main')

@section('page-title', 'dashboard')




@section('content')
    @parent


        <section class="dashboard">


            @include('layouts.notification-bar')
            
                <div class="payment__wrapper">
                        <div class="payment__header"></div><br>
                <form action="{{ route('pay') }}" method="POST" id="paymentForm" class="payment__form">
                        @csrf 
                            <label class="payment__label" for="Payment">How much do you want to pay?</label><br>
                            <input type="number"
                                    min="5"
                                    step="0.01"
                                    class="payment__input"
                                    name="value"
                                    value="0"
                                    required><br>
                                    <small>Make sure to write your number right!</small>
                                    <label>Currency</label>
                                    <select name="currency" class="payment__currency--select" required>
                                        @foreach ($currencies as $currency)
                                            <option value="{{$currency->iso}}">
                                                {{strtoupper($currency->iso)}}
                                            </option>
                                            @endforeach
                                    </select><br><br>

                                    <p>Select the payment method</p>
                                    <div data-toggle="buttons">
                                        @foreach ($paymentPlatforms as $paymentPlatform)
                                            <label class="" for="">
                                                <input type="radio"
                                                        name="payment_platform"
                                                        value="{{$paymentPlatform->id}}"
                                                        required

                                            >
                                            <img src="{{ asset($paymentPlatform->image) }}" alt="An image with the logo of the payment platform" style="width: 100px;">
                                            </label>
                                        @endforeach
                                    </div>

                                    @foreach ($paymentPlatforms as $paymentPlatform)
                                        <div>
                                            @includeIf ('payments.' . strtolower($paymentPlatform->name) . '-collapse')
                                        </div>
                                    @endforeach

                                    <button type="submit" id="payButton" class="payment__button">Pay here</button>
                    </form>
                </div>



        </section>
    
    
    @stop