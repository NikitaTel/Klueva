@php
    $requests =\App\User_requests::all()
        ->where('requested_user_id', \Illuminate\Support\Facades\Auth::user()->id);

@endphp

<div class="result-pods">
    <h1 class="profile-heading">Избранное</h1>
    @if($requests!='[]')

    <ul>
        @foreach($requests ?? '' as $request)
            <li>
                @if($request->gruz_id > 0)
                    <a href="{{route('gruz_page', ['id' => $request->gruz_id])}}">
                        {{$request->gruz_id}}. {{\App\Gruz::find($request->gruz_id)->date_in}}
                    </a>
                @else
                    <a href="{{route('transport_page', ['id' => $request->transport_id])}}">
                        {{$request->transport_id}}. {{\App\Gruz::find($request->transport_id)->date_in}}
                    </a>
                @endif
            </li>
        @endforeach
    </ul>

    @else
        <p style="margin: 1rem 0;">Заявок пока нет</p>
    @endif
</div>
