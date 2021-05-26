
<form method="GET" action="{{ route('gruz_poisk') }}" class="gruz_poisk">

    @csrf
    <div class="col-md-6">
        <label for="body_type">Тип транспорта</label>
        <select name="body_type" id="body_type" class="form-control @error('body_type') is-invalid @enderror style-select">
            <option value="Тент">Тент</option>
            <option value="Цельномет">Перевозчик (Грузы)Цельномет</option>
            <option value="Бус">Бус</option>
            <option value="Контейнер">Контейнер</option>
            <option value="Одеждовоз">Одеждовоз</option>
            <option value="Изотерм">Изотерм</option>
            <option value="Реф.">Реф.</option>
            <option value="Реф.-тушевоз">Реф.-тушевоз</option>
            <option value="Автовоз">Автовоз</option>
            <option value="Автовышка">Автовышка</option>
            <option value="Бетоновоз">Бетоновоз</option>
            <option value="Зерновоз">Зерновоз</option>
            <option value="Лесовоз">Лесовоз</option>
            <option value="Коневоз">Коневоз</option>
            <option value="Кран">Кран</option>
            <option value="Мусоровоз">Мусоровоз</option>
            <option value="Погрузчик">Погрузчик</option>
            <option value="Птицевоз">Птицевоз</option>
            <option value="Скотовоз">Скотовоз</option>
            <option value="Стекловоз">Стекловоз</option>
            <option value="Трубовоз">Трубовоз</option>
            <option value="Тягач">Тягач</option>
            <option value="Эвакуатор">Эвакуатор</option>
            <option value="Яхтовоз">Яхтовоз</option>
            <option value="Бортовая">Бортовая</option>
            <option value="Погрузчик">Погрузчик</option>
            <option value="Платформа">Платформа</option>
            <option value="Манипулятор">Манипулятор</option>
            <option value="Ломовоз">Ломовоз</option>
            <option value="Контейнеровоз">Контейнеровоз</option>
            <option value="Трал / Негабарит">Трал / Негабарит</option>
            <option value="Плитовоз">Плитовоз</option>
            <option value="Самосвал">Самосвал</option>
            <option value="Микроавтобус">Микроавтобус</option>
            <option value="Автобус">Автобус</option>
            <option value="Цистерна">Цистерна</option>
            <option value="Молоковоз">Молоковоз</option>
            <option value="Бензовоз">Бензовоз</option>
            <option value="Цементовоз">Цементовоз</option>
        </select>
    </div>
    <div class="col-md-6">
        <label class="poisk-country-align" for="date_in">Куда</label>
        <input class="add_gruz_input" placeholder="Страна" id="country_to" type="text" class="form-control
                            @error('country_to') is-invalid @enderror style-input" name="country_to"
               value="{{ old('country_to') }}" required autocomplete="country_to" autofocus>

        @error('country_to')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror

        <input class="add_gruz_input" placeholder="Город" id="city_to" type="text"
               class="form-control @error('city_to') is-invalid @enderror style-input"
               name="city_to" value="{{ old('city_to') }}" required autocomplete="city_to" autofocus>

        @error('city_to')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="date_in">Откуда</label>
        <input class="add_gruz_input" placeholder="Страна" id="country_from" type="text" class="form-control @error('country_from') is-invalid @enderror style-input" name="country_from" value="{{ old('country_from') }}" required autocomplete="country_from" autofocus>

        @error('country_from')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror

        <input class="add_gruz_input" placeholder="Город" id="city_from" type="text" class="form-control @error('city_from') is-invalid @enderror style-input" name="city_from" value="{{ old('city_from') }}" required autocomplete="city_from" autofocus>

        @error('city_from')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="date_in">Дата загрузки</label>
        <input class="add_gruz_input" placeholder="Дата c" id="date_in" type="date" class="form-control @error('date_in') is-invalid @enderror style-input" name="date_in" value="{{ old('date_in') }}" required autocomplete="date_in" autofocus>

        @error('date_in')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input class="add_gruz_input" placeholder="Дата по" id="date_out" type="date" class="form-control @error('date_out') is-invalid @enderror style-input" name="date_out" value="{{ old('date_out') }}" required autocomplete="date_out" autofocus>

        @error('date_out')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="date_in">Название груза</label>
        <input class="add_gruz_input" placeholder="Название" id="name" type="text" class="form-control
                            @error('name') is-invalid @enderror style-input" name="name"
               value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
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


