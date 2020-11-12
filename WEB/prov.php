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
    // $stmt = $pdo->prepare('SELECT * FROM `student` WHERE province = ?');
    // $stmt->bindParam(1,$_GET["prov"]);
    // $stmt->execute();
    $con = mysql_connect('localhost','root','','student');
    $perpage = 5;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    $start = ($page - 1) * $perpage;

    $sql = "select * form student where province = {$_GET['prov']} limit {$start},{$perpage}";
    $query = mysqli_query($con,$sql);

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
                <!-- <?php while($row = $stmt->fetch()){ ?> -->
                    <?php while ($result = mysql_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?=$result["std_id"]?></td>
                        <td><?=$result["std_name"]?></td>
                        <td><?=$result["province"]?></td>
                    </tr>
                    <?php } ?>
                <!-- <?php } ?> -->
            </tbody>
        </table>

        <?php
        $sql2 = "select * from student";
        $query2 = mysqli_query($con, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>

        <nav>
        <ul class="pagination">
            <li>
                <a href="index.php?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++){ ?>
            <li><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <li>
                <a href="index.php?page=<?php echo $total_page;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
        </nav>
        
    </div>
    
</body>
</html>