

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unzip</title>
</head>
<body>
<form action="./image" method="post" enctype="multipart/form-data">
    <input type="file"  id="fileselector" name="zipped">
    <button name="unzipbtn" type="submit">Unzip</button>
</form>


<script>
    function filecheck()
    {
        var filesize = document.getElementById("fileselector").files[0].size

        var dime = "";
        var output, m = "";

        if(filesize < 1000)
        {
            output = filesize;
            m = (output>1)? "s" :"" ;
            dime = "byte";
        }
        else if(filesize > 1000 && filesize < 1024000)
        {
            output = filesize / 1024;

            dime = "kb";
        }
        else if(filesize > 1024000 && filesize < 1024000000){
            output = filesize / 1024/1024;
            dime = "mb";
        }
        else if(filesize > 5000000000)
        {
            alert(5)
        }

        alert((parseFloat(output).toFixed(0)+ " " +dime + m))
    }
</script>
</body>
</html>