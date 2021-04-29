@include('admin.includes.alerts')

<div class="form-group">
    <label for="nome">Nome</label>
    <input
        type="text"
        name="nome"
        id="nome"
        class="form-control"
        placeholder="nome"
        value="{{ $plano->nome ?? old('nome') }}"
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
        value="{{ $plano->descricao ?? old('descricao') }}"
    >
</div>
<div class="form-group">
    <label for="preco">Preço</label>
    <input
        type="text"
        name="preco"
        id="preco"
        class="form-control"
        placeholder="preço"
        value="{{ $plano->preco ??  old('preco') }}"
    >
</div>
<div class="form-group">
    <button
        type="submit"
        class="btn btn-primary"
    >
        {{ !isset($plano) ? 'Cadastrar' : 'Atualizar' }}
    </button>
</div>