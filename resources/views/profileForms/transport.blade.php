<h1 class="add_gruz_main_heading">Добавить Транспорт</h1>
<form method="POST" action="{{ route('addtransport') }}">
    @csrf

    <div class="form-group row add_gruz_wrapper add_transport_wrapper">
        <h3 class="add_gruz_heading">Общая информация</h3>

        <div class="col-md-6">
            <label for="date_in">Дата загрузки</label>
            <input class="add_gruz_input date-input" placeholder="Дата c" id="date_in" type="date" class="form-control @error('date_in') is-invalid @enderror style-input" name="date_in" value="{{ old('date_in') }}" required autocomplete="date_in" autofocus>

            @error('date_in')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror

            <input class="add_gruz_input date-input" placeholder="Дата по" id="date_out" type="date" class="form-control @error('date_out') is-invalid @enderror style-input" name="date_out" value="{{ old('date_out') }}" required autocomplete="date_out" autofocus>

            @error('date_out')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <div class="col-md-6">
            <label class="country-in-align" for="date_in">Откуда</label>
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
            <label class="country-align" for="date_in">Куда</label>
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

        <h3 class="add_gruz_heading">Транспорт</h3>

        <div class="gruz-fields">
            <div>
                <div class="col-md-6 add-inputs">
                    <label for="length">Габариты кузова от:</label>
                    <div class="add-inputs-wrapper">
                        <input class="add_gruz_input" placeholder="длина(м)" id="length" type="text" class="form-control
                            @error('length') is-invalid @enderror style-input" name="length"
                               value="{{ old('length') }}" required autocomplete="length" autofocus>

                        @error('length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input class="add_gruz_input" placeholder="ширина(м)" id="width" type="text" class="form-control
                            @error('width') is-invalid @enderror style-input" name="width"
                               value="{{ old('width') }}" required autocomplete="width" autofocus>

                        @error('width')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input class="add_gruz_input" placeholder="высота(м)" id="height" type="text" class="form-control
                            @error('height') is-invalid @enderror style-input" name="height"
                               value="{{ old('height') }}" required autocomplete="height" autofocus>

                        @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="weight-align" for="name">Грузоподъемность:</label>
                    <input class="add_gruz_input" placeholder="грузоподъемность(т)" id="weight" type="text" class="form-control
                            @error('weight') is-invalid @enderror style-input" name="weight"
                           value="{{ old('weight') }}" required autocomplete="weight" autofocus>

                    @error('weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="gabariti-wrapper">
                <div class="col-md-6">
                    <label class="volume-align" for="volume">Объем</label>
                    <input class="add_gruz_input" placeholder="объем(м3)" id="volume" type="text" class="form-control
                            @error('volume') is-invalid @enderror style-input" name="volume"
                           value="{{ old('volume') }}" autocomplete="volume" autofocus>

                    @error('volume')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="adr-align" for="adr">ADR</label>
                    <input class="add_gruz_input" placeholder="adr" id="adr" type="text" class="form-control
                            @error('adr') is-invalid @enderror style-input" name="adr"
                           value="{{ old('adr') }}" required autocomplete="adr" autofocus>

                    @error('adr')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="body-type-label" for="body_type">Тип кузова</label>
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
                    <label for="loading_type">Загрузка/Выгрузка</label>
                    <select name="loading_type" id="loading_type" class="form-control @error('loading_type') is-invalid @enderror style-select">
                        <option value="верхняя">верхняя</option>
                        <option value="боковая">боковая</option>
                        <option value="задняя">задняя</option>
                        <option value="с полной растентовкой">с полной растентовкой</option>
                        <option value="со снятием поперечин">со снятием поперечин</option>
                        <option value="без ворот">без ворот</option>
                    </select>
                </div>
            </div>
        </div>

        <h3 class="add_gruz_heading">Оплата</h3>

        <div class="col-md-6">
            <label for="summa">Сумма средств:</label>
            <input class="add_gruz_input" placeholder="1000" id="summa" type="text" class="form-control
                            @error('summa') is-invalid @enderror style-input" name="summa"
                   value="{{ old('summa') }}" required autocomplete="loading_type" autofocus>

            @error('loading_type')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
            /
            <select name="currency" id="currency" class="form-control @error('currency') is-invalid @enderror style-select">
                <option value="grn">грн.</option>
                <option value="dollar">$</option>
                <option value="euro">€</option>
                <option value="rus">рос. руб.</option>
                <option value="bel">бел. руб.</option>
                <option value="lari">груз. лари</option>
                <option value="uzbek">узб. сум</option>
                <option value="zloti">пол. злот </option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="payment-align" for="payment_type">Форма оплаты:</label>
            <select name="payment_type" id="payment_type" class="form-control @error('payment_type') is-invalid @enderror style-select">
                <option value="nal">наличные</option>
                <option value="beznal">безнал.</option>
                <option value="comb">комб.</option>
                <option value="elpayment">эл. платеж</option>
                <option value="card">карта</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="note-align" for="note">Примечания</label>
            <input class="add_gruz_input" placeholder="Примечания" id="note" type="text" class="form-control
                            @error('note') is-invalid @enderror style-input" name="note"
                   value="{{ old('note') }}" autocomplete="note" autofocus>

            @error('note')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary add_gruz_submit">
                Добавить
            </button>
        </div>
    </div>
</form>
