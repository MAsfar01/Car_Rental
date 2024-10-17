@include('admin_header');
<!DOCTYPE html>
<html>

<head>
    <!--title-->
    <title>Car_Rental</title>
    <!--meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap css-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--font awesome-->
    <link rel="stylesheet" href="FAIcon/css/all.css">
    <!--external css-->
    <link rel="stylesheet" type="text/css" href="css/admin_header.css">
    <link rel="stylesheet" type="text/css" href="css/common_body(custom).css">
    <link rel="stylesheet" type="text/css" href="css/admin_dash(mycustom).css">
    <link rel="stylesheet" type="text/css" href="css/add_employee(custom).css">
    <link rel="stylesheet" type="text/css" href="css/view_employee(custom).css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


</head>

<body>

    <!--------------------class="wrapper"-------------------->
    <div class="wrapper">
        <!---------------vertical navbar--------------->
        <div class="vertical-nav" id="sidebar">
            <div class="vertical_nav_heading text-center mt-4">ADMIN</div>
            <hr>
            <div class="vertical-nav-menu">
                <ul class="list-unstyled">
                    <li class="nav-item active">
                        <a href="/welcome" class="nav-link active ">
                            <i class="fas fa-th-large mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/users" class="nav-link">
                            <i class="fas fa-users mr-2" style="font-size:15pt;"></i> Users
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="/millage_plans" class="nav-link ">
                            <i class="fas fa-clone mr-2" style="font-size:15pt;"></i> Millage Plans
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link accordion-toggle">
                            <i class="fas fa-tasks mr-2" style="font-size:15pt;"></i> Manage Cars
                            <i class="fas fa-chevron-down ml-auto"></i>
                        </a>
                        <ul class="list-unstyled collapse" id="manageCarsSubmenu">
                            <li class="nav-item">
                                <a href="{{ route('add_car') }}" class="nav-link">
                                    <i class="fas fa-plus mr-2" style="font-size:15pt;"></i> Add Car
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/view_car" class="nav-link">
                                    <i class="fas fa-eye mr-2" style="font-size:15pt;"></i> View Car
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div> <!--vertical-nav-menu-->
        </div> <!--vertical-nav end-->

        @yield('content')
    </div> <!--wrapper end-->


    <script>
        // Show Profile Modal
        function show_profile() {
            document.getElementById('modal_profile').style.display = 'block';
        }

        $(document).ready(function() {
            // Toggle Sidebar
            $('#sidebar_collapse').on('click', function() {
                $('#sidebar,#content').toggleClass('active');
            });



            // Hide Profile Modal on Click Outside
            window.addEventListener('mouseup', function(event) {
                var box = document.getElementById('modal_profile');
                if (event.target != box && event.target.parentNode != box) {
                    box.style.display = 'none';
                }
            });

            // Hide Profile Modal on Window Click
            window.onclick = function(event) {
                var modal = document.getElementById("modal_profile");
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            // Highlight Current Page Link
            var currentPath = window.location.pathname;
            $('.nav-item a').each(function() {
                if ($(this).attr('href') === currentPath) {
                    // Remove active class from all li and a elements
                    $('.nav-item').removeClass('active');
                    $('.nav-item a').removeClass('active');

                    // Add active class to the current link and its parent li
                    $(this).addClass('active');
                    $(this).closest('.nav-item').addClass('active');
                }
            });

            // Accordion Toggle Handling
            $('.accordion-toggle').on('click', function(e) {
                e.preventDefault();

                var $this = $(this);

                // Remove active class from all menu items and close all accordions
                $('.nav-item').removeClass('active');
                $('.collapse').slideUp();

                // Add active class to the current item and open its submenu
                $this.closest('.nav-item').addClass('active');
                var $submenu = $this.next('.collapse');
                $submenu.slideToggle();
            });

            // Ensure Accordion is Open if Current Page is Inside
            $('.nav-item a').each(function() {
                if ($(this).attr('href') === currentPath) {
                    // Add active class to the parent nav-item
                    $(this).closest('.nav-item').addClass('active');
                    // Show submenu if it has the active class
                    $(this).closest('.nav-item').find('.collapse').slideDown();
                }
            });
        });
    </script>




</body>

</html>
