<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Menu</h1>
        <br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Nama Menu">
                    </td>
                </tr>
                
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>       
                </tr>
                <tr>

                <tr>
                    <td>Image: </td>
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
                        <input type="submit" name="submit" value="Add Catagory" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $price = $_POST['price'];
                if(isset($_POST['featured']))
                {
                  $featured = $_POST['featured']; 
                }else{
                    $featured = "No";
                }

                if(isset($_POST['acvtive']))
                {
                   $active = $_POST['active']; 
                }else{
                    $active = "No";
                }

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    
                    if($image_name !==""){

                        $ext = end(explode('.', $image_name));
                        $image_name = "Menu_Category".rand(0000,9999).".".$ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path ="../image/category/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "Gagal Mengunggah Gambar";
                            header('location:'.SITEURL.'admin/add-category.php');
                            die();
                        }
                    }
                }else{
                    $image_name="";
                }

                $sql = "INSERT INTO tbl_category SET
                    title = '$title',
                    price = $price,
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                ";

                $res = mysqli_query($conn, $sql);
                if($res == true)
                {
                    $_SESSION['add'] = "Menu Berhasil Ditambahkan";
                    header("location:".SITEURL.'admin/manage-category.php');
                }else{
                    $_SESSION['add'] = "Menu Gagal Ditambahkan";
                    header("location:".SITEURL.'admin/manage-category.php');
                }
            }
        ?>


    </div>
</div>
<?php include('partial/footer.php');?>