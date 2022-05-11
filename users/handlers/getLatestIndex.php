<?php

$sql="SELECT * FROM news ORDER BY newsID DESC LIMIT 5";

$latestNews=mysqli_query($conn,$sql);
