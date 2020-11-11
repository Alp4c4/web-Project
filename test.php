<?php
include "connect.php";
?>
<?php 
                $url = "https://opend.data.go.th/govspending/bbgfmisprovince?api-key=aycWKKDOnjNyNILewThrGhS7D2lOc8ye";
                $data = file_get_contents($url);
                $province = json_decode($data, true);

                $x = 0;
                echo "<br>";
                foreach($province["result"] as $value){
                    // $provarr[$x] = $value["prov_name"];
                    if($value["prov_name"]=="กรุงเทพมหานคร"){
                        $value["prov_name"]="กรุงเทพฯ";
                    }
                    $stmt = $pdo->prepare('SELECT * FROM `student` WHERE province = ?');
                    $stmt->bindParam(1,$value["prov_name"]);
                    $stmt->execute();
                    $count=0;
                    while($row = $stmt->fetch()){
                        $count++;
                    }
                    echo $value["prov_name"]." ".$count."คน<br>";

                    $x++;
                }

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
            var url = "prov.php?prov="+prov;
            // console.log(prov.value)

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
    <!-- <div>
        <form action="#" method="GET">
            <label for="prov">เลือกจังหวัด</label>
            <select id="prov" name="prov" onchange="send()">
            </select>
        </form>
    </div>
    <div id="result">

    </div> -->
    
</body>
</html>