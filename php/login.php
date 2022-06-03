<?php
if(isset($_POST['submit'])){
    $email = trim($_POST['email']);
    $password = $_POST['password'];
loginUser($email, $password);

}

function loginUser($email, $password){
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
    $handle = fopen("../storage/users.csv", "r");
    if ($handle)
    {
        while(($row = fgetcsv($handle)) != FALSE)
        {
            if(($row[1] == $email) && ($row[2] == $password))
            {
                session_start();
                $_SESSION['username'] = $row[0];
                fclose($handle);
                header("Location: ../dashboard.php");
            }
        }
        fclose($handle);
        header("Location: ../forms/login.html");
    }
}

//echo "HANDLE THIS PAGE";
?>

