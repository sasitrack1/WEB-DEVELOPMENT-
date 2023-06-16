<head>
  <title>SLECT AND VIEW CUSTOMERS</title>
<link rel="stylesheet" type="text/css" href="index.css">
<style>
  body{
           background-image: url("https://media.istockphoto.com/id/1150199713/photo/finger-of-businessman-touching-and-check-mark-icon-face-emoticon-smile-on-dark-background.jpg?s=612x612&w=0&k=20&c=7tUsPBeBoE33GW_8PYQr3_xMV9UYWcYI6zYZgeWkeXQ=");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
  }
    table {
    border-collapse: collapse;
    width: 50%;
  }
  
  th, td {
    border: 1px solid green;
    padding: 10px;
  }
  
  th {
    background-color: orange;
  }
  
  tr:hover {
    background-color: orangered;
  }
  
  .animated-table {
    animation: table-animation 5s infinite linear;
  }
  
  @keyframes table-animation {
    0% {
      transform: scale(1);
    }
  
    50% {
      transform: scale(1.05);

    }
  
    100% {
      transform: scale(1);
    }
  }
  td{
    color: blue;
  }
  /* Define the keyframes for the animation */
  @keyframes buttonAnimation {
          0% { transform: scale(1); }
          50% { transform: scale(1.2); }
          100% { transform: scale(1); }
        }
    
        /* Style the button */
        .animation-button {
          padding: 10px 20px;
          background-color: #4CAF50;
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
        button{
            margin-right: 50px;
        }
        marquee{
  color:red;
  margin:0 auto;
  text-align: center;
}

</style>
</head>
<h1><marquee direction="up">SELECT AND VIEW CUSTOMERS</marquee></h1><br><br><br><br><br>
<table class="animated-table">
  <thead class="animated-table">
    <tr>
      <th>ID</th>
      <th>NAME</th>
    
      <th>BALANCE</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  <?php

// Connect to the database
$conn = new mysqli("localhost", "root", "", "basic banking app");

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get all the data from the table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
  // Loop through the results and output them in an animated table
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $key => $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
  }
} else {
  echo "No results found";
}

// Close the connection
$conn->close();

?>
    </tr>
    <script>
  
</script>
  </tbody>
</table><br><br>
<a href="index.html"> <button class="animation-button">HOME</button></a>
   
   <a href="transfer money.php"style="display: flex; justify-content: flex-end;"> <button class="animation-button">MONEY TRANSFER</button></a>
