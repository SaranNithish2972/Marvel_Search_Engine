<?php
require './submit1.php';
global $conn;
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
 
}
else{
  header("Location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%; 
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  color: white; 
}

tr:nth-child(even) {
    background-color: #ED1D24;
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE MARVEL SEARCH ENGINE</title>
        <link rel="stylesheet" href="./css/main.css">
    </head>
<body>
    <audio id="myAudio">
        <source src="./assets/IMAGES/Mouseclick.mp3" type="audio/mpeg">
      </audio>
 
    <header>
        <nav class="upper_nav_bar">
            <ul>
                <li class="upper_nav_bar__item "><a href="https://www.marvel.com/" target="_blank" >MARVEL OFFICIAL</a> </li>
                <li class="upper_nav_bar__item "><a href="tutorial.html">HOW TO USE</a></li>
                <li class="upper_nav_bar__item "><a href="loginhome.php">USER HOME</a></li>
                <li class="upper_nav_bar__item "><a href="logout.php">LOG OUT</a></li>           
            </ul>
        </nav>
         <div class="title_container">
            <h1 id="mainTitle" class="title clickable">THE MARVEL<br> <span>SEARCH ENGINE</span></h1>
        </div>
    </header>

    <main>
        <div class="guidebook__control_panel">   
  <?php
    $sql = "SELECT * FROM history where id=$id order by date DESC";
    $result = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($result) > 0) {
        echo"<table>
        <tr><b>
          <th>SEARCH TERM</th>
          <th>DATE AND TIME</th>
          <th>LOCATION</th></b>
        </tr>       ";
      // Output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["searched"]. "</td><td>" . $row["date"]. "</td><td>" . $row["location"]. "</td></tr>";
      }
    } else {
      echo "<h2 class='subtitle'> No Searches Found!! ";
    }
    
    ?>
  </table>     
        </div>
        </template></div>
     </main>
        
    <footer>
                  
           &nbsp;Designed by Adhava & Saran&nbsp;
           <img src="./assets/IMAGES/location.png" height="18"><p id="city"> </p>
    </footer>
    <script src="./js/main.js" type="module"></script>
    <script src="./js/script.js" ></script>
</body>
</html>