<?php
include "connect.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงตามจังหวัด</title>
    <script>
        var httpRequest;
        function send(){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = showResult;

            var prov = document.getElementById("prov").value;
            if(prov=="กรุงเทพมหานคร"){
                prov = "กรุงเทพฯ"
            }
            var url = "prov.php?prov="+prov;
            console.log(prov)

            httpRequest.open("GET",url);
            httpRequest.send();
        }

        function showResult(){
            if(httpRequest.readyState == 4 && httpRequest.status == 200){
                document.getElementById("result").innerHTML = httpRequest.responseText;
            }
        }

    </script>
</head>
<body>
    <div>
        <form action="#" method="GET">
            <label for="prov">เลือกจังหวัด</label>
            <select id="prov" name="prov" onchange="send()">
            <?php
            $url = "https://opend.data.go.th/govspending/bbgfmisprovince?api-key=aycWKKDOnjNyNILewThrGhS7D2lOc8ye";
            $data = file_get_contents($url);
            $province = json_decode($data, true);

            $x = 0;
            // echo "<br>";
            foreach($province["result"] as $value){
                echo "<option>".$value["prov_name"]."</option>";

            }

            ?>
            </select>
        </form>
    </div>
    <div id="result">

    </div>
    
</body>
</html>