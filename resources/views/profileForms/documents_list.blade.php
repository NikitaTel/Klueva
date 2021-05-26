@php
  if(isset($_GET['id'])) {
      $documents =\App\Document::all()->where('user_id',$_GET['id'] );
    }

    elseif(\Illuminate\Support\Facades\Auth::check()) {
         $documents =\App\Document::all()->where('user_id', \Illuminate\Support\Facades\Auth::user()->id);
    }

    else {
        $documents='';
    }
@endphp

<div class="result-pods">
    @if (session('document_deleted'))
        <div class="alert alert-success green">
            Документ был удалён
        </div>
    @endif
    <h1 class="profile-heading">Документы</h1>
    @if($documents!='[]')
    <ul>
        @foreach($documents ?? '' as $document)
            <li>
                <a href="{{asset('/storage/' . $document->document_file)}}" download>
                    {{$document->id}} {{$document->document_name}}
                </a>
                @if (\Illuminate\Support\Facades\Auth::user()->id === $document->user_id)
                    <form action="{{route('delete_document', ['id'=>$document->id])}}">
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
                @endif
                @if (\Illuminate\Support\Facades\Auth::user()->role_id==1)
                    <form action="{{route('delete_document', ['id'=>$document->id])}}">
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
                @endif
            </li>
        @endforeach
    </ul>
    @else
        <p style="margin: 1rem 0;">Документов пока нет</p>

    @endif
</div>
