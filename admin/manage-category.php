<?php include("partial/menu.php"); ?>
<!--main section-->
<div class="main-content">
            <div class="wrapper">
                <h1>Manage Menu</h1>
                <br />
                <!--add menu-->
                <a href="<?php  echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Menu</a> 
                <br /><br />
                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['remove']))
                    {
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['no-menu-found']))
                    {
                        echo $_SESSION['no-menu-found'];
                        unset($_SESSION['no-menu-found']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    
                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                ?>
               
                <table class="tbl-full">
                    <tr>
                        <th>No.</th>
                        <th>Menu</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM tbl_category";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE){
                            $counts = mysqli_num_rows($res);
                            $sn=1;
                            if($counts>0){
                                while($rows=mysqli_fetch_assoc($res)){
                                    $id=$rows['id'];
                                    $title=$rows['title'];
                                    $price=$rows['price'];
                                    $image_name=$rows['image_name'];
                                    $featured=$rows['featured'];
                                    $active=$rows['active'];
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td>
                                            <?php 
                                                if($image_name!=""){
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>image/category/<?php echo $image_name; ?>" width="100px">
                                                    <?php
                                                }else{
                                                    echo "Tidak Ada Gambar Yang Ditampilkan";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else{

                            }
                        }
                    ?>
                    <tr>
                </table>
            </div>
        </div>
<?php include("partial/footer.php"); ?>