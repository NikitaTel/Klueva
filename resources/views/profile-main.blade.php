@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp

<div class="user-profile">
    @if($user->id==1)
        <img src="{{asset('images/1.jpg')}}" alt="profile" class="user-profile-image">
    @else
        <img src="{{asset('images/2.jpg')}}" alt="profile" class="user-profile-image">
        @endif

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

        <div class="form-group row mb-0" style="margin-right: 20%;">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary add_gruz_submit">
                    Редактировать
                </button>
            </div>
        </div>
</div>
