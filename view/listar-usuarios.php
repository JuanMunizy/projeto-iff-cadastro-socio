<h1 class="mb-4">📋 Listar Usuários</h1>

<?php

if ($qtd > 0) {
    
    print "<p class='alert alert-info'>Foram encontrados <b>$qtd</b> resultados.</p>";
    
    print "<table class='table table-striped table-hover table-bordered'>";
    
    print "<thead class='table-dark'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>Email</th>";
    print "<th>Telefone</th>";
    print "<th>Ações</th>"; 
    print "</tr>";
    print "</thead>";
    
    print "<tbody>";
    
    $count = 1; 
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $count++ . "</td>";
        print "<td>" . $row->nome . "</td>";
        print "<td>" . $row->email . "</td>";
        print "<td>" . $row->telefone . "</td>";
        
        
        print "<td>
            <a href='/editar?id=" . $row->id . "' class='btn btn-warning btn-sm me-1'>Editar</a>
            <a href='/excluir?id=" . $row->id . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Tem certeza que deseja excluir o usuário " . $row->nome . "?');\">Excluir</a>
        </td>";
        
        print "</tr>";
    }
    
    print "</tbody>";
    print "</table>";
} else {
    
    print "<p class='alert alert-danger'>❌ NÃO ENCONTROU RESULTADOS</p>";
}
?>