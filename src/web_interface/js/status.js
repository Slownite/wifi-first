function systemLoad(url, multiFunction)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
            multiFunction(this);
    };
    xhttp.open("POST", url, true);
    xhttp.send();
}

function systemStatus(xml)
{
    document.getElementById("status").innerHTML = xml.reponseText;
}

function speed(xml)
{
    document.getElementById("speed").innerHTML = xml.reponseText;
}

function specialLog(xml)
{
    document.getElementById("Log").innerHTML = xml.reponseText;
}



