<?php
  require 'header.php';
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">

        <a class="navbar-brand" href="users.php">Welcome</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container">

      <div class="jumbotron">
        <h1 class="display-4">Register New Users</h1>
        <p class="lead">Enter login credentials</p>
      </div>

      <form action="includes\users.inc.php" method="post">
        <div class="form-group">
          <label for="userName">Username</label>
          <input type="text" class="form-control" id="userName" name="userName" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
        <label for="userRole">Role</label>
        <select class="form-control" id="userRole" name="userRole">
             <option>Staff</option>
            <option>Manager</option>
          </select>
      </div>
        <div class="form-group">
          <label for="userPass">Password</label>
          <input type="password" class="form-control" id="userPass" name="userPass" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-success"  name="logUser">Log In</button> OR <button type="submit" class="btn btn-warning"  name="registerUser"><a href="registeruser.php">Register User</a></button>

      </form>

    </div>

<?php
require 'footer.php';
?>
