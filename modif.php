<?php
if ($_POST['submit'] === "OK" && $_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && file_exists('../private/passwd'))
{
    if ($_POST['oldpw'] === "" || $_POST['newpw'] === "")
    {
        echo "ERROR\n";
        exit ;
    }
    $users_array = unserialize(file_get_contents('../private/passwd'));
    foreach ($users_array as $key => $value)
    {
        if ($value['login'] === $_POST['login'] && $value['passwd'] === hash('sha256', $_POST['oldpw']))
        {
            $users_array[$key]['passwd'] = hash('sha256', $_POST['newpw']);
            file_put_contents('../private/passwd', serialize($users_array));
            echo "OK\n";
        }
        else
            echo "ERROR\n";
    } 
}
else
    echo "ERROR\n";
?>