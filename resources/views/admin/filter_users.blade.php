@extends('layouts.app')

@section('title-block')
    Пользователи
@endsection
@php

$users =\App\User::all();
@endphp

@section('content')
    @include('admin.user_poisk')

    @if (session('user_deleted '))
        <div class="alert alert-success green">
            Пользователь был удалён
        </div>
    @endif
    @if($users!='[]' && $users!='')
        <section class="result-section" style="margin-top: 30px;">
            <div class="result-header">
                <div>Название компании</div>
                <div>Страна</div>
                <div>Город</div>
                <div>Профиль деятельности</div>
                <div>Контактное лицо</div>
            </div>
            <div class="result-pods">
                @foreach($users ?? '' as $company)

                    <div class="result-pod">
                        <div>{{$company->company_name}}</div>
                        <div>{{$company->country}}</div>
                        <div>{{$company->city}}</div>
                        <div>{{$company->occupation}}</div>
                        <div>
                            <a href="{{route('strangersProfile', ['id' => $company->id])}}">{{$company->contact_name}}</a>
                            <form action="{{route('delete_user', ['id'=>$company->id])}}">
                                @csrf
                                <input type="hidden" value="{{$_SERVER['REQUEST_URI']}}" name="url">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary add_gruz_submit">
                                            Удалить
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @else
        <div>Пользователи не найдены</div>
    @endif

@endsection
