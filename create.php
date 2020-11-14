<?php
if ($_POST['submit'] === "OK" && $_POST['login'] && $_POST['passwd'])
{
    if ($_POST['passwd'] === "")
    {
        echo "ERROR\n";
        exit ;
    }
    if (!file_exists('../private'))
    {
        mkdir('../private');
    }
    $users_array = unserialize(file_get_contents('../private/passwd'));
    foreach ($users_array as $key => $user)
    {
            if ($user['login'] === $_POST['login'])
            {
                echo "ERROR\n";
                exit ;
            }
     }
    $users_array[] = array('login' => $_POST['login'], 'passwd' => hash('sha256', $_POST['passwd']));
    file_put_contents('../private/passwd', serialize($users_array));
    echo "OK\n";
}
else
    echo "ERROR\n";
?>