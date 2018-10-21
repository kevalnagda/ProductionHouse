<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AnKeS | TV Shows</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/special_events.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">AnKeS</span> House</h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <section>
        <ul class="cards">
            <?php include('connection.php');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "SELECT * FROM tv_series";

                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<li class="cards__item">
                                <div class="card">
                                    <div class="">
                                        <a href="details.php?id=', urlencode($row["prod_id"]), '">
                                            <img src="./images/'.$row["image"].'");">
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <div class="card__title">'.$row["name"].'</div>
                                        <p class="card__text">'.$row["genre"].'</p>
                                    </div>
                                </div>
                            </li>';
                    }
                } 
            ?>
        </ul>
    </section>

    <footer>
      <p>&copy; 2018 Production House</p>
    </footer>
  </body>
</html>
