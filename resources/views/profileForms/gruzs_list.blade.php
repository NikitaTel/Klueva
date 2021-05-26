@php
    if(isset($_GET['id'])) {
      $gruzs =\App\Gruz::all()->where('user_id',$_GET['id'] );
    }

    elseif(\Illuminate\Support\Facades\Auth::check()) {
         $gruzs =\App\Gruz::all()->where('user_id', \Illuminate\Support\Facades\Auth::user()->id);
    }

    else {
        $gruzs='';
    }
@endphp

<div class="result-pods">
    @if (session('gruz_deleted'))
        <div class="alert alert-success green">
            Груз был удалён
        </div>
    @endif
        <h1 class="profile-heading">Грузы</h1>
    @if($gruzs !='[]')

        <ul>

            @foreach($gruzs ?? '' as $gruz)
                @if(\App\Archive::all()->where('type_id', 1)->where('request_id', $gruz->id)=='[]')
                    <li>
                        <a href="{{route('gruz_page',['id' => $gruz->id])}}">
                            {{$gruz->id}}. {{$gruz->date_in}}
                        </a>
                        @if (\Illuminate\Support\Facades\Auth::user()->id === $gruz->user_id)
                           <div >
                               <form action="{{route('archive')}}" method="POST">
                                   @csrf
                                   <input type="hidden" value="{{$gruz->id}}" name="id">
                                   <input type="hidden" value="1" name="type">
                                   <input type="hidden" value="{{$gruz->date_in}}" name="date">

                                   <div class="form-group row mb-0">
                                       <div class="col-md-6 offset-md-4">
                                           <button type="submit" class="btn btn-primary add_gruz_submit">
                                               Добавить в архив
                                           </button>
                                       </div>
                                   </div>
                               </form>
                               <form action="{{route('delete_gruz', ['id'=>$gruz->id])}}" method="POST">
                                   <input type="hidden" value="{{$_SERVER['REQUEST_URI']}}" name="url">
                                   @csrf
                                   <div class="form-group row mb-0">
                                       <div class="col-md-6 offset-md-4">
                                           <button type="submit" class="btn btn-primary add_gruz_submit">
                                               Удалить
                                           </button>
                                       </div>
                                   </div>
                               </form>
                           </div>
                        @endif

                        @if (\Illuminate\Support\Facades\Auth::user()->role_id==1)
                            <form action="{{route('delete_gruz', ['id'=>$gruz->id])}}">
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
                @endif
            @endforeach
        </ul>
    @else
        <p style="margin: 1rem 0;">Грузов пока нет</p>
    @endif
</div>
