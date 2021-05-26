@extends('layouts.app')

@section('title-block')
    Companies
@endsection
@php
    if(\App\City::all()->where('name', $_GET['city_country'])!='[]') {
        $companies =\App\User::all()->where('city', $_GET['city_country'])->where('occupation', $_GET['occupation']);
    }

    elseif(\App\Country::all()->where('country', $_GET['city_country'])!='[]') {
        $companies = \App\User::all()->where('country', $_GET['city_country'])->where('occupation', $_GET['occupation']);
    }
    else {
        $companies = '';
    }

@endphp

@section('content')
    @include('poisk.company_poisk_template')
    @if($companies!='[]' && $companies!='')
        <section class="result-section" style="margin-top: 30px;">
            <div class="result-header">
                <div>Название компании</div>
                <div>Страна</div>
                <div>Город</div>
                <div>Профиль деятельности</div>
                <div>Контактное лицо</div>
            </div>
            <div class="result-pods">
                @foreach($companies ?? '' as $company)

                    <div class="result-pod">
                        <div>{{$company->company_name}}</div>
                        <div>{{$company->country}}</div>
                        <div>{{$company->city}}</div>
                        <div>{{$company->occupation}}</div>
                        <div>
                            <a href="{{route('strangersProfile', ['id' => $company->id])}}">{{$company->contact_name}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @else
        <div>Компании не найдены</div>
    @endif

@endsection
