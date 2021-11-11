<?php include('partial/menu.php')?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Menu<h1>
        <br>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_category WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                
                $count = mysqli_num_rows($res);
                if($count==1){
                        $rows=mysqli_fetch_assoc($res);
                        $title= $rows['title'];
                        $price= $rows['price'];
                        $current_image= $rows['image_name'];
                        $featured= $rows['featured'];
                        $active= $rows['active'];
                }else{
                    $_SESSION['no-menu-found'] = "Menu Tidak Ditemukan";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }else{
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>       
                </tr>
                <tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image !=""){
                                ?>
                                    <img src="<?php echo SITEURL; ?>image/category/<?php echo $current_image; ?>" width="150px">
                                <?php
                            }else{
                                echo "Tidak ada Gambar yang Ditampilkan";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="yes"> Yes
                        <input type="radio" name="featured" value="no"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="yes"> Yes
                        <input type="radio" name="active" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Save" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $id= $_POST['id'];
                $title= $_POST['title'];
                $price= $_POST['price'];
                $current_image= $_POST['current_image'];
                $featured= $_POST['featured'];
                $active= $_POST['active'];

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];
                    if($image_name !==""){
                        //upload
                        $ext = end(explode('.', $image_name));
                        $image_name = "Menu_Category".rand(0000,9999).".".$ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path ="../image/category/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "Gagal Mengunggah Gambar";
                            header('location:'.SITEURL.'admin/manage-category.php');
                            die();
                        }
                        //remove
                        if($current_image !==""){
                            $remove_path = "../image/category/".$current_image;
                            $remove = unlink($remove_path);
                            if($remove == false)
                            {
                                $_SESSION['failed-remove'] = "Gagal menghapus Gambar";
                                header("location:".SITEURL.'admin/manage-category.php');
                                die();
                            }
                        }
                    }else{
                        $image_name = $current_image;
                    }
                }else{
                    $image_name = $current_image;
                }

                $sql2 = "UPDATE tbl_category SET
                    title = '$title',
                    price = $price,
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);
                if($res2 == true)
                {
                    $_SESSION['update'] = "Menu Berhasil Diperbarui";
                    header("location:".SITEURL.'admin/manage-category.php');
                }else{
                    $_SESSION['update'] = "Menu Gagal Diperbarui";
                    header("location:".SITEURL.'admin/manage-category.php');
                }
            }
        ?>
    </div>
</div>
<?php include('partial/footer.php')?>