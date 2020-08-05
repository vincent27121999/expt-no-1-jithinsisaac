<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Delete Data</title>

    <style>
      table {
      border-collapse: collapse;
      width: 50%;
      color: black; 
      font-size: 18px;
      text-align: left;
      } 
      th {
      background-color: darkgrey;
      color: black;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
    </style>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.html">BDA Expt 1</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="index.html"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="insert.php">Insert</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view.php">View</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="update.php">Update</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="delete.php">Delete</a>
          </li>
        </ul>
        <span class="navbar-text">
          ©Jithin Isaac, DBIT
        </span>
      </div>
    </nav>

 
    <h3><span  style="color:red">Delete </span>data from database</h3><br>

    <h4>View Entire Table content (SELECT * FROM table)</h4>
    <form method="post"> 
      <button type="submit" class="btn btn-info" name="submit1">Click here</button>
    </form>
    <br>    

    <?php
      include 'sqlconnect.php';         

      if(isset($_POST['submit1'])){ 
        //print_r ($_POST);
        $selectQuery = "SELECT * FROM info"; 
        $result1 = mysqli_query($conn,$selectQuery);

        if (mysqli_num_rows($result1) > 0) 
        {
          // output data of each row
          echo " <table>
          <tr>
            <th>ID</th> 
            <th>First Name</th>
            <th>Last Name</th> 
            <th>Gender</th>
            <th>Email</th> 
            <th>Mobile</th> 
          </tr>";

          while($row = mysqli_fetch_array($result1)) 
          {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["fname"]. "</td><td>" . $row["lname"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["email"] . "</td><td>" . $row["mobile"] . "</td></tr>";
          }
          echo "</table>";
        }
        else{
        echo "0 results";
        }
        $conn->close();
      }
    ?>
  
    <hr>
    <br> 

    <h4>Delete Row filtered by Mobile Number (DELETE FROM table_name WHERE condition)</h4>
    <form method="post">
      <div class="form-row">
        <div class="form-group col-md-3"> 
          <input type="tel" class="form-control" pattern="[0-9]{10}" id="inputMobile" placeholder="Enter Mobile number" name="mobile" />
        </div>
      </div> 
      <button type="submit" class="btn btn-info" name="submit2">Click here</button>
    </form>
    <br>    

    <?php
      include 'sqlconnect.php';
      $success = "";
      $failure = "";     

      if(array_key_exists("mobile",$_POST)){ 

        //print_r ($_POST);
        $deletewhereQuery = "DELETE FROM info WHERE mobile = $_POST[mobile]";
        $result2 = mysqli_query($conn,$deletewhereQuery);
 
        if ($result2){
          $success = "Data row deleted successfully!";  
        }else{
          $failure = "Error deleting data. Please check mobile number again.";
        }
        $conn->close();
      }

      if($success){
        echo "<div class='alert alert-success col-sm-3' role='alert'>".$success."</div>";
      } 
      if($failure){
        echo "<div class='alert alert-danger col-sm-4' role='alert'>".$failure."</div>";
      }  
    ?>
 
    <hr>
    <br> 

    <h4>Delete all rows in table (DELETE FROM table_name)</h4>
    <form method="post">
      <button type="submit" class="btn btn-info" name="submit3">Click here</button>
    </form>
    <br>    

    <?php
      include 'sqlconnect.php';
      $success = "";
      $failure = "";     

      if(isset($_POST['submit3'])){ 

        //print_r ($_POST);
        $deleteallQuery = "DELETE FROM info";
        $result3 = mysqli_query($conn,$deleteallQuery);
 
        if ($result3){
          $success = "All data rows deleted successfully!";  
        }else{
          $failure = "Error deleting data row.";
        }
        $conn->close();
      }

      if($success){
        echo "<div class='alert alert-success col-sm-3' role='alert'>".$success."</div>";
      } 
      if($failure){
        echo "<div class='alert alert-danger col-sm-4' role='alert'>".$failure."</div>";
      }  
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>