<?php
session_start();

// Identifiants SuperAdmin fixés dans le code
$superadmin_email = "admin@tabous.tn";
$superadmin_password = "azerty1234"; // peut être encrypté si besoin

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification simple
    if ($email === $superadmin_email && $password === $superadmin_password) {
        $_SESSION['superadmin'] = $email;
        header("Location: liste_factures.php"); // Redirection après connexion
        exit;
    } else {
        $error_message = "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login - Tabous Confection</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link
      rel="icon"
      href="assets/img/tabou.png"
      type="image/x-icon"
    />
  
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    <style>
       
      body {
        background-color: #1a2035;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        font-family: 'Public Sans', sans-serif;
      }
      .login-box {
        background-color: #2a2f4a;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.3);
        width: 100%;
        max-width: 400px;
        color: white;
      }
      .form-control {
        background-color:rgb(255, 255, 255);
        background-color:rgb(255, 255, 255);
        color: white;
      }
      .form-control:focus {
        background-color: #444c64;
        color: white;
      }
      .btn-login {
        background-color: #6c63ff;
        border: none;
        width: 50%;
      }
      .error {
        color: red;
        margin-top: 10px;
        font-size: 14px;
      }
    </style>
  </head>
  <body>
    <div class="login-box">
      <h3 class="text-center mb-4">Login Administrateur</h3>
      <form method="POST" action="login.php">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            required
          />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            required
          />
        </div>
        <?php if (isset($error_message)): ?>
          <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <br>
        <button type="submit" name="login" class="btn btn-login text-white btn-custom-width mx-auto d-block">
  Connexion
</button>
      </form>
    </div>

    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
  </body>
</html>
