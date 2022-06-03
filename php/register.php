<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $filename = "../storage/users.csv";
    $handle = fopen($filename, "a");
    if ($handle != FALSE)
    {
        $values = array($username, $email, $password);
        fputcsv($handle, $values);
        fclose($handle);
        echo "User Successfully registered";
    }
    
    // echo "OKAY";
}
//echo "HANDLE THIS PAGE";
?>


