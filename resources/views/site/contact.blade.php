<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>College Compass</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/collegecompass.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/gallery_style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="3c-products.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="3b-products.js"></script>
    <script src="js/gallery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var gallery = new Gallery({
                elements: {
                    slideshow: '#slideshow',
                    currentImage: '#slideshow .current .image',
                    currentCaption: '#slideshow .current.caption',
                    thumbnailAnchor: '#gallery .thumbnails .thumbnail a',
                    previousAnchor: '#slideshow .previous a',
                    nextAnchor: '#slideshow .next a',
                    closeAnchor: '#slideshow .close a',
                }
            });
        });
    </script>
    <style>
        .page-header .pRow {
            margin: 0;
        }
    </style>

</head>

<body>
    <?php
    include('header.php');
    require "2-core.php";
    ?>


    <?php
    $coll_id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "college_finder";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM college_info where cid=$coll_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $colid = $row['cid'];
            $cname = $row['college_name'];
            $abt = $row['about'];
            $city = $row['coll_city'];
            $addr = $row['coll_address'];
            $web = $row['coll_website'];
            $addr = $row['coll_address'];
            $phone = $row['coll_contact'];
            $web = $row['coll_website'];
            $mail = $row['coll_email'];
            $exam = $row['exams_req'];
            $duration = $row['coll_duration'];
            $eligb = $row['eligibility'];
            $proc = $row['admit_proc'];
            $c_stat = $row['course_status'];
            $fees = $row['fees'];
            $courses = $row['courses'];
            $img1 = $row['img1'];
            $img2 = $row['img2'];
            $img3 = $row['img3'];
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <section class="main__middle__container">

        <div class="row blue__line">
            <div class="container text-center">
                <h1 style="font-size:xx-large;"><?php echo "$cname"; ?></h1>
            </div>
        </div>
        <div style="width:100%;height:100%">
            <div id="slideshow">
                <ul class="controls">
                    <li class="control previous">
                        <a href="#" title="Previous">Previous</a>
                    </li>
                    <li class="control next">
                        <a href="#" title="Next">Next</a>
                    </li>
                    <li class="control close">
                        <a href="#" title="Close"></a>
                    </li>
                </ul>
                <div class="current">
                    <div class="image"></div>
                    <p class="caption"></p>
                </div>
            </div>
            <div class="container">


                <div class="col-md-12">

                    <div class="page-header">
                        <!-- star rating -->
                        <?php
                        if (isset($_SESSION["uid"])) {
                            $uid = $_SESSION["uid"]; // FIXED FOR DEMO, USE SESSION USER ID IN YOUR PROJECT


                            // (B) UPDATE STAR RATINGS
                            if (isset($_POST["pid"]) && isset($_POST["stars"])) {
                                if ($_STARS->save($_POST["pid"], $uid, $_POST["stars"])) {
                                    // echo "<div class='note'>Rating Updated</div>";
                                } else {
                                    // echo "<div class='note'>$_STARS->error</div>"; 
                                }
                            }
                        }
                        // (C) GET RATINGS
                        $average = $_STARS->avg(); // AVERAGE RATINGS
                        if (isset($_SESSION["uid"])) {
                            $ratings = $_STARS->get($uid); // RATINGS BY CURRENT USER
                        }
                        // (D) OUTPUT DUMMY PRODUCTS
                        $products = [
                            $colid => ["name" => $cname]
                        ];
                        foreach ($products as $pid => $pdt) { ?>
                            <div class="pRow">
                                <div class="pName"><?= $pdt["name"] ?></div>
                                <div class="pStar" data-pid="<?= $pid ?>"><?php
                                                                        $rate = isset($ratings[$pid]) ? $ratings[$pid] : 0;
                                                                        for ($i = 1; $i <= 5; $i++) {
                                                                            $css = $i <= $rate ? "star" : "star blank";
                                                                            echo "<div class='$css' data-i='$i'></div>";
                                                                        }
                                                                        ?></div>
                                <div class="pStat">
                                    <?= $average[$pid]["avg"] ?> out of 5 stars.
                                </div>
                                <div class="pStat">
                                    <?= $average[$pid]["num"] ?> customer ratings.
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>

                    <!-- (E) HIDDEN FORM TO UPDATE STAR RATING -->
                    <form id="ninForm" method="post" target="_self">
                        <input id="ninPdt" type="hidden" name="pid" />
                        <input id="ninStar" type="hidden" name="stars" />
                    </form>
                    <!-- star rating -->
                    <h3 style="color:#368dc5">About College</h3>

                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><?php echo "$abt" ?></p>

                    <!-- Gallery Colleges -->
                    <div class="page-header">
                        <h3 style="color:#368dc5">Photos Of Institute</h3>
                    </div>

                    <div id="gallery">
                        <ul class="images thumbnails">
                            <li class="image thumbnail">
                                <a href="images/college_images/<?php echo $img1; ?>" title="1.jpg"><img src="images/college_images/<?php echo $img1; ?>" alt="1.jpg" title="1.jpg"></a>
                            </li>
                            <li class="image thumbnail">
                                <a href="images/college_images/<?php echo $img2; ?>" title="2.jpg"><img src="images/college_images/<?php echo $img2; ?>" alt="2.jpg" title="2.jpg"></a>
                            </li>
                            <li class="image thumbnail">
                                <a href="images/college_images/<?php echo $img3; ?>" title="3.jpg"><img src="images/college_images/<?php echo $img3; ?>" alt="3.jpg" title="3.jpg"></a>
                            </li>

                        </ul>
                    </div>

                    <!-- Gallery Colleges -->
                    <div class="page-header">
                        <h3 style="color:#368dc5">Course Duration</h3>
                    </div>
                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><?php echo "$duration" ?></p>


                    <div class="page-header">
                        <h3 style="color:#368dc5">Course Eligibility</h3>
                    </div>
                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><?php echo "$eligb" ?></p>

                    <div class="page-header">
                        <h3 style="color:#368dc5">College Affiliations</h3>
                    </div>
                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><?php echo "$c_stat" ?></p>


                    <div class="page-header">
                        <h3 style="color:#368dc5">Exams Required</h3>
                    </div>
                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><?php echo "$exam" ?></p>


                    <div class="page-header">
                        <h3 style="color:#368dc5">Admission Procedure</h3>
                    </div>
                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><?php echo "$proc" ?></p>

                    <div class="page-header">
                        <h3 style="color:#368dc5">Courses Offered</h3>
                    </div>
                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><?php echo "$courses" ?></p>



                    <div class="page-header">
                        <h3 style="color:#368dc5">Contact Information of <?php echo "$cname"; ?></h3>
                    </div>
                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><span style="color:#2f2e2e;font-weight:bolder;font-size:24px;">Address:</span><?php echo "  $addr" ?>
                    </p>
                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><span style="color:#2f2e2e;font-weight:bolder;font-size:24px;">Website:</span><a href="<?php echo "  $web" ?>" target="_blank"><?php echo "$web" ?></a></p>
                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><span style="color:#2f2e2e;font-weight:bolder;font-size:24px;">E-mail:</span><?php echo "  $mail" ?>
                    </p>
                    <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><span style="color:#2f2e2e;font-weight:bolder;font-size:24px;">Contact
                            No:</span><?php echo "  $phone" ?></p>

                </div>
                <div class="dc_clear"></div>
                <br />
                <br />
                <br />
            </div>
        </div>
        </div>
    </section>

    <?php
    include('footer.php');
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Start work gallery
            $('#Grid').mixitup();
        });
        $('.gallery').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
</body>

</html>