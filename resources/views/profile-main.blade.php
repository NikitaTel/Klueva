@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp

<div class="user-profile">
    <img src="{{asset('images/profile.jpg')}}" alt="profile" class="user-profile-image">
    <div class="user-description">
        <div>
            <span class="bold">Название компании</span>: <span>{{$user->company_name}}</span>
        </div>
        <div>
            <span class="bold">Контактное имя</span>: <span>{{$user->contact_name}}</span>
        </div>
        <div>
            <span class="bold">Номер телефона</span>: <span>{{$user->phone_number}}</span>
        </div>
        <div>
            <span class="bold">Страна</span>: <span>{{$user->country}}</span>
        </div>
        <div>
            <span class="bold">Город</span>: <span>{{$user->city}}</span>
        </div>
        <div>
            <span class="bold">Профиль деятельности</span>: <span>{{$user->occupation}}</span>
        </div>
    </div>
</div>
