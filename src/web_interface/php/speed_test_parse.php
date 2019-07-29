
<?php
function speed()
{
    $output = [];
    $test_speed = exec("speedtest-cli --simple", $output);
    if (empty ($output))
        return ("empty ");
    return (implode(" ", $output));
}


function status()
{
    $output = [];
    exec("uptime", $output);
    $character = str_split($output[0]);
    $res = array();
    foreach ($character as $value) {
        if ($value === ',')
            break;
        $res[] = $value;
    }
    if (empty ($res))
        return ("empty ");
    return ("Up time".implode($res));
}

function online()
{
    $output = [];
    exec("ping google.fr -c 1", $output);
    if ($output[0] === "ping: google.fr: Name or service not known")
        return ("internet: offline");
    else
        return ("<p>internet: online<p>");
}
function interfaces()
{
    $output = [];
    exec("ls /sys/class/net", $output);
    $res = implode("<br>", $output);
    if (empty($res))
        return ("Empty");
    return ("interfaces<br>".$res);
}

function logvar()
{
    $output = [];
    exec("cat /var/log/messages", $output);
    if (empty ($output))
        return ("empty ");
    return (implode(" ", $output));
}

function formStuff($passwd, $email)
{
    if (empty ($passwd) or empty($email))
        return;
    else {
        file_put_contents("connection_information.txt", "email: ".$email."\npassword: ".$passwd);
    }
}
?>
