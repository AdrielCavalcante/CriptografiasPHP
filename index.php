<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criptografias</title>
    <style>
        p{
            font-size: 17pt;
            font-weight: bold;
            font-family: sans-serif;
            margin-bottom: 4px;
        }
        input{
            width: 250px;
            height: 20px;
        }
        button{
            width: 100px;
            height: 30px;
            background-color: none;
            color: black;
        }
        button:hover{
            background-color: #00FF7F;
        }
        li{
            margin-top: 40px;
            font-size: 15pt;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>Adicione algum caractere, para ser criptografado</p>
    <input type="text" name="texto" placeholder="Digite algo">
    <button type="submit" name="btn">Enviar</button>
    </form>
</body>
</html>

<?php
   if(isset($_POST['btn'])): 
      $senha = $_POST['texto'];
      $senhamd5 = md5($senha);
      echo "<h4>Em MD5: $senhamd5</h4>";

      $senhasha256 = hash('sha256',$senha);
      echo "<h4>Em SHA256: $senhasha256</h4>";

      $senhasha512 = hash('sha512',$senha);
      echo "<h4>Em SHA512: $senhasha512</h4>";

      $senhaBase64 = base64_encode($senha);
      echo "<h4>Em Base64: $senhaBase64</h4>";

      $senhaBcrypt = password_hash($senha,PASSWORD_DEFAULT);
      echo "<h4>Em Bcrypt: $senhaBcrypt</h4>";

      $senhaARGON2I = password_hash($senha,PASSWORD_ARGON2I);
      echo "<h4>Em ARGON2I: $senhaARGON2I</h4>";
      
   endif; 
?>

<li>As criptografias MD5, SHA256 e SHA512 podem ser descriptografadas aqui: <a href="https://crackstation.net/" target="_blank">Clique aqui</a></li>
<li>A criptografia Base64 pode ser descriptografada aqui: <a href="https://www.base64decode.org/" target="_blank">Clique aqui</a></li>
<li>Já as criptografias Bcrypt e ARGON2I não podem ser descriptografadas</li>
