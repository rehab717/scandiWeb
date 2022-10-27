<?php 

if (isset($_POST['delete'])) {
    $productData = new User();
    $id = $_POST['ProductID'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
      $productData->delete($id[$i]);
    }
    header("location:index.php?status=deleted");
  }

?>
  