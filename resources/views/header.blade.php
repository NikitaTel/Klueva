@section('header')
    <header>
        <ul>
            <li>
                <a  href="{{route('home')}}" class="sign-out">Главная</a>
            </li>
            <li>
                <a  href="{{route('company_name')}}" class="sign-out">Поиск по городам/странам</a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::check() ?? '')
            <li class="sign-in">
                <a href="{{route('profile')}}">{{\Illuminate\Support\Facades\Auth::user()->company_name}}
                </a>
            </li>

            <li>
                <a  href="{{route('logoutUser')}}" class="sign-out">выйти</a>
            </li>

            @else
           <li>
               <a href="{{route('login')}}">войти</a>
           </li>
            @endif
        </ul>
    </header>

    <h1 class="main-title"><a href="{{route('home')}}">Trans Express</a></h1>
