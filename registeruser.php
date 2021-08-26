<?php
  require 'header.php';
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">

        <a class="navbar-brand" href="registerusers.php">Welcome</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container">

      <div class="jumbotron">
        <h1 class="display-4">Sign Up</h1>
        <p class="lead">Enter user details</p>
      </div>

      <form action="includes\registeruser.inc.php" method="post">
        <div class="form-group">
          <label for="userName">Preffered username</label>
          <input type="text" class="form-control" id="userName" name="userName" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
        <label for="fullName">Full name</label>
        <input type="text" class="form-control" id="fullName" name="fullName" aria-describedby="emailHelp">
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
        <div class="form-group">
          <label for="userPassCon">Confirm password</label>
          <input type="password" class="form-control" id="userPassCon" name="userPassCon" aria-describedby="emailHelp">
        </div>
       <button type="submit" class="btn btn-warning"  name="addUser">Register User</button>

      </form>

    </div>

<?php
require 'footer.php';
?>
