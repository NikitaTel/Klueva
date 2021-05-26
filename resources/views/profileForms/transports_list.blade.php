@php
    if(isset($_GET['id'])) {
     $transports =\App\Transport::all()->where('user_id',$_GET['id'] );
   }

   elseif(\Illuminate\Support\Facades\Auth::check()) {
        $transports =\App\Transport::all()->where('user_id', \Illuminate\Support\Facades\Auth::user()->id);
   }

   else {
       $transports='';
   }
@endphp

<div class="result-pods">
    @if (session('transport_deleted '))
        <div class="alert alert-success green">
            Транспорт был удалён
        </div>
    @endif
    <h1 class="profile-heading">Транспорт</h1>
    @if($transports!='[]')

    <ul>
        @foreach($transports ?? '' as $transport)
            @if(\App\Archive::all()->where('type_id', 2)->where('request_id', $transport->id)=='[]')
                <li>
                    <a href="{{route('transport_page',['id' => $transport->id])}}">
                        {{$transport->id}}. {{$transport->date_in}}
                    </a>
                    @if (\Illuminate\Support\Facades\Auth::user()->id === $transport->user_id)
                       <div>
                           <form action="{{route('archive')}}" method="POST">
                               @csrf
                               <input type="hidden" value="{{$transport->id}}" name="id">
                               <input type="hidden" value="2" name="type">
                               <input type="hidden" value="{{$transport->date_in}}" name="date">

                               <div class="form-group row mb-0">
                                   <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary add_gruz_submit">
                                           Добавить в архив
                                       </button>
                                   </div>
                               </div>
                           </form>

                           <form action="{{route('delete_transport', ['id'=>$transport->id])}}">
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
                       </div>
                    @endif
                    @if (\Illuminate\Support\Facades\Auth::user()->role_id==1)
                        <form action="{{route('delete_transport', ['id'=>$transport->id])}}">
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
        <p style="margin: 1rem 0;">Транспорта пока нет</p>
    @endif
</div>
