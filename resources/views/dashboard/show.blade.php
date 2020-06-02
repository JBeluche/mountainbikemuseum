@extends('layouts.main')

@section('page-title', 'Dashboard')

@section('content')
    @parent
   
        <section class="dashboard__section">
            <div class="dashboard__container">
                <div class="dashboard__sidebar">
                    <h1 class="dashboard__sidebar--header">Hello, user</h1>
                        <ul class="dashboard__list paragraph-medium__light">
                           <a href="/dashboard"> <li class="dashboard__list-item"> <span> <img src="/img/svg/awesome-credit-card.svg" alt="Logo of a credit card"> </span> Betallingen</li></a>
                           <a href="/dashboard/subscripties""> <li class="dashboard__list-item"> <span> <img src="/img/svg/metro-loop.svg" alt="Logo of a loop"> </span> Subscripties</li></a>
                        </ul>
                </div>
                <div class="dashboard__content-window">
                    <h1 class="dashboard__main-header">Dashboard</h1>

                    @yield('data')

                </div>
            </div>

        </section>

    
    
    @stop