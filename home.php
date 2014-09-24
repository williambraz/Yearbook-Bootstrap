<?php
    require_once("./banco/conexao.php");
    require_once("./Pessoa.class.php");
    require_once("./Usuarios.class.php");

    session_start();

    if (isset($_SESSION['login']))
    {
        header("Location: principal.php");
    }
?>

<?php
    include_once("./modelos/cabecalho.html");
    include_once("./modelos/menu_home.html");
?>
    <section id="intro">
        <p>Como projeto interdisciplinar do primeiro módulo do curso, você deverá desenvolver um álbum dos alunos da sua turma do curso de especialização. A ideia é implementar algo parecido com os Yearbooks publicados pelas escolas americanas.</p>
        <p>As tarefas da disciplina de Desenvolvimento de Aplicações Web vão estender o protótipo que já foi desenvolvido na disciplina anterior.</p>
        <p>Para acessar os perfis é preciso estar logado no sistema.</p>
        <div id="cadastramento">
            <h2><a href="cadastro.php">Cadastrar</a></h2>
        </div>
    </section>
    
    <section>
        	
        <ol id="fotos">
                
            <?php

                $usuarios = new Usuarios();

                $sql = "SELECT * from participantes limit 10";
                $query = $mysqli->query($sql);
                
                while ($dados = mysqli_fetch_array($query))
                {
                    $usuario = new Pessoa($dados['nomeCompleto'], $dados['login'], $dados['arquivoFoto'], $dados['cidade'], $dados['email'], $dados['descricao']); //cria um objeto "Pessoa" com esses dados
                    $usuarios->addPessoa($usuario);   
                }

                $usuarios->mostrarThumb();
                //$usuarios->mostrarGeral();    
            ?>
                
        </ol>
            
    </section>

    <div class="clear"></div>

<?php
    include_once("./modelos/rodape.html");
?>