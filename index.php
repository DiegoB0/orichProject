<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conn = new mysqli('localhost', 'diegob', 'password', 'orich');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid login credentials.";
    }

    // Close the database connection
    $conn->close();	

}
?>
<!Doctype html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title> Login Form </title>
	<link rel='stylesheet' href='styles.css'>
</head>
<body>
	<div class="form-container">
		<form class="login-form" method="POST">
		<h2>Login</h2>
		<div class="input-container">
			<label for="email"> Correo Electronico </label>
			<input type="email" id="email" minlength="4" name="email"  required  />
		</div>
		<div class="input-container"> 
			<label for="password"> Contrasena </label>
			<input type="password" id="password" minlength="4" name="password" required>
		</div>
		<div class="input-container"> 
			<input type="checkbox" id="remember" required>
			<label for="remember"> Recuerdame </label>
		</div>
		<button type="submit">Login</button>
		<div class="login-links">
			<a href="#"> Olvido su contrasena? </a>
		</form> 
	</div>
</body>
</html>
