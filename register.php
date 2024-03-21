<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
</head>
<body>
<center>
<h2>Registration Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<input type="hidden" name="action" value="submit_registration">
<label for="firstname">First Name:</label><br>
<input type="text" id="firstname" name="firstname"><br><br>

<label for="lastname">Last Name:</label><br>
<input type="text" id="lastname" name="lastname"><br><br>

<label for="phonenumber">Phone Number:</label><br>
<input type="text" id="phonenumber" name="phonenumber"><br><br>

<label for="username">Username:</label><br>
<input type="text" id="username" name="username"><br><br>

<label for="email">Email:</label><br>
<input type="email" id="email" name="email"><br><br>

<label for="password">Password:</label><br>
<input type="password" id="password" name="password"><br><br>

<label for="gender">Gender:</label><br>
<select id="gender" name="gender">
<option value="male">Male</option>
<option value="female">Female</option>
<option value="other">Other</option>
</select><br><br>

<input type="submit" value="Submit">
</form>
</center>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['action']) && $_POST['action'] == 'submit_registration') {
$firstname = isset($_POST['firstname']) ? $conn->real_escape_string($_POST['firstname']) : '';
$lastname = isset($_POST['lastname']) ? $conn->real_escape_string($_POST['lastname']) : '';
$phonenumber = isset($_POST['phonenumber']) ? $conn->real_escape_string($_POST['phonenumber']) : '';
$username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : '';
$email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
$password = isset($_POST['password']) ? $conn->real_escape_string($_POST['password']) : '';
$gender = isset($_POST['gender']) ? $conn->real_escape_string($_POST['gender']) : '';

$sql = "INSERT INTO details(firstname, lastname, phonenumber, username, email, password, gender) 
VALUES ('$firstname', '$lastname', '$phonenumber', '$username', '$email', '$password', '$gender')";

if ($conn->query($sql) === TRUE) {
echo "Records inserted successfully.";
} 
else {
echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
}
$conn->close();
?>
</body>
</html>
