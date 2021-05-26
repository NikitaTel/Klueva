<form method="GET" action="{{ route('company_poisk') }}" class="gruz_poisk">
    <h1>Поиск по городам/странам</h1>
    @csrf

    <div class="search-wrapper">
        <input class="add_gruz_input search-input" placeholder="Введите город или страну" id="city_country" type="text" class="form-control
                        @error('city_country') is-invalid @enderror style-input" name="city_country"
               value="{{ old('city_country') }}" required autocomplete="city_country" autofocus>

        @error('city_country')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
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

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary add_gruz_submit">
                Поиск
            </button>
        </div>
    </div>
</form>
