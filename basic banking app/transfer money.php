<!DOCTYPE html>
<html>
<head>
    <title>Transfer Money</title>

</head>
<style>
        marquee{
  color:blue;
  margin:0 auto;
  text-align: center;
}
body
            {
            background-image: url(https://p7.hiclipart.com/preview/495/786/555/electronic-funds-transfer-bank-money-transfer-wire-transfer-bank.jpg);
             background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            }
            .large-button {
  font-size: 20px; /* Adjust the font size according to your preference */
  padding: 10px 20px; /* Adjust the padding to increase the button size */
  color:chartreuse;
}
button{
    width: 100;
  }
  @keyframes buttonAnimation {
          0% { transform: scale(1); }
          50% { transform: scale(1.2); }
          100% { transform: scale(1); }
        }
    
        /* Style the button */
        .animation-button {
          padding: 10px 20px;
          background-color:chartreuse;
          color: white;
          border: none;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
    
        /* Apply the animation to the button */
        .animation-button:hover {
          animation: buttonAnimation 1s infinite;
        }
        .colored-label {
  background-color: yellow; /* Adjust the color as desired */
  padding: 5px; /* Adjust the padding as desired */
}
.colored-input {
  background-color:deeppink; /* Adjust the color as desired */
  padding: 5px; /* Adjust the padding as desired */
}
.colored-select {
  background-color:cyan; /* Adjust the color as desired */
  padding: 5px; /* Adjust the padding as desired */
}
.success-message {
  color: blue;
  font-size: 24px;
}
    </style>
<body>
   

<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basic banking app";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to transfer money
function transferMoney($senderID, $receiverID, $amount) {
    global $conn;

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Fetch sender's balance
        $senderQuery = "SELECT balance FROM users WHERE id = $senderID";
        $senderResult = $conn->query($senderQuery);

        if ($senderResult->num_rows == 0) {
            throw new Exception("Sender user not found");
        }

        $senderData = $senderResult->fetch_assoc();
        $senderBalance = $senderData['balance'];

        if ($senderBalance < $amount) {
            throw new Exception("Insufficient balance");
        }

        // Update sender's balance
        $newSenderBalance = $senderBalance - $amount;
        $updateSenderQuery = "UPDATE users SET balance = $newSenderBalance WHERE id = $senderID";
        $conn->query($updateSenderQuery);

        // Update receiver's balance
        $receiverQuery = "SELECT balance FROM users WHERE id = $receiverID";
        $receiverResult = $conn->query($receiverQuery);

        if ($receiverResult->num_rows == 0) {
            throw new Exception("Receiver user not found");
        }

        $receiverData = $receiverResult->fetch_assoc();
        $receiverBalance = $receiverData['balance'];

        $newReceiverBalance = $receiverBalance + $amount;
        $updateReceiverQuery = "UPDATE users SET balance = $newReceiverBalance WHERE id = $receiverID";
        $conn->query($updateReceiverQuery);

        // // Record the transaction
        // $insertTransactionQuery = "INSERT INTO users (id, name, balance) VALUES ($senderID, 'Transaction', -$amount), ($receiverID, 'Transaction', $amount)";
        // $conn->query($insertTransactionQuery);

        // Commit the transaction
        $conn->commit();
        echo '<p class="success-message">Money transferred successfully!</p>';
      //  echo "Money transferred successfully!";
        header("refresh:1;url=index.html");
        exit();
    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollback();

        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST['submit'])) {
    $senderID = $_POST['sender_id'];
    $receiverID = $_POST['receiver_id'];
    $amount = $_POST['amount'];

    transferMoney($senderID, $receiverID, $amount);
}

$conn->close();
?>

<h2><marquee direction="up">TRANSFER MONEY</marquee></h2><br><br><br>

<form method="post" action="">
    <label for="sender_id"  class="colored-label">Sender ID:</label>
    <input type="text" name="sender_id" id="sender_id" class="colored-input" required><br><br><br>
    <!-- <select name="sender_id" id="sender_id_select" class="colored-select" required>
  <option value="" selected disabled>TAP TO VIEW SENDER ID</option>
  <option value="1">SASIKUMAR ID=10</option>
  <option value="2">RAJARAM ID=11</option>
  <option value="3">JAMUNA ID=12</option>
  <option value="4">PAVITHRA ID=13</option>
  <option value="5">RIDHANYA ID=14</option>
  <option value="6">LAYANIKA ID=15</option>
  <option value="7">SAKTHIVEL ID=16</option>
  <option value="8">NANDHIYA ID=17</option>
  <option value="9">PANDI ID=18</option>
  <option value="10">RAVI ID=19</option>
  <!-- Add more options as needed -->
</select><br><br><br> -->

    <label for="receiver_id"  class="colored-label">Receiver ID:</label>
    <input type="text" name="receiver_id" id="receiver_id" class="colored-input" required><br><br><br>
    <!-- <select name="receiver_id" id="receiver_id_select" class="colored-select" required>
  <option value="" selected disabled>TAP TO VIEW RECEIVER ID</option>
  <option value="1">SASIKUMAR ID=10</option>
  <option value="2">RAJARAM ID=11</option>
  <option value="3">JAMUNA ID=12</option>
  <option value="4">PAVITHRA ID=13</option>
  <option value="5">RIDHANYA ID=14</option>
  <option value="6">LAYANIKA ID=15</option>
  <option value="7">SAKTHIVEL ID=16</option>
  <option value="8">NANDHIYA ID=17</option>
  <option value="9">PANDI ID=18</option>
  <option value="10">RAVI ID=19</option>
  <!-- Add more options as needed -->
</select><br><br><br> -->
    
    <label  font-size: 20px; for="amount"  class="colored-label" >Amount:</label>
    <input type="text" name="amount" id="amount"class="colored-input" required><br>

   <center><input type="submit" name="submit" value="Transfer" class="large-button"></center>
</form>
<a href="index.html"> <button class="animation-button">HOME</button></a>
</body>
</html>
