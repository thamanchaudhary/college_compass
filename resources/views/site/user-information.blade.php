@extends('site.layouts.app')
@section('title')
@endsection

@section('content')
<section class="main__middle__container">

    <div class="row icons__blocks three__blocks text-center" style="padding: 10px 0 0px;">
        <div class="page-content">
            <div class="row" style="padding:0px">
                <div class="col-md-2" style="width: 25%">
                    <div class="sidebar content-box" style="display: block;">
                        <ul class="nav" style="text-align: -webkit-left;">
                            <!-- Main menu -->
                            <li class="current"><a href="{{ route('user.detail-information')}}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                            <li><a href="profile_details.php"><i class="glyphicon glyphicon-pencil"></i> Profile</a></li>
                            <li><a href="my_wishlist.php"><i class="glyphicon glyphicon-list"></i>My Wish List</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-stats"></i>My Careers</a></li>
                            <li><a href="recommended_list.php"><i class="glyphicon glyphicon-tasks"></i>Recommended Colleges</a></li>                            
                            <li class="nav-item"><a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">Log Out</a> </li>
                            <form action="{{ route('logout')}}" method="post" id="logout-form" class="d-none">
                                @csrf
                            </form>

                        </ul>
                    </div>
                </div>
                <div class="col-md-10" style="width:70%">
                    <div class="row" style="padding:0px;">
                        <div class="col-md-6">
                            <div class="row" style="padding:0px">
                                <div class="col-md-12">
                                    <div class="content-box-header">
                                        <div class="panel-title">User</div>
                                    </div>
                                    <div class="content-box-large box-with-header">
                                        <p><img src="images/fr-05.jpg" class="img-circle" width="80"></p>
                                        <p><b></b></p>
                                        <div class="row" style="padding:0px;">
                                            <div class="col-md-6">
                                                <p class="small mt">MEMBER SINCE</p>
                                                <p>2024</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="small mt">COLLEGES LIKED </p>
                                                <p>4</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding:0px">
                                <div class="col-md-12">
                                    <div class="content-box-header">
                                        <div class="panel-title">Carrers Interested</div>
                                    </div>
                                    <div class="content-box-large box-with-header">
                                        <p><img src="images/icons/wish.png" class="img-circle" width="80"></p>
                                        <p><b>BSC CSIT</b></p>
                                        <div class="row" style="padding:0px;">
                                            <div class="col-md-6">
                                                <p class="small mt">MEMBER SINCE</p>
                                                <p>2024</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="small mt">CAREERS LIKED </p>
                                                <p>2</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="row" style="padding:0px">
                                <div class="col-md-12">
                                    <div class="content-box-header">
                                        <div class="panel-title">My WishList</div>
                                    </div>
                                    <div class="content-box-large box-with-header">
                                        <p><img src="images/icons/wishlist.png" class="img-circle" width="80"></p>
                                        <p><b>Wishlisted Colleges :</b></p>
                                        <div class="row" style="padding:0px;">
                                            <div class="col-md-6">
                                                <p><a href="my_wishlist.php" class="btn btn-default btn-md" style="margin-left: 125px;margin-top: 10px;">VIEW</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding:0px">
                                <div class="col-md-12">
                                    <div class="content-box-header">
                                        <div class="panel-title">Recommended Colleges</div>
                                    </div>
                                    <div class="content-box-large box-with-header">
                                        <p><img src="images/icons/recom.png" class="img-circle" width="80"></p>
                                        <p><b>Recommended Colleges :2</b></p>
                                        <div class="row" style="padding:0px;">
                                            <div class="col-md-6">
                                                <p><a href="recommended_list.php" class="profile-bt btn btn-default btn-md" style="margin-left: 125px;margin-top: 10px;">VIEW</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding:0px">
                        <div class="col-md-12 panel-warning">
                            <div class="content-box-header panel-heading">
                                <div class="panel-title ">Description Of User</div>


                            </div>
                            <div class="content-box-large box-with-header" style="font-size: medium;">
                                Looking Forward For seeking an admisssion in a good college and excelling in my field of interest .
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
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
@endsection