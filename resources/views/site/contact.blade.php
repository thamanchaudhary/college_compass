@extends('site.layouts.app')
@section('title')
Softech Foundation : Software company in Nepal - Software development - Web development - Mobile Apps development- Software products- Nepal Government Website Development - Outsourcing Nepal
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/site/css/contactus.css')}}">

<link rel="stylesheet" href="{{ asset('assets/site/plugin/wow-master/css/libs/animate.css')}}">
<link rel="stylesheet" href="{{ asset('assets/site/plugin/animate/animate.min.css')}}">

@endsection
@section('content')
<!DOCTYPE html>

<html>

<head>
    <title>All College</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/collegecompass.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet">

    <link href="shortcodes/shortcodes.css" rel="stylesheet">
    <link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
    <link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />


    <script>
        $(document).ready(function() {
            $("#browse").click(function() {
                $("html, body").animate({
                    scrollTop: $("#college-list").offset().top
                }, 2000);
            });
        });
    </script>
    <script language="javascript">
        function function1(id) {
            var id = id;
            //document.writeln(id);
            window.location.href = "college_view.php?id=" + id;
        }

        function function2(id) {
            var id = id;

            //document.writeln(id);
            window.location.href = "wishlist.php?id=" + id;
        }
        window.location = '#college-list';
    </script>
</head>

