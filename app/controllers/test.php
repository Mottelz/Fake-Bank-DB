<html>

<head>
TEST
</head>

<body>
  <?php
  include './app/views/login.php';
  include './app/core/Model.php';
  include './app/models/ClientModel.php';
  echo "THIS IS A TEST PAGE";
  echo getAllClients();
?>
</body>

</html>
