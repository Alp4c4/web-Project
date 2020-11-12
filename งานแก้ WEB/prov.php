<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $perpage = 10;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $start = ($page - 1) * $perpage;
    // $start = 0;

    $stmt = $pdo->prepare('SELECT * FROM `student` WHERE province = ? limit ? , ?');
    $stmt->bindParam(1,$_GET["prov"]);
    $stmt->bindParam(2,$start,PDO::PARAM_INT);
    $stmt->bindParam(3,$perpage,PDO::PARAM_INT);
    $stmt->execute();

    ?>
    <div class="citytable">
        <table class="c">
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
        <div class="gotomain">
            <a href="checkcity.php">กลับไปยังหน้าหลัก</a>
        </div>
        <?php
        $stmt2 = $pdo->prepare('SELECT * FROM `student` WHERE province = ? ');
        $stmt2->bindParam(1,$_GET["prov"]);
        $stmt2->execute();
        $total_record =0;
        while($row2 = $stmt2->fetch()){
            $total_record++;
        }
        $total_page = ceil($total_record / $perpage);
        // echo $total_record."/".$total_page;
        ?>
        <div class="center">
        <div class="pagination">
                <a href="prov.php?prov=<?=$_GET["prov"]?>&page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
            <?php for($i=1;$i<=$total_page;$i++){ ?><a href="prov.php?prov=<?=$_GET["prov"]?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
                <a href="prov.php?prov=<?=$_GET["prov"]?>&page=<?php echo $total_page;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
        </div>
        </div>
    </div>
</body>
</html>