<body>

    <?php
    include('header.php');
    ?>



    <!-- Side Pane  Filters -->

    <section class="main__middle__container">
        <div class="container">
            <div class="row nothing">
                <aside class="col-md-4" style="width: 27.2222222222222%;">
                    <h3><span>Popular Colleges</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.</p>
                    <img src="images/content__images/pop_ind.jpg" alt="image">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat utSuspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                    <p><a href="#" role="button" class="btn btn-primary">Learn more</a></p>

                    <h3><span>Filters</span></h3>
                    <div class="col-md-12" style="background-color: rgba(175, 177, 179, 0.1);box-shadow: rgba(57, 57, 57, 0.16) 2px 0px 20px;border:rgba(0, 0, 0, 0.1) 0.5px solid;">
                        <form action="allcolleges.php" method="post" name="filter_v">
                            <h3 style="font-size: 20px;margin-top:20px;margin-bottom:15px;">Degree</h3>
                            <hr>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 30px;">Engineering</span>
                            <input type="checkbox" value="engineering" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="degree">
                            <br>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">CSIT</span>
                            <input type="checkbox" value="csit" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="degree">
                            <br>
                            <h3 style="font-size: 20px;margin-top:20px;margin-bottom:15px;">Location</h3>
                            <hr>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 30px; margin-bottom:15px;">Location</span>
                            <select style="width: 65%;height: 30px;font-size: 19px;margin-left:12px;border-radius: 3px;" name="city_option">
                                <option value="all">All</option>
                                <option value="kathmandu">Kathmandu</option>
                                <option value="lalitpur">Lalitpur</option>
                                <option value="bhaktapur">Bhaktapur</option>
                                <option value="pokhara">Pokhara</option>
                                <option value="hetauda">Hetauda</option>

                            </select>

                            <h3 style="font-size: 20px;margin-top:30px;margin-bottom:15px;">Exams Accepted</h3>
                            <hr>
                            <p style="font-size: 18px;font-weight: bold;color: rgba(0, 0, 0, 0.88);margin-top: 0px;margin-bottom: 9px;"><u>For Engineering:</u></p>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">IOE</span>
                            <input type="checkbox" value="IOE" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="exam"><br>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">KUCAT</span>
                            <input type="checkbox" value="KUCAT" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="exam"><br>
                            <p style="font-size: 18px;font-weight: bold;color: rgba(0, 0, 0, 0.88);margin-top: 0px;margin-bottom: 9px;"><u>For CSIT:</u></p>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">IOST</span>
                            <input type="checkbox" value="IOST" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="exam"><br>
                            <br>
                            <h3 style="font-size: 20px;margin-top:30px;margin-bottom:15px;">Degree Preferance</h3>
                            <hr>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">TU Approved</span>
                            <input type="checkbox" value="TU" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="recog"><br>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">KU Approved</span>
                            <input type="checkbox" value="KU" style="width: 25px;position:absolute;height: 18px;padding-left: 10px;right:110px;" name="recog"><br>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">PU Recognized</span>
                            <input type="checkbox" value="PU" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="recog"><br>
                            <h3 style="font-size: 20px;margin-top:20px;margin-bottom:15px;">Mode</h3>
                            <hr>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">Day Time</span>
                            <input type="checkbox" value="csit" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;"><br>
                            <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">Morning Time</span>
                            <input type="checkbox" value="csit" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;"><br>

                            <p><input type="submit" class="btn btn-default btn-md" style="width: 100%;" name="filter_value" value="Apply Filters"></p>
                            <?php
                            function showall()
                            {
                                $_SESSION["filter-options"] = "original";
                                header("Location: allcolleges.php");
                            }
                            if (isset($_SESSION["filter-options"])) {
                                echo "<hr><h5 style='text-align:center;'>Or</h5><hr>";
                                echo "<p><input type='submit' class='btn btn-default btn-md' style='width: 100%;margin-top: 0px;' name='show_all' value='Show All Colleges' onclick=show_all();></p>";
                            }
                            ?>
                        </form>
                    </div>
                </aside>

                <!-- Side Pane  Filters -->




                <section class="col-md-8 main-content" id="college-list" style="width:72.7777777777777%;">
                    <h2>Explore Colleges In Nepal</h2>
                    <p style="font-size: larger;"><strong>Explore the colleges in Nepal based on the filters provided on the left pane by clicking the required options to get the deired colleges below. </strong></p>

                    <?php

                    function display_results($id, $cname, $city, $fees, $duration, $exams, $deg, $img1, $img2, $img3)
                    {

                        echo "<div class='col-md-12' style='background-color: rgba(175, 177, 179, 0.1);box-shadow: rgba(0, 0, 0, 0.29) 2px 0px 20px;margin-right:40px;margin-left: 25px;padding-left: 0px;margin-top: 27px;padding-right: 0px; id='college-list'>";
                        echo "<div class='col-md-4' style='margin-top: 0px;margin-left: -10;margin-left: -15px;'>
      <img src='images/college_images/$img1' alt='pic' class='img-rounded' style='width:100%;height: 195px;border: rgba(255, 255, 255, 0.14) 7.9px solid;'>
    </div>
    <div class='col-md-8' style='padding-left: 0px;'>";
                        echo "<h3 style='font-size: 20px;'>$cname</h3>";
                        if ($deg == "mba") {
                            echo "<p style='margin-top: 10px;'><b style='color:rgb(230, 57, 154);font-size: 18px;'>Duration</b> :$duration</p>
      <p style='margin-top: 5px;'><b style='color:rgb(230, 57, 154);font-size: 18px;'>Exams Required</b> :$exams</p>
      <p style='margin-top: 5px;'><b style='color:rgb(230, 57, 154);font-size: 18px;'>City</b> :$city</p>
      </div>";
                            echo "<div class='col-md-12'' style='background-color: #222222;height: 56px;margin-top: 0.5px;border-radius: 3px;'>";
                            echo "<p>";
                            echo "<form style='margin-top: -19px;'>";
                            echo "<a name='add-wishlist' class='btn btn-default-mba btn-md-mba' style='margin-top: 5px;margin-left: 485px;margin-right: 10px;' id=$id onclick='function2(this.id)'>Add to WishList</a>";
                            echo "<a class='btn btn-default-mba btn-md-mba' style='margin-top: 5px;margin-left: 5px;margin-right: 10px;' id=$id onclick='function1(this.id)'>View College</a>";
                        } else {
                            echo "<p style='margin-top: 10px;'><b style='color: #397adc;font-size: 18px;'>Duration</b> :$duration</p>
      <p style='margin-top: 5px;'><b style='color: #397adc;font-size: 18px;'>Exams Required</b> :$exams</p>
      <p style='margin-top: 5px;'><b style='color: #397adc;font-size: 18px;'>City</b> :$city</p>
      </div>";
                            echo "<div class='col-md-12'' style='background-color: #222222;height: 56px;margin-top: 0.5px;border-radius: 3px;'>";
                            echo "<p>";
                            echo "<form style='margin-top: -19px;'>";
                            echo "<a name='add-wishlist' class='btn btn-default btn-md' style='margin-top: 5px;margin-left: 485px;margin-right: 10px;' id=$id onclick='function2(this.id)'>Add to WishList</a>";
                            echo "<a class='btn btn-default btn-md' style='margin-top: 5px;margin-left: 5px;margin-right: 10px;' id=$id onclick='function1(this.id)'>View College</a>";
                        }

                        echo "</form>";
                        echo "</p></div></div>";
                    }


                    if (isset($_POST["add-wishlist"])) {
                        echo '<script language="javascript">';
                        echo 'alert("College Added To WishList Sucessfully !!")';
                        echo '</script>';
                    }


                    if (isset($_POST["show_all"])) {
                        $_SESSION["filter-options"] = "original";
                    }

                    if (isset($_POST["filter_value"])) {

                        $_SESSION["filter-options"] = "filter";
                    } else if (isset($_POST["search_q"])) {
                        $_SESSION["filter-options"] = "search";
                    }





                    if ((isset($_SESSION["filter-options"]) && ($_SESSION["filter-options"] == "original")) || (!isset($_SESSION["filter-options"]))) {
                        include 'college_list.php';
                        while ($row = $res->fetch_assoc()) {
                            $id = $row['cid'];
                            $cname = $row['college_name'];
                            $city = $row['coll_city'];
                            $fees = $row['fees'];
                            $duration = $row['coll_duration'];
                            $exams = $row['exams_req'];
                            $deg = $row['degree'];
                            $img1 = $row['img1'];
                            $img2 = $row['img2'];
                            $img3 = $row['img3'];
                            display_results($id, $cname, $city, $fees, $duration, $exams, $deg, $img1, $img2, $img3);
                        }
                        echo "<div id='pagingg'>";
                        echo pagination($statement, $limit, $page);
                        echo "</div>";
                        $conn->close();
                    }


                    if (isset($_SESSION["filter-options"]) && ($_SESSION["filter-options"] == "search")) {
                        include 'search_query.php';
                        while ($row = $res->fetch_assoc()) {
                            $id = $row['cid'];
                            $cname = $row['college_name'];
                            $city = $row['coll_city'];
                            $fees = $row['fees'];
                            $duration = $row['coll_duration'];
                            $exams = $row['exams_req'];
                            $deg = $row['degree'];
                            $img1 = $row['img1'];
                            $img2 = $row['img2'];
                            $img3 = $row['img3'];
                            display_results($id, $cname, $city, $fees, $duration, $exams, $deg, $img1, $img2, $img3);
                        }

                        echo "<div id='pagingg' >";
                        echo pagination($statement, $limit, $page);
                        echo "1111";
                        echo "</div>";
                        $conn->close();
                    }


                    if (isset($_SESSION["filter-options"]) && ($_SESSION["filter-options"] == "filter")) {

                        include 'filter_list.php';
                        echo $statement;
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['cid'];
                            $cname = $row['college_name'];
                            $city = $row['coll_city'];
                            $fees = $row['fees'];
                            $duration = $row['coll_duration'];
                            $exams = $row['exams_req'];
                            $deg = $row['degree'];
                            $img1 = $row['img1'];
                            $img2 = $row['img2'];
                            $img3 = $row['img3'];
                            display_results($id, $cname, $city, $fees, $duration, $exams, $deg, $img1, $img2, $img3);
                        }
                        echo "<div id='pagingg' >";
                        echo pagination($statement, $limit, $page);
                        echo "2222";
                        echo "</div>";
                        $conn->close();
                    }


                    ?>


                </section>
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
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
@endsection
@section('js')
<script src="{{ asset('assets/site/plugin/wow-master/js/wow.min.js')}}"></script>
<script src="{{ asset('assets/site/plugin/animate/main.mjs')}}"></script>

<script>
    wow = new WOW({
        boxClass: 'wow', // default
        animateClass: 'animated', // default
        offset: 0, // default
        mobile: true, // default
        live: true // default
    })
    wow.init();
</script>
@endsection