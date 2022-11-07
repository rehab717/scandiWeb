<?php
require_once "template/header.php";
?>

<?php 

// $users = User::find_by_id(12);
// $users->delete();


// if (isset($_POST['delete'])) {
//     $productData = new User();
//     $id = $_POST['ProductID'];
//     $N = count($id);
//     for ($i = 0; $i < $N; $i++) {
//       $productData->delete($id[$i]);
//     }
//     header("location:index.php?status=deleted");
//   }

?>
  

<?php $users = User::find_all()?>

<form id="product_form" action="" method="POST">
     <div class="row my-5">
          <div class="col-md-6 text-left">
               <h3>PRODUCT LIST</h3>
          </div>
          <div class="col-md-6 text-right">
               <a href="users.php" class="btn btn-primary">
                    ADD
               </a>
               <button type="submit" name="delete" class="btn btn-danger">
                    MASS DELETE
               </Button>
          </div>
     </div>

     <hr style="width:100%">

     <div class="row">
        <?php foreach ($users as $user) :?>
          <div class="col-md-3 mt-4">
               <div class="card">
                    <div class="card-body">
                    <input class=".delete-checkbox" type="checkbox" name="ProductID[]" value="" />
                         <p id='sku' class='text-center' class='card-text'><?php echo $user->sku ?></p>
                         <p id='name' class='text-center' class='card-text'><?php echo $user->name ?></p>
                         <p id='price' class='text-center' class='card-text'><?php echo $user->price ?></p>
                         <p id='attribute' class='text-center' class='card-text'></p>
                    </div>
               </div>
          </div>
        <?php endforeach ;?>
     </div>
</form>



<?php
require_once "template/footer.php"
?>