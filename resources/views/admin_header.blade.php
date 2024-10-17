<head>
    <!--font awesome-->
    <!-- <link rel="stylesheet" type="text/css" href="css/all.css"> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   
    </head>
    
    <!--------------------header-------------------->
    <div class="tophead fixed-top">
    
        <!--toggle icon-->
        <span id="sidebar_collapse"><i class="fa fa-bars mt-3"></i></span>
        <!--logo-->
        <d class="logo"><c style="color:#0a3d62;">Car</c>Rental</d>
    
            
        <div class="container ">
    
            <div class="profile_icon">
                <i class="fas fa-user"></i>
                <c onClick="show_profile()">User</c>
            </div>
    
            <!--modal_profile-->
            <div class="popup" id="modal_profile">
                <div class="modal_content text-left">
                           
                    <!--admin_profile start-->
                    <div class="profile text-center">
                        <br>
                        <div class="admin font-weight-bold"> </div>
                        <hr>
                        <div class="name font-weight-bold">
                            <h5>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h5>
                        </div>
                        <hr>
                    </div> <!--admin_profile end-->
                            
                    <ul class="list-unstyled">
                        
                        <li>
                            <a href="{{route ('logout')}}"><i class="fas fa-sign-out-alt mr-2"></i> Log out</a>
                        </li>
                    </ul>
    
                </div> <!--modal_content end-->
            </div> <!--popup end-->
        </div> <!--container end-->
    </div> <!--tophead end-->
    
    
 