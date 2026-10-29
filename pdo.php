<?PHP
$host = 'localhost';
$dbname = 'Sistema_cadastro';
$usuario = 'root';
$senha = '';
try{
    $pdo = new PDO ("mysql:host= $host; $dbname; charset=utf8mb4", $usuario, $senha);
    $pdo -> setAttribute(PDO :: ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
    $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
Catch (PDOExceptionj $e){
    die ("Erro na conexão com o banco de dados:". $e-> getMessage()),
}
?>