@php
    $partners =\App\Partner::all()
        ->where('user_id', \Illuminate\Support\Facades\Auth::user()->id);
@endphp

<div class="result-pods">
    <h1 class="profile-heading">Партнеры</h1>
    @if($partners!='[]')

    <ul>
        @foreach($partners ?? '' as $partner)
            <li>
                   <a href="{{route('strangersProfile', ['id' => $partner->partner_id])}}">
                        {{\App\User::all()->find($partner->partner_id)->company_name}}
                    </a>

            </li>
        @endforeach
    </ul>

    @else
        <p style="margin: 1rem 0;">Партнеров пока нет</p>
    @endif
</div>
