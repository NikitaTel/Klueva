@extends('layouts.app')

@section('title-block')
    Gallery
@endsection
@php
    $gruzs =\App\Transport::all()->where('city_to', $_GET['city_to'])
                ->where('country_to', $_GET['country_to'])
                ->where('city_from', $_GET['city_from'])
                ->where('country_from', $_GET['country_from'])
                ->where('date_in','>=', $_GET['date_in'])
                ->where('date_in', '<=', $_GET['date_out'])
                ->where('body_type', $_GET['body_type']);
 $gruz_pars = \App\Transport_parameter::all();
@endphp

@section('content')
    @include('poisk.poisk_template')

    @if($_GET['ok'])
        @if (session('request_transport_success'))
            <div class="alert alert-success green">
                Заявка добавлена в избранное
            </div>
        @endif
        <h2 class="filtered-heading">Доступные заявки</h2>
        @if($gruzs)
            <section class="result-section">
                <div class="result-header">
                    <div>Дата</div>
                    <div>Транспорт</div>
                    <div>Откуда</div>
                    <div>Куда</div>
                    <div>Груз</div>
                    <div>Оплата</div>
                    <div>Контакты</div>
                </div>
                <div class="result-pods">
                    @foreach($gruzs ?? '' as $gruz)
                        @if(\App\Archive::all()->where('type_id', 1)->where('request_id', $gruz->id)=='[]')
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
                                <div>
                                    <a href="{{route('strangersProfile', ['id' => $gruz->user_id])}}">{{\App\User::all()->find($gruz->user_id)->company_name}}</a>
                                    @if($gruz->user_id!=\Illuminate\Support\Facades\Auth::user()->id)
                                        <form action="{{route('make_transport_request')}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$gruz->id}}" name="gruz_id">
                                            <input type="hidden" value="{{$_SERVER['REQUEST_URI']}}" name="url">
                                            <button style="margin: 10px 0 10px -10px;" type="submit">Добавить в избранное</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
        @else
            <div>Грузы не найдены</div>
        @endif
    @endif

@endsection
