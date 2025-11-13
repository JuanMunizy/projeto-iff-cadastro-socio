<h1>Novo Usuário</h1>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required> 
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required> 
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required> 
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="aniversario" class="form-control"> 
    </div>
    <div class="mb-3">
        <label for="telefone">Telefone</label>
        <input type="tel" id="telefone" name="telefone" class="form-control" placeholder="(xx) xxxxx-xxxx"> 
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>