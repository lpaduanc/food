@include('admin.includes.alerts')
@csrf

<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" class="form-control" value="{{ $detalhe->nome ?? old('nome') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">
        {{ !isset($detalhe) ? 'Cadastrar' : 'Atualizar' }}
    </button>
</div>