<h1 style="width: 120%; max-width: none;" class="profile-heading">Добавить Документ</h1>
<form method="POST" action="{{ route('addDocument') }}" enctype="multipart/form-data" >
    @csrf

    <div class="col-md-6">
        <input class="add_gruz_input add-doc" placeholder="Документ" id="document_file" type="file" class="form-control
                        @error('document_file') is-invalid @enderror style-input" name="document_file"
               value="{{ old('document_file') }}" autocomplete="note" autofocus required>

        @error('document_file')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary add_gruz_submit">
                Добавить
            </button>
        </div>
    </div>
</form>
