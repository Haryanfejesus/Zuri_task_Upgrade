<?php
if(isset($_POST['submit'])){
    $email = trim($_POST['email']);
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){
    //open file and check if the username exist inside
    //if it does, replace the password
    $exist = FALSE;
    $users = array();
    $handle = fopen("../storage/users.csv", "r");
    if ($handle)
    {
        while(($row = fgetcsv($handle)) != FALSE)
        {
            if($row[1] == $email)
            {
                $exist = TRUE;
                $row[2] = $newpassword;      
            }
            array_push($users, $row);
        }
        fclose($handle);
    }
    
    if ($exist == TRUE)
    {
        $handle = fopen("../storage/users.csv", "w");
        if ($handle)
        {
            foreach ($users as $index => $details) {
                fputcsv($handle, $details);
            }
            fclose($handle);
        }
    }
    else
    {
        echo "User does not exist";
    };
    
    
}
//echo "HANDLE THIS PAGE";

?>

