<?php include('partial-front/menu.php'); ?>

        <!----home section---->
        <section class="home-section" id="home">
            <div class="home-bg"></div>
            <div class="container">
                <div class="row min-vh-100 align-items-center">
                    <div class="home-text">
                        <h1>MUJIGAE KOREAN RESTO</h1>
                        <p>"Receive great food and high quality service"</p>
                        <a href="#our-menu" class="btn btn-default">our menu</a>
                    </div>
                </div>
            </div>
        </section>
 <!------our menu section-->
 <section class="menu-section sec-padding" id="our-menu">
           <div class="container">
               <div class="row">
                   <div class="section-title">
                       <h2 data-title="order now">our menu</h2>

                       <?php
                            $sql ="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 4";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if($count>0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $price = $row['price'];
                                    $image_name = $row['image_name'];
                                    ?>
                                            <div class="menu-item">
                                                <div class="menu-item-tittle">
                                                    <?php
                                                        if ($image_name==""){
                                                            echo "Gambar Tidak Tersedia";
                                                        }else{
                                                            ?>
                                                            <img src="<?php echo SITEURL; ?>image/category/<?php echo $image_name; ?>" alt="menu item thumbnail" height="250px" width="200px">
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                                <h3><?php echo $title; ?></h3>
                                            <div class="menu-item-price">$<?php echo $price; ?></div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }else{
                                echo "Menu Tidak Ditambahkan";
                            }
                       ?>
                   </div>
               </div>
<?php include('partial-front/footer.php'); ?>

