<style>
  html, body, .full_size {
    height: 100%;
}
body {
      text-align: center;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="Home-Admin.php"><img src="../Css/logo.png" width="50" height="50" alt="Oops.."></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="Home-Admin.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="List-Admin.php">List of Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Register-Admin.php">Register User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Transaction-Admin.php">Expenses and Dues</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Flats
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="Flat-Admin.php?flatId=1">Flat 1</a>
            <a class="dropdown-item" href="Flat-Admin.php?flatId=2">Flat 2</a>
            <a class="dropdown-item" href="Flat-Admin.php?flatId=3">Flat 3</a>
            <a class="dropdown-item" href="Flat-Admin.php?flatId=4">Flat 4</a>
            <a class="dropdown-item" href="Flat-Admin.php?flatId=5">Flat 5</a>
            <a class="dropdown-item" href="Flat-Admin.php?flatId=6">Flat 6</a>
            <a class="dropdown-item" href="Flat-Admin.php?flatId=7">Flat 7</a>
            <a class="dropdown-item" href="Flat-Admin.php?flatId=8">Flat 8</a>
            <a class="dropdown-item" href="Flat-Admin.php?flatId=9">Flat 9</a>
            <a class="dropdown-item" href="Flat-Admin.php?flatId=10">Flat 10</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Login.php">Log-Out</a>
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