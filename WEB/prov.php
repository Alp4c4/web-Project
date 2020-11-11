<?php
include "connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    $stmt = $pdo->prepare('SELECT * FROM `student` WHERE province = ?');
    $stmt->bindParam(1,$_GET["prov"]);
    $stmt->execute();

    ?>
    <div class="citytable">
        <table>
            <thead>
                <tr>
                    <th>std_id</th>
                    <th>Name</th>
                    <th>Province</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $stmt->fetch()){ ?>
                    <tr>
                        <td><?=$row["std_id"]?></td>
                        <td><?=$row["std_name"]?></td>
                        <td><?=$row["province"]?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>
    
</body>
</html>