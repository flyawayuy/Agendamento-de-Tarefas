<?PHP
 require_once 'conexao.php';
 $mensagem = '';
 $tipoMensagem = '';
 if ($_SERVER['REQUEST_METHOD']==='POST'){
    $nome=trim($_POST['nome']??'');
    $email-filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha=$_POST['senha']??'';
    if (empty($nome)|| !$email ||empty($senha)){
        $mensagem = 'Por favor, preencha todos os campos corretamente.';
        $tipoMensagem = 'erro';
    } else{
        try{
            $stmtcheck = $pdo -> ("SELECT id FROM usuario email = :email");
            $stmtCheck -> execute ([':email'=> $email]);
            if($stmtCheck ->rowCaunt()>0){
                $mensagem = 'Este email ja está cadastrado.';
                $tipoMensagem = 'erro';
            }else{
                $SenhaHash = password_hash(
                    $senha, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO
                    usuarios(nome, email, Senha)VALUES(:nome,:email,:senha)";
                    $stmt->execute([
                        ':nome'=> $nome,
                        ':email'=> $email,
                        ':Senha'=>$SenhaHash
                    ]);
                    $mensagem ='Usuario cadastrado com sucesso!';
                    $tipoMensagem = 'sucesso';
            } catch(PDOException $e) {
                $mensagem = 'Erro ao  Cadastrar:'. $e -> getMessage();
                $tipoMensagem = 'erro';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>cadastro de usuário</h2>
        <?php if(!empty($mensagem)):?>
            <div_class= "mensagem" <?htmlspecialchars($tipoMensagem)?>">
                <?php endif ?>"
                <form action= "form-group" method="post">
                    div_class=" form-group">
                    <label for="nome">nome completo </label>
                    <input type="email"> id="email" name="email required placeholder=" digite o seu e-mail">
        </div>
</body>
</html>