<?php
include('aside.php');
include('connection.php')?>

              <form action=""  method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">P:Name</label>
                    <input type="text" name="pname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">P:Price</label>
                    <input type="text" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">P:Quaninty</label>
                    <input type="text" name="quaninty" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">P:image</label>
                    <input type="file" name="pimage" class="form-control" required>
                </div>
                <div class="form-group">
                  <select name="cat" id="">
                    <option value="">Select category</option>
                    <?php
                    $data=mysqli_query($con,"select * from category");
                    while($row=mysqli_fetch_array($data)){?>
                    <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                    <?php }?>
                  </select>
                </div>
                <input type="submit" value="submit" name="add_product" class="btn btn-info">
                <a href="view_product.php"><button class="btn btn-primary">view</button></a>

              </form>
               <?php
               if(isset($_POST['add_product'])){
                $name = $_POST['pname'];
                $price=$_POST['price'];
                $qua=$_POST['quaninty'];
                $cat=$_POST['cat'];
                $image=$_FILES['pimage']['name'];
                $tamp_name=$_FILES['pimage']['tmp_name'];
                $desination="img/".$image;
                $extension=pathinfo($image,PATHINFO_EXTENSION);
                if($extension=='png'|| $extension=="jpeg" || $extension=="jpg" || $extension=="webp" ){
                 if(move_uploaded_file($tamp_name,$desination)){
                    $query=mysqli_query($con,"INSERT INTO `product`(`name`, `price`, `Quaninty`, `image`, `category_id`) 
                    VALUES (' $name',' $price',' $qua','$image',' $cat')");
                    if($query){
                        echo"<script>alert('product added');</script>";
                    }
                    else{
                        echo"<script>alert('product added error')</script>";
 
                    }
                 }   
                 
                }
                else{
                    echo"<script>alert('extension does not match')</script>";

                 }

               }
               ?>
           
</body>

</html>
<?php
include('footer.php')?>