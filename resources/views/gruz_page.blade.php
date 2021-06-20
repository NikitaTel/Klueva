@extends('layouts.app')

@section('title-block')
    Gallery
@endsection
@php
    $gruz =\App\Gruz::find($_GET['id']);
 $gruz_pars = \App\Gruz_parameter::find($_GET['id']);
@endphp

@section('content')
    <div class="user-profile">
        @if($gruz->user_id==1)
            <img src="{{asset('images/1.jpg')}}" alt="profile" class="user-profile-image">
        @else
            <img src="{{asset('images/2.jpg')}}" alt="profile" class="user-profile-image">
        @endif
        <div class="user-description">
            <div>
                <span class="bold">Название компании</span>: <a href="{{route('strangersProfile', ['id' => $gruz->user_id])}}"><span>{{\App\User::all()->find($gruz->user_id)->company_name}}</span></a>
            </div>
            <div>
                <span class="bold">Контактное имя</span>: <span>{{\App\User::all()->find($gruz->user_id)->contact_name}}</span>
            </div>
            <div>
                <span class="bold">Номер телефона</span>: <span>{{\App\User::all()->find($gruz->user_id)->phone_number}}</span>
            </div>
            <div>
                <span class="bold">Страна</span>: <span>{{\App\User::all()->find($gruz->user_id)->country}}</span>
            </div>
            <div>
                <span class="bold">Город</span>: <span>{{\App\User::all()->find($gruz->user_id)->city}}</span>
            </div>
            <div>
                <span class="bold">Профиль деятельности</span>: <span>{{\App\User::all()->find($gruz->user_id)->occupation}}</span>
            </div>
        </div>
    </div>
    <h1 style="margin: 20px 0;">Груз № {{$gruz->id}}</h1>
            <section class="result-section single-page">
                <div class="result-header">
                    <div>Дата</div>
                    <div>Транспорт</div>
                    <div>Откуда</div>
                    <div>Куда</div>
                    <div>Груз (масса, длина, ширина, высота)</div>
                    <div>Оплата</div>
                </div>
                <div class="result-pods">

                        <div class="result-pod">

                            <div>{{$gruz->date_in}}</div>
                            <div>{{$gruz->body_type}}</div>
                            <div>{{$gruz->city_from}}</div>
                            <div>{{$gruz->city_to}}</div>
                            <div>{{$gruz->name}},
                                {{$gruz_pars->find($gruz->id)->weight}},
                                {{$gruz_pars->find($gruz->id)->length}},
                                {{$gruz_pars->find($gruz->id)->width}},
                                {{$gruz_pars->find($gruz->id)->height}}</div>
                            <div>{{$gruz->summa}} {{$gruz->currency}}</div>

                        </div>
                </div>
            </section>
@endsection
