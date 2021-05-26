@php
    $archives =\App\Archive::all()->where('user_id',\Illuminate\Support\Facades\Auth::user()->id);

@endphp

<div class="result-pods">
    @if (session('transport_deleted'))
        <div class="alert alert-success green">
            Заявка удалена из архива
        </div>
    @endif
    <h1 class="profile-heading">Архив</h1>
    @if($archives!='[]')

        <ul>
            @foreach($archives ?? '' as $archive)
                    <li>
                        @if($archive->type_id===1)
                            <a href="{{route('gruz_page',['id' => $archive->request_id])}}">
                                {{$archive->id}}. {{$archive->date_in}}
                            </a>
                        @else
                            <a href="{{route('transport_page',['id' => $archive->id])}}">
                                {{$archive->id}}. {{$archive->date_in}}
                            </a>
                        @endif

                        <form action="{{route('archive_delete')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$archive->id}}" name="id">
                            <input type="hidden" value="2" name="type">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary add_gruz_submit">
                                        Убрать из архива
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
            @endforeach
        </ul>
    @else
        <p style="margin: 1rem 0;">Заявок в архиве нет</p>
    @endif
</div>
