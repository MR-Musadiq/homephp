<?php
include('aside.php');
include('connection.php')?>

               <div class="conatainer ml-5 mr-5">
                <h1>Add Category</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                        <input type="text" name="c_name" class="form-control" placeholder="Category name" required><br>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="c:description" class="form-control "  placeholder="Description" require><br>
                        </div>
                        <div class="col-sm-12">
                            <input type="file" name="c:image" class="form-control " placeholder="Description" require>
                        </div>
                        <input type="submit" value="submit" name="add_category">
                    </div>
                </form>
               </div>
               <?php
               if(isset($_POST['add_category'])){
                $name = $_POST['c_name'];
                $description=$_POST['c:description'];
                $image=$_FILES['c:image']['name'];
                $tamp_name=$_FILES['c:image']['tmp_name'];
                $desination="img/".$image;
                $extension=pathinfo($image,PATHINFO_EXTENSION);
                if($extension=='png'|| $extension=="jpeg" || $extension=="jpg" || $extension=="webp" ){
                 if(move_uploaded_file($tamp_name,$desination)){
                    $query=mysqli_query($con,"INSERT INTO `category`( `cname`, `description`, `image`) VALUES ( '$name','   $description',' $image')");
                    if($query){
                        echo"<script>alert('Category added');</script>";
                    }
                    else{
                        echo"<script>alert('Category added error')</script>";
 
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