@extends('layouts.app')
@php
$user = \Illuminate\Support\Facades\Auth::user();
@endphp
@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->role_id ==1)
        @include('admin.user_poisk')
    @else

        @include('profile-main')
        @if (session('partner_declined'))
            <div class="alert alert-success green">
                Партнёрство отклонено
            </div>
        @endif
        @if (session('archived'))
            <div class="alert alert-success green">
                Заявка добавлена в архив
            </div>
        @endif

        @if (session('partner_accepted'))
            <div class="alert alert-success green">
                Партнёрство принято
            </div>
        @endif

        @if (session('unarchived'))
            <div class="alert alert-success green">
                Заявка удалена из архива
            </div>
        @endif

        @if (session('gruz_success'))
            <div class="alert alert-success green">
                Груз добавлен
            </div>
        @endif

        @if (session('transport_success'))
            <div class="alert alert-success green">
                Транспорт добавлен
            </div>
        @endif

        @if (session('document_success'))
            <div class="alert alert-success green">
                Документ добавлен
            </div>
        @endif
        <div class="main-lists top-lists">
        @include('profileForms.gruzs_list')
        @include('profileForms.transports_list')
        @include('profileForms.documents_list')
        </div>
        <div class="main-lists top-lists">
        @include('profileForms.partner_requests_list')
        @include('profileForms.partners_list')
            <div class="result-pods">
                @include('profileForms.addDocument')
            </div>

        </div>
        <div class="main-lists bottom-lists">
            @include('profileForms.reviews_list_auth')
        @include('profileForms.requests_list')
            @include('profileForms.archive')
        </div>


        @include('profileForms.addGruz')

        @include('profileForms.transport')
    @endif
@endsection
