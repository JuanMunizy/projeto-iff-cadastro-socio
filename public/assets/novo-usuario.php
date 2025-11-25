<h1>Novo Usuário</h1>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="MB-3">
        <label>Nome</label>
        <input type="text" name="Nome"class="form-control"> 


    </div>
       <div class="MB-3">
        <label>Email</label>
        <input type="text" name="Email"class="form-control"> 


       <div class="MB-3">
        <label>Senha</label>
        <input type="password" name="Senha"class="form-control"> 


    </div>
       <div class="MB-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data"class="form-control"> 


    </div>


     <div class="MB-3">
       <label for="telefone">Telefone</label>
<input type="tel" id="telefone" class="input-padrao" required placeholder="(xx) xxxxx-xxxx"> 


    </div>
       <div class="MB-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
        

    </div>

    
</form>