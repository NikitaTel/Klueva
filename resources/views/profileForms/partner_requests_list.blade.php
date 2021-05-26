@php
    $requests =\App\Partner_request::all()
        ->where('partner_id', \Illuminate\Support\Facades\Auth::user()->id);

@endphp

<div class="result-pods">
    <h1 class="profile-heading">Запросы <br> на партнерство</h1>
    @if($requests!='[]' && $requests!='')

    <ul>
        @foreach($requests ?? '' as $request)
            <li>
                <a href="{{route('strangersProfile', ['id' => $request->requested_id])}}">
                    {{\App\User::find($request->requested_id)->contact_name}}
                </a>
                <div>
                    <form method="POST" action="{{ route('accept_partner') }}">
                        @csrf
                        <input type="hidden" value="{{$request->requested_id}}" name="user_id">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary add_gruz_submit">
                                    Принять партнерство
                                </button>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('decline_partner') }}">
                        @csrf
                        <input type="hidden" value="{{$request->requested_id}}" name="user_id">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary add_gruz_submit">
                                    Отклонить партнерство
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    @else
        <p style="margin: 1rem 0;">Запросов пока нет</p>
    @endif
</div>
