<?php 
include_once "conn.php";
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['identity'])){
    header('location: login.php');
	  die();
   

}
// $sql1 = "SELECT * FROM fixed ORDER BY id DESC LIMIT 1";
// $query1=mysqli_query($conn, $sql1);
// $row1=mysqli_fetch_array($query1);
// $fix = $row1['val'];


// //second table
// $sql = "SELECT * FROM flowmeter ORDER BY id DESC LIMIT 1";
// $query=mysqli_query($conn, $sql);
// $row=mysqli_fetch_array($query);
// $flow = $row['flow'];

// $sql = "SELECT * FROM sensor ORDER BY id DESC LIMIT 1";
// $query=mysqli_query($conn, $sql);
// $row=mysqli_fetch_array($query);
// $sensor1 = $row['sensor1'];
// $sensor2 = $row['sensor2'];
// $sensor3 = $row['sensor3'];

$mac_address = exec('getmac');
$sql = "INSERT INTO loginact (mac_address) VALUES ('$mac_address')";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/mm.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
      .zoom {
        /* padding: 50px; */
        transition: transform .2s;
        /* Animation */
        /* width: 200px;
  height: 200px; */
        /* margin: 0 auto; */
      }

      .zoom:hover {
        transform: scale(1.1);
        background-color: #152238;
        color: white;
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
      }

      @font-face {
        font-family: 'myFirstFont';
      }

      body {
        background-color: #F5F7FA;
        font-family: 'myFirstFont';
      }

      @media (min-width: 991.98px) {
        main {
          padding-left: 240px;
        }
      }

      /* Sidebar */
      .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0;
        /* Height of navbar */
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 600;
      }

      @media (max-width: 991.98px) {
        .sidebar {
          width: 100%;
        }
      }

      .sidebar .active {
        border-radius: 5px;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
      }

      .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
      }

      .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #0C9;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
      }

      .my-float {
        margin-top: 22px;
      }

      @media (max-width: 1174px) {
        .fnee {
          display: flex;
          justify-content: center;
        }

        /* CSS that should be displayed if width is equal to or less than 800px goes here */
      }
    </style>
  </head>
  <body>
    <!--Main Navigation-->
    <header>
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-dark text-white">
        <center>
          <img src="./img/xyma-bg-white.png" width="50%"></img>
        </center>
        <div class="position-sticky bg-dark text-white ">
          <div class="list-group list-group-flush mx-4 mt-4 ">
            <a href="#" class="list-group-item list-group-item-action zoom bg-dark text-white">
              <i class="fas fa-tachometer-alt fa-fw me-3 mt-4 "></i>
              <span>Dashboard</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action zoom bg-dark text-white">
              <i class=" fas fa-search-plus fa-fw me-3 mt-4"></i>
              <span>Analytics</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action zoom bg-dark text-white">
              <i class="fas fa-chart-line fa-fw me-3 mt-4"></i>
              <span>Graph</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action zoom bg-dark text-white">
              <i class="fas fa-cog fa-spin fa-fw me-3 mt-4"></i>
              <span>Settings</span>
            </a>
          </div>
        </div>
        <center>
          <p class="mt-5">©️ All rights Reserved by</p>
        </center>
        <center>
          <img src="./img/xyma-bg-white.png" width="50%"></img>
        </center>
      </nav>
      <!-- Sidebar -->
    </header>
    <!--Main Navigation-->
    <!--Main layout-->
    <main style="">
      <div class="container-fluid pt-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <div class="d-flex ms-auto"> <?php 
                                    echo $_SESSION['email'] ;
                                ?> </div>
          </div>
        </nav>
        <br> <?php
                    // $sql = "SELECT * FROM fixed ORDER BY id DESC LIMIT 1;";
                    // $result = mysqli_query($conn, $sql);      
                    // $num = mysqli_fetch_array($result); 
            ?> <div class="container">
          <div class="row">
            <!--box 1-->
            <div class="col-xl-4 col-sm-6 col-12 mt-1">
              <div class="card bg-dark">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="media-body text-left">
                        <h3 class="danger" style="color:#ffff" id="s1">20%</h3>
                        <span style="color:#ffff">Cylinder Number: 1</span>
                      </div>
                        <div class="ms-auto h1 pt-2">
                          <img src="./img/water-level.png" class="img-fluid float-end" alt="Responsive image" width="30%">
                          <!-- <i class="fa-solid fa-flask-round-potion" style="color:#ffff"></i> -->
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card bg-dark mt-2">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h3 class="text-white" id="blinkk">Login Time</h3>
                          <span class="" style="color:#ffff"> <?php echo $_SESSION['time']; ?> </span>
                          <br>
                        </div>
                        <div class="ms-auto h1 pt-2">
                          <i class='far fa-clock' style="color:#ffff"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
            <!--box 2-->
            <!--box 2-->
            <div class="col-xl-8 col-sm-6 col-12 mt-">
              <div id="googleMap" class="mt-auto" style="width:70%;height:300px;border-style: solid;border-color: black;"></div>
            </div>
            <!--inner row close-->
            <br>
          </div>
          <!--col-md-8-->
          <div class="col-md-4">
            <br>
            <div class="row">
              <!---inner row-->
              <!-- <div class="col-xl-12 col-sm-12 col-12 mt-1"><div class="card"><div class="card-content"><div class="card-body"><div class="media d-flex"><div class="media-body text-left"><h3 class="text-dark" id="blinkk">Mac Address</h3><span class="">
																<?php echo $_SESSION['ip']; ?></span><br></div><div class="ms-auto h1 pt-2"><i class='fas fa-wifi'></i></div></div></div></div></div></div> -->
            </div>
            <!--inner row close-->
            <!-- <div class="row"> -->
              <!---inner row-->
              <!-- <div class="col-xl-12 col-sm-12 col-12 px-3">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h3 class="text-dark" id="blinkk">Login Time</h3>
                          <span class=""> <?php echo $_SESSION['time']; ?> </span>
                          <br>
                        </div>
                        <div class="ms-auto h1 pt-2">
                          <i class='far fa-clock'></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!--inner row close-->
          </div>
          <!---col-md-4-- close-->
        </div>
        <!--main row close-->
      </div>
      <a href="#" class="float">
        <!-- <a href="logout.php"><img src="./img/logout.png" class="img-fluid" alt="logout"></a> -->
        <img src="./img/logout.png" class="img-fluid" onclick="logout()" alt="logout">
      </a>
    </main>
    <!-- <script>
		// Retrieve JSON data from URL
        function updateValue() {
		const url = "http://localhost:8888/smart-tray/sensorfix.php"; // Replace with your own URL
		fetch(url)
			.then(response => response.json())
			.then(data => {
				// Get the value from the JSON data
				const value = data['sensor1'];
                const value1 = data['sensor2'];
                const value2 = data['sensor3']; 

				// Update the value inside the h3 tag
				document.getElementById("s1").innerHTML = value+"%";
                document.getElementById("s2").innerHTML = value1+"%";
                document.getElementById("s3").innerHTML = value2+"%";
			})
			.catch(error => console.error(error));
        }
        setInterval(updateValue, 1000);

        function logout() {
  // Send AJAX request to server to end session
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '/logout', true);
  xhr.send();
} -->
    </script>
    <script>
      function myMap() {
        var mapProp = {
          center: new google.maps.LatLng(12.991042, 80.242946),
          zoom: 18,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({
          position: mapProp.center,
          map: map,
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVdH4INc4cNzimGpbZMiRB7Z8ny7ERQFI&callback=myMap"></script>
  </body>
</html>