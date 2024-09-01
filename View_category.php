<?php
include('aside.php');
include('connection.php')
?>
<table class="table">
    <h1>View_category</h1>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>image</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $query=mysqli_query($con,"SELECT * FROM `category` ");
            while($row=mysqli_fetch_array($query)){
                ?>
                <td scope="row"><?php echo $row[0]?></td>
                <td><?php echo $row[1]?></td>
                <td> <?php echo $row[2]?></td>
                <td><img src="./img/<?php echo $row[3]?>" alt="" srcset="" height="100px"></td> 
                </tr>

                <?php
            }?>
    </tbody>
</table>
</body>

</html>