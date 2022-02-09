<?php

$conn = new mysqli('localhost','myuser', '123', 'webdev');

if($conn->connect_error){
    die('<h1>Eroare la conectarea la baza de date</h1>');
}
session_start();



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WebDev</title>
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"
          ><img src="img/WDLogo.png" alt="logo" width="100px"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
          <!-- Button trigger modal -->
          <!-- <button
            type="button"
            id="loginbutton"
            class="btn btn-primary ms-auto"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
            Login
          </button> -->
          <a class="ms-auto" href="logout.php.">Logout</a>
        </div>
      </div>
    </nav>
    <div class="text-center">
      <h1 class="text-primary display-1">Welcome to my amazing site!</h1>
    </div>
    <div
      id="carouselExampleControls"
      class="carousel slide"
      data-bs-ride="carousel"
    >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="img/banner1.png"
            class="d-block w-100"
            alt="Missing benner"
          />
        </div>
        <div class="carousel-item">
          <img
            src="img/banner2.png"
            class="d-block w-100"
            alt="Missing benner"
          />
        </div>
        <div class="carousel-item">
          <img
            src="img/banner3.png"
            class="d-block w-100"
            alt="Missing benner"
          />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleControls"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleControls"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container mt-5">
      <div class="row">
        <main class="col-10">
          <h1>This is available ONLY to You!</h1>
          <h2>Logged in as <?php if(isset($_SESSION['userName'])){   echo $_SESSION['userName'] ; }?></h2>
          <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">UserName</th>
      <th scope="col">UserEmail</th>
      <th scope="col">hashedPass</th>
    </tr>
  </thead>
  <tbody>
    <?php
 
         $query1 = mysqli_query($conn , "select * from users_test");
         while($row = mysqli_fetch_array($query1))
         {

    ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['userName']; ?></td>
      <td><?php echo $row['userEmail']; ?></td>
      <td><?php echo $row['hashedPass']; ?></td>
      
    </tr>
    <?php }  ?>
  </tbody>
</table>
</div>
    </div>
    <footer class="container-fluid bg-dark mt-3">
      <div class="container text-white d-flex justify-content-evenly pt-3">
        <p class="col-3">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum
          praesentium iste expedita enim facilis? Deserunt omnis recusandae a
          dicta fugit, odit modi dolores quaerat corrupti optio inventore natus
          quis rem.
        </p>
        <p class="col-3">
          Sapiente aut itaque explicabo ipsa maiores quibusdam fugiat cum natus
          ut asperiores praesentium deleniti, exercitationem sint molestiae
          aperiam fuga sed quis optio veniam dolores adipisci suscipit magnam?
          Alias, dolorem iusto.
        </p>
        <p class="col-3">
          Aperiam, quis a. Iste expedita vero ipsum commodi, odit cum sit
          doloribus voluptatibus sapiente impedit ipsam consectetur autem
          nesciunt harum officia culpa, nihil accusamus mollitia repudiandae
          molestiae iure magnam quis!
        </p>
      </div>
    </footer>

    <!-- LOGIN Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login form</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="login.php">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >User Name</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  name="userName"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Password</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="exampleInputPassword1"
                  name="userPass"
                />
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
