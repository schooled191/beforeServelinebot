<?php
require "_alldbconnect.php";

$sql = "SELECT process,messageid,image_number FROM apiline WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if ($row == '') {
  $sql = "INSERT INTO `apiline`(`process`, `userid`) VALUES ('$process','$userid')";
  if ($conn->query($sql) === TRUE) {
    echo "insert success";
  } else {
    echo "error:" . $sql . "<br>" . $conn->error;
  }
} elseif ($row['messageid'] != '') {
  if ($row['process'] == 'similarity' && $row['image_number'] == 1) {
    $sql = "UPDATE `apiline` SET `image_number`='cancel' WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
    if ($conn->query($sql) === TRUE) {
      echo "insert success";
    } else {
      echo "error:" . $sql . "<br>" . $conn->error;
    }
    $sql = "INSERT INTO `apiline`(`process`, `userid`) VALUES ('$process','$userid')";
    if ($conn->query($sql) === TRUE) {
      echo "insert success";
    } else {
      echo "error:" . $sql . "<br>" . $conn->error;
    }
  }else {
    $sql = "INSERT INTO `apiline`(`process`, `userid`) VALUES ('$process','$userid')";
    if ($conn->query($sql) === TRUE) {
      echo "insert success";
    } else {
      echo "error:" . $sql . "<br>" . $conn->error;
    }
  }
} elseif ($row['messageid'] == '') {
  $sql = "UPDATE `apiline` SET `process`='$process' WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
  if ($conn->query($sql) === TRUE) {
    echo "insert success";
  } else {
    echo "error:" . $sql . "<br>" . $conn->error;
  }
}

// $conn = new mysqli($servername, $username, $password, $db_name);
// if ($conn->connect_error) {
//     die("Connection failed: ". $conn->connect_error);
// }
// $sql = "INSERT INTO `apiline`(`process`, `userid`) VALUES ('$process','$userid')";
// if ($conn->query($sql) === TRUE) {
//   echo "insert success";
// } else {
//   echo "error:" . $sql . "<br>" . $conn->error;
// }


// $same = "SELECT messageid FROM apiline WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
// $result = mysqli_query($conn,$same);
// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//
// if ($row['messageid'] != null) {
//   $sql = "INSERT INTO `apiline`(`process`, `userid`) VALUES ('$process','$userid')";
//   if ($conn->query($sql) === TRUE) {
//     echo "insert success";
//   } else {
//     echo "error:" . $sql . "<br>" . $conn->error;
//   }
// } elseif ($row['messageid'] == null) {
//   $sql = "UPDATE `apiline` SET `process`='$process' WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
//   if ($conn->query($sql) === TRUE) {
//     echo "insert success";
//   } else {
//     echo "error:" . $sql . "<br>" . $conn->error;
//   }
// } elseif ($row == '') {
//   $sql = "INSERT INTO `apiline`(`process`, `userid`) VALUES ('$process','$userid')";
//   if ($conn->query($sql) === TRUE) {
//     echo "insert success";
//   } else {
//     echo "error:" . $sql . "<br>" . $conn->error;
//   }
// }





 ?>
