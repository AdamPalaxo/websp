function tryToUploadClanek()
{
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("demo").innerHTML = this.responseText;
            location.reload();
        }
    };
    xhttp.open("POST", "index.php", true);  //synchronne odeslu data formulare a dostanu odpoved resp
    xhttp.send();
    var resp = xhttp.responseText;
}