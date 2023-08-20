<?php
define("DB_SERVER", "sql211.infinityfree.com");
define("DB_USERNAME", "epiz_32470918");
define("DB_PASSWORD", "lNpXhVnm77Zmac9");
define("DB_NAME", "epiz_32470918_kimun2023");

# Connection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

# Check connection
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
