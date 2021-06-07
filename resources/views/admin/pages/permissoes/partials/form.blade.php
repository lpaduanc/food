@include('admin.includes.alerts')

<div class="form-group">
    <label for="nome">Nome</label>
    <input
        type="text"
        name="nome"
        id="nome"
        class="form-control"
        placeholder="nome"
        value="{{ $permissao->nome ?? old('nome') }}"
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
        value="{{ $permissao->descricao ?? old('descricao') }}"
    >
</div>
<div class="form-group">
    <button
        type="submit"
        class="btn btn-primary"
    >
        {{ !isset($permissao) ? 'Cadastrar' : 'Atualizar' }}
    </button>
</div>