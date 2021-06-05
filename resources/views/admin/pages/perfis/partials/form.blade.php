@csrf
@include('admin.includes.alerts')

<div class="form-group">
    <label for="nome">Nome</label>
    <input
        type="text"
        name="nome"
        id="nome"
        class="form-control"
        placeholder="nome"
        value="{{ $perfil->nome ?? old('nome') }}"
    >
</div>
<div class="form-group">
    <label for="descricao">Descrição</label>
    <input
        type="text"
        name="descricao"
        id="descricao"
        class="form-control"
        placeholder="descrição"
        value="{{ $perfil->descricao ?? old('descricao') }}"
    >
</div>
<div class="form-group">
    <button
        type="submit"
        class="btn btn-primary"
    >
        {{ !isset($perfil) ? 'Cadastrar' : 'Atualizar' }}
    </button>
</div>