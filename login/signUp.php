    <?php
    /*
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'path/to/PHPMailer/src/Exception.php';
    require 'path/to/PHPMailer/src/PHPMailer.php';
    require 'path/to/PHPMailer/src/SMTP.php';*/
    ?>

    <form method="post" action="signUp.php">
        <div class="form-group">
            <label for="exampleInputEmail1">Pseudo</label>
            <input type="text" maxlength="10" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="pseudo" name="Pseudo">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="Password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="ConfirmPassword" placeholder="confirmPassword">
            <small id="emailHelp" class="form-text text-muted"><a href="login.php">You have an account?</a></small>
        </div>
        <script>
            function WrongPassword(event) {
                // Prevent the default form submit action if using AJAX
                event.preventDefault();

                var password = document.getElementById("Password");
                var confirmPassword = document.getElementById("ConfirmPassword");
                var passwordVal = password.value;
                var confirmPasswordVal = confirmPassword.value;

                // Reset validation first
                password.classList.remove('is-invalid');
                confirmPassword.classList.remove('is-invalid');

                if (passwordVal !== confirmPasswordVal) {
                    // Add Bootstrap's 'is-invalid' class to show the error
                    password.classList.add('is-invalid');
                    confirmPassword.classList.add('is-invalid');
                } else {
                    // If using traditional form submission:
                    // document.getElementById('yourFormId').submit();

                    // If using AJAX:
                    $.ajax({
                        url: 'SignUp.php', // The file where you want to send the data
                        type: 'post',
                        data: {
                            password: passwordVal // Send the password or any other data you need
                        },
                        success: function(response) {
                            <?php
                            $pseudo = htmlspecialchars($_POST['Pseudo']);
                            $email = htmlspecialchars($_POST['Email']);
                            $password = htmlspecialchars($_POST['Password']);
                            $HashedPassword = password_hash($password, PASSWORD_DEFAULT); //hash the password
                            // La requête avec des marqueurs de paramètres
                            $sql = "INSERT INTO utilisateurs (pseudo, adresse_mail, mot_de_passe) VALUES (:pseudo, :email, :passwordHashed)";

                            // Paramètres à lier à la requête
                            $parameters = [
                                ':pseudo' => $pseudo,
                                ':email' => $email,
                                ':passwordHashed' => $HashedPassword
                            ];

                            // Utilisation de la fonction BDD_request avec des paramètres
                            $result = BDD_request($sql, $parameters);
                            ?>
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                        }
                    });
                }
            }
        </script>

        <button type="submit" class="btn btn-primary" onclick="WrongPassword()">Submit</button>
    </form>

