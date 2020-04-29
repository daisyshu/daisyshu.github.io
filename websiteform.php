<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>

        <?php

        if (empty($_POST)) {
        print "<p>No data was submitted.</p>";
        print "</body></html>";
        exit();
        }

        //Creates function that removes magic escaping, if it's been applied, from values and then removes extra newlines and returns to foil spammers. Thanks Larry Ullman!
        function clear_user_input($value) {
        if (get_magic_quotes_gpc()) $value=stripslashes($value);
        $value= str_replace( "\n", '', trim($value));
        $value= str_replace( "\r", '', $value);
        return $value;
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $formcontent="From: $name \n Message: $message";
        $recipient = "shudaisy@yahoo.com";
        $mailheader = "From: $email \r\n";
        mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
        echo "Thank You!";

        ?>

    </body>
</html>