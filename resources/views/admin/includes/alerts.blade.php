@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>
                {{ $error }}
            </p>
        @endforeach
    </div>
@endif

@if (session('mensagem'))
    <div class="alert alert-success">
        {{ session('mensagem') }}
    </div>
@endif

@if (session('erro'))
    <div class="alert alert-warning">
        {{ session('erro') }}
    </div>
@endif