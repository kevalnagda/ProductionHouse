<?php 
  include('connection.php');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $prod_id = $_GET['id'];
    $prod_sql = "SELECT * FROM production WHERE prod_id=$prod_id";

    $prod_result = $conn->query($prod_sql);
    
    $movie_sql = "SELECT * FROM movie WHERE prod_id=$prod_id";

    $movie_result = $conn->query($movie_sql);

    $staff_sql = "SELECT * FROM staff WHERE prod_id=$prod_id";

    $staff_result = $conn->query($staff_sql);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AnKeS House | Details</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/description.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">AnKeS</span> House</h1>
        </div>
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <div class="card">
      <?php 
        if ($movie_result->num_rows > 0) {
          while($prod_row = $prod_result->fetch_assoc()) {
            $movie_row = $movie_result->fetch_assoc();
            echo '<img src="./images/'.$movie_row["image"].'" alt="Movie Photograph" style="width:520px;height:430px;float:left;">
            <span><h2>'.$movie_row["name"].'</h2></span>
            <p class="price">'.$movie_row["genre"].'</p>
            <hr>
            <span><h2>Cast</h2></span>
            <p class="price">
              ';
            while($staff_row = $staff_result->fetch_assoc()) {
              echo $staff_row["name"]."<br>";
            }
            echo '</p>
            <p><button>Rating: <span class="rating">'.$prod_row["rating"].'/10</span></button></p></span>
          
            <br>
            <div class="card" style="border:2px solid #d3d3d3; padding: 30px;">
            <span><h2>Synopsis</h2></span>
              <p class="price">'.$prod_row["synopsis"].'</p>
            <h2 style="display: inline;">Duration: 
              <h3 class="price" style="display: inline">'.$movie_row["duration"].' min</h3>
            </h2>
            <br><br>
            <h2 style="display: inline;">Budget: 
              <h3 class="price" style="display: inline">'.$prod_row["budget"].'</h3>
            </h2>
            <br><br>
            <h2 style="display: inline;">Release Date: 
              <h3 class="price" style="display: inline">'.$prod_row["release_date"].'</h3>
            </h2>
            <br><br>
            <span><h2>Reviews</h2></span>
              <p class="price">'.$prod_row["review"].'</p>
            <br>
            </div>'; 
          }
        }   
      ?>
    </div>
    <footer>
      <p>&copy; 2018 Production House</p>
    </footer>
  </body>
</html>
