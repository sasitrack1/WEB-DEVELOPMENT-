<html>
  <title>ALL CUDTOMERS</title>
    <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>

        <style>
            body
            {
            background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfneFtOL1_4mtjGsduw2-r8NxYt5oW4ZvrQw&usqp=CAU);
             background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            }
th{
    border-color: chartreuse;
}
table {
    border-collapse: collapse;
    width: 50%;
  }
  
  th, td {
    border: 1px salmon;
    padding: 10px;
  }
  
  th {
    background-color: greenyellow;
  }
  
  tr:hover {
    background-color: brown;
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
    color:deeppink;
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
marquee{
  color: darkmagenta;
  margin:0 auto;
  text-align: center;
}

    </style>
    <h2><marquee direction="up">CUSTOMERS NAMES</marquee></h2><br><br><br>
    <table>
    
       <th>CUSTOMERS</th>
       
      <tr><td>SASIKUMAR</td></tr>
      <tr><td>RAJARAM</td></tr>
      <tr><td>JAMUNA</td></tr>
      <tr><td>PAVITHRA</td></tr>
      <tr><td>RIDHANYA</td></tr>
      <tr><td>LAYANIKA</td></tr>
      <tr><td>SAKTHIVEL</td></tr>
      <tr><td>NANDHIYA</td></tr>
      <tr><td>SUNDHAR</td></tr>
      <tr><td>RAVI</td></tr>
    
    </table><br><br><br>
   <a href="index.html"> <button class="animation-button">HOME</button></a>
   
   <a href="select and view.php" style="display: flex; justify-content: flex-end;"> <button class="animation-button">SELECT AND VIEW</button></a>



    </body>
    
</html>
