<?php require 'header.php';
require 'functions.php';
$conn = OpenCon();
if (!isUserLoggedIn($conn)) {
    Header("Location: login.php");
}
$userData = getDatafromTable($conn, "user", ["username" => $_SESSION['username']])[0];
$firstName = $userData['first_name'];
$staffData = getDatafromTable($conn, "staff", ["user_id" => $userData['user_id']])[0];
$shiftData = getDatafromTable($conn, "shift", ["staff_id" => $staffData['staff_id']]);
$shifts = [];
for($i = 0; $i < sizeof($shiftData); $i++){
    for($j = 0; $j < 5; $j++){
        array_push($shifts,$shiftData[$i][$j]);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Group 2" />
    <title>Landing Page - Patient</title>
    <link rel="icon" type="image/hospital-icon" href="../assets/favicon.ico" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
    .gc-calendar table.calendar td {
        height: 105px !important;
    }
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="landing.php">Staff Portal System</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!-- <div class="input-group"> -->
            <!-- : Removed until properly implemented : <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" /> -->
            <!-- <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
            <!-- </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                    <li><a class="dropdown-item" href="billing.php">Billing</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">


        <div id="layoutSidenav_nav">

            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">


                <div class="sb-sidenav-menu">


                    <div class="nav">

                        <div class="sb-sidenav-menu-heading pt-2 pb-0">
                            <a class="nav-link collapsed pb-0" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Core
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                        </div>


                        <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="landing.php">Dashboard</a>
                                <a class="nav-link" href="appointments.php">Appointments</a>
                                <a class="nav-link" href="labs.php">Patient Info</a>
                                <a class="nav-link" href="prescriptions.php">Prescriptions</a>
                            </nav>
                        </div>


                        <div class="sb-sidenav-menu-heading pt-0 pb-0">
                            <a class="nav-link collapsed pb-0" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                        </div>


                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.php">Login</a>
                                <a class="nav-link" href="register.php">Register</a>
                                <a class="nav-link" href="password.php">Forgot Password</a>
                            </nav>
                        </div>


                    </div>


                </div>


                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $firstName; ?>
                </div>
            </nav>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script>
            var shifts = <?php echo json_encode($shiftData); ?> 
            
            $(function (e) {
                var calendar = $("#landing").calendarGC({
                dayBegin: 0,
                prevIcon: '&#x3c;',
                nextIcon: '&#x3e;',
                onPrevMonth: function (e) {
                    console.log("prev");
                    console.log(e);
                },
                onNextMonth: function (e) {
                    console.log("next");
                    console.log(e);
                },
                events: getHoliday(),
                onclickDate: function (e, data) {
                    console.log(e, data);
                }
            });
        });

            function getHoliday() {
                var d = new Date();
                var totalDay = new Date(d.getFullYear(), d.getMonth(), 0).getDate();
                var events = [];
                
                for (var i = 1; i <= totalDay; i++) {
                var newDate = new Date(d.getFullYear(), d.getMonth(), i);
                // See the below jquery for custom events

                // if (newDate.getDay() == 0) {   //if Sunday
                //     events.push({
                //     date: newDate,
                //     eventName: "Sunday free",
                //     className: "badge bg-danger",
                //     onclick(e, data) {
                //         console.log(data);
                //     },
                //     dateColor: "red"
                //     });
                // }
                // if (newDate.getDay() == 6) {   //if Saturday
                //     events.push({
                //     date: newDate,
                //     eventName: "Saturday free",
                //     className: "badge bg-danger",
                //     onclick(e, data) {
                //         console.log(data);
                //     },
                //     dateColor: "red"
                //     });
                // }

                }
                for(i = 0; i < shifts.length; i++){
                    events.push({
                        date: new Date(shifts[i]['start_time']),
                        eventName: "Shift Start",
                        className: "badge bg-primary",
                        onclick(e, data) {
                            console.log(data);
                        },
                        dateColor: "blue"
                        });
                    events.push({
                        date: new Date(shifts[i]['end_time']),
                        eventName: "Shift End",
                        className: "badge bg-primary",
                        onclick(e, data) {
                            console.log(data);
                        },
                        dateColor: "blue"
                    });
                }
                return events;
            }
            return events;
        

        getHoliday()
    </script>
</body>