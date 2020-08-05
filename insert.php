<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <title>Insert Data</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="insert.php">Insert</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view.php">View</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="update.php">Update</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="delete.php">Delete</a>
          </li>
        </ul>
        <span class="navbar-text">
          ©Jithin Isaac, DBIT
        </span>
      </div>
    </nav>

    <h3><span  style="color:green">Insert </span>data into database</h3><br>

    <form method="post">
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputFirstName">First Name</label>
          <input type="text" class="form-control" id="inputFirstName" name="fname"  />
        </div>
        <div class="form-group col-md-3">
          <label for="inputLastName">Last Name</label>
          <input type="text" class="form-control" id="inputLastName" name="lname"/>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputGender">Gender</label>
          <select id="inputGender" class="form-control" name="gender">
            <option selected disabled>Choose...</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputEmail4">Email address</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email"/>
        </div>
      </div>  

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputMobile">Mobile Number (10 digits without country code)</label>
          <input type="tel" class="form-control" pattern="[0-9]{10}" id="inputMobile" placeholder="Mobile" name="mobile" />
        </div>
      </div>

      <button type="submit" class="btn btn-info" name="submit">Submit</button>
    </form>
    <br>
    <div class="form-group">            
      <?php
        include 'sqlconnect.php'; 

        $success = "";
        $failure = "";
        //print_r ($_POST); 
      
        if(array_key_exists("gender",$_POST)){
      
          $insertQuery2 = "INSERT INTO info (fname, lname,gender,email,mobile) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[gender]','$_POST[email]',$_POST[mobile])";

          $insertQuery = "INSERT INTO info (fname, lname,gender,email,mobile) VALUES ('".mysqli_real_escape_string($conn,$_POST["fname"])."','".mysqli_real_escape_string($conn,$_POST["lname"])."','".mysqli_real_escape_string($conn,$_POST["gender"])."','".mysqli_real_escape_string($conn,$_POST["email"])."',".mysqli_real_escape_string($conn,$_POST["mobile"]).")";
          
          $result = mysqli_query($conn,$insertQuery);
      
          if ($result){
            $success = "Data inserted successfully into database!";  
          }else{
            $failure = "Error inserting data into database! (Email & Mobile no. should be unique)";
          }
      
          $conn->close();    
        }
          
        if($success){
          echo "<div class='alert alert-success col-sm-3' role='alert'>".$success."</div>";
        } 
        if($failure){
          echo "<div class='alert alert-danger col-sm-5' role='alert'>".$failure."</div>";
        }            
      ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
                  if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
    </script>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
