<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: url('assets/images/temp.gif') no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: Arial, sans-serif;
            height: 90vh;
            margin: 0;
            display: flex;
            justify-content: flex-end; /* Posiciona no canto direito */
            align-items: center; /* Centraliza verticalmente */
        }

        .custom-card {
            background-color: #2a2a2a; /* Fundo cinza médio */
            border: none;
            border-radius: 40px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            width: 100%;
            max-width: 300px;
            margin-right: 110px; /* Espaçamento do canto direito */
        }

        .custom-card h1, .custom-card p {
            text-align: center;
        }

        .form-control {
            background-color: #3a3a3a; /* Fundo do campo cinza escuro */
            color: white;
            border: none;
            border-radius: 5px;
        }

        .form-control:focus {
            background-color: #4a4a4a; /* Fundo cinza ao focar */
            color: white;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
            outline: none;
        }

        .btn-primary {
            background-color: #1e90ff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #0a74da;
            transform: scale(1.05);
        }

        label {
            font-weight: bold;
        }

        .helper-text {
            font-size: 0.8rem;
            color: #d1d1d1;
        }
    </style>

<?php
session_start(); // Inicia a sessão
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Adicione o caminho correto para o Bootstrap -->
</head>
<body>
    <div class="custom-card">
        <h1><?= $slogan ?></h1>
        <p><?= $description ?></p>
        <hr>

        <?php include 'app/register.php'; ?>
        <form action="" method="post">
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" maxlength="15" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group mb-3">
                <label for="passwordRepeat">Confirm Password</label>
                <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat" required>
            </div>
            

            <!-- CAPTCHA Section -->
            <?php
                // Gera um número aleatório para o CAPTCHA
                $captcha_num = rand(1000, 9999);
                $_SESSION['captcha'] = $captcha_num;
            ?>
            <div class="form-group mb-3">
                <label for="captcha">Enter the number: <?= $captcha_num ?></label>
                <input type="text" class="form-control" id="captcha" name="captcha" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <?php
        // Processamento do formulário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica o CAPTCHA
            if ($_POST['captcha'] != $_SESSION['captcha']) {
                echo "<div class='alert alert-danger'>CAPTCHA inválido. Tente novamente.</div>";
            } else {
                // Aqui você pode adicionar a lógica para registrar o usuário
                // Exemplo: salvar no banco de dados
                echo "<div class='alert alert-success'>Registro realizado com sucesso!</div>";
            }
        }
        ?>
    </div>

    <script src="path/to/bootstrap.bundle.js"></script> <!-- Adicione o caminho correto para o Bootstrap JS -->
</body>
</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ícones de Redes Sociais</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .social-icons {
            position: fixed;
            bottom: 210px; /* Distância do fundo */
            right: 20px; /* Distância da direita */
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .social-icons a {
            text-decoration: none;
            color: #fff;
            background-color: #d5006d; /* Cor rosa */
            padding: 15px; /* Área clicável */
            border-radius: 50%;
            transition: background-color 0.3s;
            width: 50px; /* Largura fixa */
            height: 50px; /* Altura fixa */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .social-icons a:hover {
            background-color: #ff4081; /* Cor rosa mais clara ao passar o mouse */
        }
        .social-icons i {
            font-size: 24px; /* Tamanho fixo do ícone */
        }
    </style>
</head>
<body>

    <div class="social-icons">
        <a href="https://www.instagram.com" target="_blank" title="Instagram">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.facebook.com" target="_blank" title="Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://wa.me/5511999999999" target="_blank" title="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

</body>
</html>
