<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <form method="POST" action="">

        <h1>Formulário com PHP</h1>

        <p class="error">* Obrigatório</p>

        Nome: <input name="nome" type="text"> <samp class="error">*</samp> <br><br>

        E-mail: <input name="email" type="text"> <samp class="error">*</samp> <br><br>

        Website: <input name="website" type="text"><br><br>

        Comentario: <textarea name="comentario" cols="30" rows="3"></textarea><br><br>

        Gênero: <input name="genero" value="masculino" type="radio"> Masculino
        <input name="genero" value="feminino" type="radio"> Feminino
        <input name="genero" value="outros" type="radio"> Outros
        <br><br>

        <button name="enviado" type="submit">Enviar</button>

        <h1>Dados enviados:</h1>

        <?php 
        
        if(isset($_POST['enviado'])) {

            if(empty($_POST['nome']) || strlen($_POST['nome']) < 3 || strlen($_POST['nome']) > 100) {
                echo '<p class="error">Preencha o campo nome!</p>';
                die();
            }

             if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo '<p class="error">Preencha o campo e-mail!</p>';
                die();
            }

            if(!empty($_POST['website']) && !filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
                echo '<p class="error">Preencha corretamente o campo website!</p>';
                die();
            }

            $genero = "Não selecionado";
            if(isset($_POST['genero'])) {
                $genero = $_POST['genero'];
                if($genero != "masculino" && $genero != "feminino" && $genero != "outros") {
                    echo '<p class="error">Preencha corretamente o campo genero!</p>';
                }
            }

            echo "<p><b>Nome: </b>" . $_POST['nome'] . "</p>";
            echo "<p><b>E-mail: </b>" . $_POST['email'] . "</p>";
            echo "<p><b>Website: </b>" . $_POST['website'] . "</p>";
            echo "<p><b>Comentário: </b>" . $_POST['comentario'] . "</p>";
            echo "<p><b>Gênero: </b>" . $genero . "</p>";
        }
        
        ?>
    </form>
</body>
</html>






