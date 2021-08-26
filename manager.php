<?php
  require 'header.php';
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">

        <a class="navbar-brand" href="register.php">Welcome</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container">

      <div class="jumbotron">
        <h1 class="display-4">Registration Interface</h1>
        <p class="lead">Enter customer and card details</p>
      </div>

      <form action="includes\register.inc.php" method="post">
        <div class="form-group">
          <label for="cardHolderNumber">Account Number</label>
          <input type="text" class="form-control" name="cardHolderNumber" id="cardHolderNumber" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="cardHolderFirst">First Name</label>
          <input type="text" class="form-control" name="cardHolderFirst" id="cardHolderFirst" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="cardHolderLast">Last Name</label>
          <input type="text" class="form-control" name="cardHolderLast" id="cardHolderLast" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="cardNo">Card Number</label>
          <input type="text" class="form-control" name="cardNo"id="cardNo" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="cardExpiry">Expiry Date</label>
          <input type="text" class="form-control" name="cardExpiry" id="cardExpiry" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="cardCVV">CVV</label>
          <input type="password" class="form-control" name="cardCVV" id="cardCVV">
        </div>
        <button type="submit" class="btn btn-success"  name="addCard">Submit</button>
      </form>
      <br>
      <br>

    </div>
        <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">View Interface</h1>
            <p class="lead">USER ROLES</p>
            <table class="table table-stripped table-dark">
               <thead>
                <tr>
                  <th scope="col">Username</th>
                  <th scope="col">Role</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require "includes\dbh.inc.php";

                $sqlRoles = "SELECT * FROM vault_privileges";
                $resultRoles = $conn->query($sqlRoles);
                if($resultRoles->num_rows > 0){
                  while ($rowRoles = $resultRoles->fetch_assoc()) {
                    echo "<tr><td>" . $rowRoles["user_username"]. "</td><td>" . $rowRoles["user_role"] . "</td></tr>"; 
                  }
                }else {
                  echo "0 results";
                }
                $conn->close();
                ?>

              
              </tbody>
            </table>
            <p class="lead">CREDIT CARD DETAILS</p>
            <table class="table table-stripped">
               <thead>
                <tr>
                  <th scope="col">Card Number</th>
                  <th scope="col">Acc/No</th>
                  <th scope="col">CVV</th>
                  <th scope="col">Expiry Date</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require "includes\dbh.inc.php";
                $key_str = 'pass123';


                $sqlCards = "SELECT AES_DECRYPT(card_number,'pass123') as decrypt_card, card_expiry_date, AES_DECRYPT(card_cvv,'pass123') as decrypt_cvv, AES_DECRYPT(cardholder_account_no,'pass123') as cardholder_value FROM card_details";
                $resultCards = $conn->query($sqlCards);
                if($resultCards->num_rows > 0){
                  while ($rowCards = $resultCards->fetch_assoc()) {
                      echo "<tr><td>" . $rowCards["decrypt_card"]. "</td><td>" . $rowCards["card_expiry_date"] . "</td><td>".$rowCards["decrypt_cvv"]."</td><td>".$rowCards["cardholder_value"]."</td></tr>"; 
                  }
                }else {
                  echo "0 results";
                }
                $conn->close();
                ?>

              
              </tbody>
            </table>
            <p class="lead">CUSTOMER DETAILS</p>
            <table class="table table-stripped table-dark">
               <thead>
                <tr>
                  <th scope="col">Card Number</th>
                  <th scope="col">Account Number</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require "includes\dbh.inc.php";
                $sqlCustomer = "SELECT AES_DECRYPT(cardholder_account_no,'pass123') as cardholder_value,cardholder_first_name,cardholder_last_name,AES_DECRYPT(card_number,'pass123') as card_value FROM vault_information";
                $resultCustomer = $conn->query($sqlCustomer);
                if($resultCustomer->num_rows > 0){
                  while ($rowCustomer = $resultCustomer->fetch_assoc()) {
                    echo "<tr><td>" . $rowCustomer["card_value"]. "</td><td>" . $rowCustomer["cardholder_value"] . "</td><td>".$rowCustomer["cardholder_first_name"]."</td><td>".$rowCustomer["cardholder_last_name"]."</td></tr>"; 
                  }
                }else {
                  echo "0 results";
                }
                $conn->close();
                ?>

              
              </tbody>
            </table>
        </div>
    </div>
    <div class="container">

      <div class="jumbotron">
        <h1 class="display-4">Delete Interface</h1>
        <p class="lead">Search and delete customer & card details</p>
      </div>

      <form action="includes\manager.inc.php" method="post">
        <div class="form-group">
          <label for="cardHolderNumber1">Enter a customer's account Number</label>
          <input type="text" class="form-control" name="cardHolderNumber1" id="cardHolderNumber1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-danger"  name="delCustomer">Delete Customer</button>

        <div class="form-group">
          <label for="cardNo1">Enter a credit card Number</label>
          <input type="text" class="form-control" name="cardNo1"id="cardNo1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-danger"  name="delCard">Delete Card</button>

        <div class="form-group">
          <label for="userName">Enter a username</label>
          <input type="text" class="form-control" name="userName"id="userName" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-danger"  name="delUser">Delete Card</button>

      </form>

      <hr>
    </div>


<?php
require 'footer.php';
?>
