<?php include("partial/menu.php"); ?>
        <!--main section-->
        <div class="main-content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>
                <?php
                    if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                    }
                ?>
                <div class="col-4 text-center">
                    <h1>2</h1>
                    <br />
                    Catagories
                </div>
                <div class="col-4 text-center">
                    <h1>2</h1>
                    <br />
                    Catagories
                </div>
                <div class="col-4 text-center">
                    <h1>2</h1>
                    <br />
                    Catagories
                </div>
                <div class="clearfix">

                </div>
            </div>
        </div>
 <?php include("partial/footer.php")?>