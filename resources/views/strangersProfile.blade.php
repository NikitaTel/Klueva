@extends('layouts.app')

@section('title-block')
    Profile
@endsection

@section('content')

    <div class="user-profile">
        @if($_GET['id']==1)
            <img src="{{asset('images/1.jpg')}}" alt="profile" class="user-profile-image">
        @else
            <img src="{{asset('images/2.jpg')}}" alt="profile" class="user-profile-image">
        @endif

        <div class="user-description">
            <div>
                <span class="bold">Название компании</span>: <span>{{$users->find($_GET['id'])->company_name}}</span>
            </div>
            <div>
                <span class="bold">Контактное имя</span>: <span>{{$users->find($_GET['id'])->contact_name}}</span>
            </div>
            <div>
                <span class="bold">Номер телефона</span>: <span>{{$users->find($_GET['id'])->phone_number}}</span>
            </div>
            <div>
                <span class="bold">Страна</span>: <span>{{$users->find($_GET['id'])->country}}</span>
            </div>
            <div>
                <span class="bold">Город</span>: <span>{{$users->find($_GET['id'])->city}}</span>
            </div>
            <div>
                <span class="bold">Профиль деятельности</span>: <span>{{$users->find($_GET['id'])->occupation}}</span>
            </div>
        </div>
            @if (\Illuminate\Support\Facades\Auth::user()->role_id==1)
            <div class="form-group row mb-0" style="margin-right: 20%;">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary add_gruz_submit">
                        Редактировать
                    </button>
                </div>
            </div>
            @endif
        @if($_GET['id']!=\Illuminate\Support\Facades\Auth::user()->id)
            @if(\App\Partner::all()->where('user_id', $_GET['id'])!='[]')

            @else
                @if (\Illuminate\Support\Facades\Auth::user()->role_id==2)
                <form method="POST" action="{{ route('request_partner') }}" class="partner">
                    @csrf
                    <input type="hidden" value="{{$_GET['id']}}" name="id">
                    <input type="hidden" value="{{$_SERVER['REQUEST_URI']}}" name="url">
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary add_gruz_submit partner-button">
                                Предложить партнерство
                            </button>
                        </div>
                    </div>
                </form>
                @endif
            @endif
        @endif
    </div>
    @if($_GET['id']!=\Illuminate\Support\Facades\Auth::user()->id)
        @if (session('partner_request_success'))
            <div class="alert alert-success green">
                Предложение отправлено
            </div>
        @endif
    @endif
    <div class="main-lists left-margin">
        @include('profileForms.gruzs_list')
        @include('profileForms.transports_list')
        @include('profileForms.documents_list')
    </div>



@php
    $margin='';

        if(\Illuminate\Support\Facades\Auth::user()->role_id==1) {
        $margin = "margin-left:-100px;";
    }
@endphp

    @if(session('review_success'))
        <div class="alert alert-success green">
            Отзыв добавлен
        </div>
    @endif
    <section class="review-wrapper left-margin" style={{$margin}}>
        @if (\Illuminate\Support\Facades\Auth::user()->role_id==2)
            <div>
                <h1>Добавить Отзыв</h1>
                <form method="POST" action="{{ route('addReview') }}">
                    @csrf

                    <input type="hidden" value="{{$_GET['id']}}" name="user_id">
                    <input type="hidden" value="{{$_SERVER['REQUEST_URI']}}" name="url">
                    <div class="form-group row ">
                        <div class="col-md-6 add-review">
                            <label for="recommended" class="sender-label">Рекомендуете?</label>

                            <input name="recommended" type="hidden">
                            <input id="recommended" type="checkbox" class="form-control style-input" name="recommended">

                            @error('recommended')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>
                    <textarea name="review_content" id="review_content" cols="70" rows="10" placeholder="Оставьте ваш отзыв"
                              required></textarea>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary add_gruz_submit">
                                Оставить отзыв
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @include('profileForms.reviews_list')
    </section>

@endsection
