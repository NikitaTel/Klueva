@extends('layouts.app')

@section('content')
                <div class="registration-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-6">
                                <input placeholder="Наименование организации" id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror style-input" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input placeholder="Эл. почта" id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror style-input" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input placeholder="Страна" id="country" type="text" class="form-control @error('country') is-invalid @enderror style-input" name="country" value="{{ old('country') }}" required autocomplete="country">
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input placeholder="Город" id="text" type="text" class="form-control @error('city') is-invalid @enderror style-input" name="city" value="{{ old('city') }}" required autocomplete="city">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input placeholder="Номер телефона" id="phone_number" type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror style-input" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input placeholder="ФИО контактного лица" id="contact_name" type="text" name="contact_name" class="form-control @error('contact_name') is-invalid @enderror style-input" value="{{ old('contact_name') }}" required autocomplete="contact_name">

                                @error('contact_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input placeholder="Пароль" id="password" type="password" class="form-control @error('password') is-invalid @enderror style-input" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <select name="occupation" id="occupation" class="form-control @error('occupation') is-invalid @enderror style-select">
                                    <option value="Грузовладелец">Грузовладелец</option>
                                    <option value="Транспортировщик">Перевозчик (Грузы)</option>
                                    <option value="Грузовладелец - перевозчик">Грузовладелец - перевозчик</option>
                                    <option value="Дилеры, услуги, другое">Дилеры, услуги, другое</option>
                                    <option value="Диспетчер">Диспетчер</option>
                                    <option value="Перевозчик (пассажиры + грузы)">Перевозчик (пассажиры + грузы)</option>
                                    <option value="Эспедитор">Эспедитор</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                <input placeholder="Подтвердите пароль" id="password-confirm" type="password" class="form-control style-input" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Регистрация') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
@endsection
