<style>
  html,
  body,
  .full_size {
    height: 100%;
  }

  body {
    text-align: center;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Home-User.php"><img src="../Css/logo.png" width="50" height="50" alt="Oops.."></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="Home-User.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Update-User.php">Update User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Payment-User.php">Payments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Log-out.php">Log-Out</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-text">
        <?php 
        echo "USER: ";
          echo $_SESSION['fname'];
          echo " ";
          echo $_SESSION['lname'];
          echo " ";
          ?>
          <br>
          <?php
          echo date("F j, Y, g:i a") ;
        ?>
      </li>
    </ul>
  </div>
</nav>

<footer>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</footer>