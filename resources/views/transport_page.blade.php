@extends('layouts.app')

@section('title-block')
    Gallery
@endsection
@php
    $transport =\App\Transport::find($_GET['id']);
 $transport_pars = \App\Transport_parameter::find($_GET['id']);
@endphp

@section('content')
    <div class="user-profile">
        @if($transport->user_id==1)
            <img src="{{asset('images/1.jpg')}}" alt="profile" class="user-profile-image">
        @else
            <img src="{{asset('images/2.jpg')}}" alt="profile" class="user-profile-image">
        @endif
        <div class="user-description">
            <div>
                <span class="bold">Название компании</span>: <span>{{\App\User::all()->find($transport->user_id)->company_name}}</span>
            </div>
            <div>
                <span class="bold">Контактное имя</span>: <span>{{\App\User::all()->find($transport->user_id)->contact_name}}</span>
            </div>
            <div>
                <span class="bold">Номер телефона</span>: <span>{{\App\User::all()->find($transport->user_id)->phone_number}}</span>
            </div>
            <div>
                <span class="bold">Страна</span>: <span>{{\App\User::all()->find($transport->user_id)->country}}</span>
            </div>
            <div>
                <span class="bold">Город</span>: <span>{{\App\User::all()->find($transport->user_id)->city}}</span>
            </div>
            <div>
                <span class="bold">Профиль деятельности</span>: <span>{{\App\User::all()->find($transport->user_id)->occupation}}</span>
            </div>
        </div>
    </div>
    <h1 style="margin: 20px 0;">Транспорт № {{$transport->id}}</h1>
            <section class="result-section single-page">

                <div class="result-header">
                    <div>Дата</div>
                    <div>Транспорт</div>
                    <div>Откуда</div>
                    <div>Куда</div>
                    <div>Габариты (масса, длина, ширина, высота)</div>
                    <div>Оплата</div>
                </div>
                <div class="result-pods">

                        <div class="result-pod">
                            <div>{{$transport->date_in}}</div>
                            <div>{{$transport->body_type}}</div>
                            <div>{{$transport->city_from}}</div>
                            <div>{{$transport->city_to}}</div>
                            <div>
                                {{$transport_pars->find($transport->id)->weight}} т,
                                {{$transport_pars->find($transport->id)->length}} м,
                                {{$transport_pars->find($transport->id)->width}} м,
                                {{$transport_pars->find($transport->id)->height}} м</div>
                            <div>{{$transport->summa}} {{$transport->currency}}</div>
                        </div>
                </div>
            </section>
@endsection
