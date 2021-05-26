<form method="GET" action="{{ route('user_poisk') }}" class="gruz_poisk">
    <h1>Поиск по компаниям</h1>
    @csrf

    <div>
        <input class="add_gruz_input search-input" placeholder="Введите имя компании или контактное лицо" id="user_company" type="text" class="form-control
                        @error('user_company') is-invalid @enderror style-input" name="user_company"
               value="{{ old('user_company') }}" required autocomplete="user_company" autofocus>

        @error('user_company')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary add_gruz_submit">
                Поиск
            </button>
        </div>
    </div>
</form>
