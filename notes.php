
$Book = new Book;
echo $Book->Switch();
echo "<br>";

$Furniture = new Furniture;
echo $Furniture->Switch();
echo "<br>";

$DVD = new DVD;
echo $DVD->Switch();


$N = count((array)$_POST($id));


public function Products()
  {
      $sql = "INSERT INTO $this->table(Sku, firstName, Price, Size, Height, Width, Length, Weight) VALUES (:Sku, :firstName, :Price, :Size, :Height, :Width, :Length, :Weight)";

      $stmt = DB::prepare($sql);
      $stmt->bindParam(':Sku', $this->Sku);
      $stmt->bindParam(':firstName', $this->Name);
      $stmt->bindParam(':Price', $this->Price);
      $stmt->bindParam(':Size', $this->Size);
      $stmt->bindParam(':Height', $this->Height);
      $stmt->bindParam(':Width', $this->Width);
      $stmt->bindParam(':Length', $this->Length);
      $stmt->bindParam(':Weight', $this->Weight);
      return $stmt->execute();
  }


  if(!empty($_GET["productType"])) {
    $className = $_GET["productType"];
    $availableProducts = ["DVD", "Furniture", "Book"];
    if (in_array($className, $availableProducts)) {
         $product = new $className;
         echo $product -> Switch();
    }
}






abstract class Type

{

    public abstract function Switch();

}

class DVD extends Type
{
    public function Switch() : string
    {
        return 
        "<label class='col-sm-2 col-form-label'>Size (MB)</label>
        <div class='col-sm-2'>
        <input name = 'size' type='number' class='form-control' id='DVD'>
        </div>";
    }
}

class Furniture extends Type
{
    public function Switch() : string
    {
        return 
        "<label class='col-sm-2 col-form-label'>Height (CM)</label>
        <div class='col-sm-2'>
        <input name = 'height' type='number' class='form-control' id='Furniture'>
        </div>
        <label class='col-sm-2 col-form-label'>Width (CM)</label>
        <div class='col-sm-2'>
        <input name = 'width' type='number' class='form-control' id='Furniture'>
        </div>
        <label class='col-sm-2 col-form-label'>Length (CM)</label>
        <div class='col-sm-2'>
        <input name = 'length' type='number' class='form-control' id='Furniture'>
        </div>";
    }
}

class Book extends Type
{
    public function Switch() : string
    {
        return 
        "<label class='col-sm-2 col-form-label'>Weight (MB)</label>
        <div class='col-sm-2'>
        <input name = 'weight' type='varchar' class='form-control' id='Book'>
        </div>";
    }
}

// if(!empty($_GET["productType"])) {
//     $Type = $_GET["productType"];
//     $availableProducts = ["DVD", "Furniture", "Book"];
//     if (in_array($Type, $availableProducts)) $product = new Type;
// }

?>






<div class="form-group row">
        <label class="col-sm-2 col-form-label">Size (MB)</label>
        <div class="col-sm-2">
          <input name = "size" type="number" class="form-control" id="size">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Height (CM)</label>
        <div class="col-sm-2">
          <input name = "dimension[height]" type="number" class="form-control" id="height">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Width (CM)</label>
        <div class="col-sm-2">
          <input name = "dimension[width]" type="number" class="form-control" id="width">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Length (CM)</label>
        <div class="col-sm-2">
          <input name = "dimension[length]" type="number" class="form-control" id="length">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Weight (CM)</label>
        <div class="col-sm-2">
          <input name = "weight" type="number" class="form-control" id="weight">
        </div>
      </div>
    </form></br>







 <div id="Furniture" class="controls" style="display: none;">
    <label class='col-sm-2 col-form-label'>Height (CM)</label>
    <div class='col-sm-2'>
      <input name='height' type='number' class='form-control' id='height'>
    </div>
    <label class='col-sm-2 col-form-label'>Width (CM)</label>
    <div class='col-sm-2'>
      <input name='width' type='number' class='form-control' id='width'>
    </div>
    <label class='col-sm-2 col-form-label'>Length (CM)</label>
    <div class='col-sm-2'>
      <input name='length' type='number' class='form-control' id='length'>
    </div>
  </div>

  <div id="DVD" class="controls" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Disk</label>
      <div class="col-sm-3">
        <input name="Disk" type="text" class="form-control" id="Disk">
      </div>
    </div>
  </div>

  <div id="Book" class="controls" style="display: none;">
    <label class='col-sm-2 col-form-label'>size</label>
    <div class='col-sm-2'>
      <input name='size' type='number' class='form-control' id='Furniture'>
    </div>
  </div>






  <div id="DVD" class="controls" style="display: none;">
    <label class="col-sm-2 col-form-label">Size (MB)</label>
    <div class="col-sm-2">
      <input name="size" type="number" class="form-control" id="size">
    </div>
  </div>
  <div id="Furniture" class="controls" style="display: none;">
    <label class="col-sm-2 col-form-label">Height (CM)</label>
    <div class="col-sm-2">
      <input name="height" type="number" class="form-control" id="height">
    </div>
    <label class="col-sm-2 col-form-label">Width (CM)</label>
    <div class="col-sm-2">
      <input name="width" type="number" class="form-control" id="width">
    </div>
    <label class="col-sm-2 col-form-label">Length (CM)</label>
    <div class="col-sm-2">
      <input name="length" type="number" class="form-control" id="length">
    </div>
  </div>
  <div id="Book" class="controls" style="display: none;">
    <label class="col-sm-2 col-form-label">Weight (CM)</label>
    <div class="col-sm-2">
      <input name="weight" type="number" class="form-control" id="weight">
    </div>
  </div>









  if (isset($_POST["save"])) {
  $InsertData = null;
  $productType = $_POST["productType"];
  $attribute = "";

  if (!empty($productType)) {
    $availableProducts = ["DVD", "Furniture", "Book"];
    if (in_array($productType , $availableProducts)) {
      $InsertData = new $productType;
      $lisAttribute = $InsertData->getListAttribute();

      foreach ($lisAttribute as $att) {
        $attribute .= isset($_POST[$att]) ? " " . $att . ": " . $_POST[$att] : "";
      }

      $InsertData->setSku(sanatize($_POST['Sku']));
      $InsertData->setName(sanatize($_POST['firstName']));
      $InsertData->setPrice(sanatize($_POST['Price']));
      $InsertData->setType(sanatize($productType));
      $InsertData->setAttribute(sanatize($attribute));

      $post  = new Posts($InsertData->getSku(), $InsertData->getName(), $InsertData->getPrice(), $InsertData->getType(), $InsertData->getAttribute());
      $post->addPost();

      header("location:index.php?status=added");
    }
  }
} else if (isset($_POST['delete'])) {
  $post  = new Posts('', '', 0, '', '');
  $id = $_POST['ProductID'];
  $N = count($id);
  for ($i = 0; $i < $N; $i++) {
    $post->delPost($id[$i]);
  }
  header("location:index.php?status=deleted");
}









class Posts extends Dbh
{
  protected $Sku, $Name, $Price, $Type, $Attributes;

  function __construct($Sku, $Name, $Price, $Type, $Attributes)
  {
    $this->Sku = $Sku;
    $this->Name = $Name;
    $this->Price = $Price;
    $this->Type = $Type;
    $this->Attributes = $Attributes;
  }

  public function add2Post()
  {
    $sql = "INSERT INTO pradd2(Sku, firstName, Price, Type, attribute) VALUES ('" . $this->Sku . "','" . $this->Name . "','" . $this->Price . "','" . $this->Type . "','" . $this->Attributes . "')";
    print($sql);
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
  }

  public function get2Post()
  {
    $sql = "SELECT * FROM pradd2";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function del2Post($id)
  {
    $sql = "DELETE FROM pradd2 WHERE id = ? ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }
}








public function addPost()
    {
        $sql = "INSERT INTO pradd2(Sku, firstName, Price, Size, Dimension, Weight) VALUES ('" . $this->getSku() . "','" . $this->getName() . "','" . $this->getPrice() . "','" . $this->getSize() . "','" . $this->getDimensions() . "', '" . $this->getWeight() . "')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }















    public function addPost($fields)
    {
        $implodeC = implode(', ', array_keys($fields));
        $implodeV = implode(", :", array_keys($fields));
        $sql = "INSERT INTO pradd2($implodeC) VALUES (:" . $implodeV . ")";
        $stmt = $this->connect()->prepare($sql);
        foreach ($fields as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->execute();
    }















    if (empty($Sku)) {
            echo ("This field cannot be empty");
        } else {
            if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $Sku)) {
                echo ("invalid");
            }
        }





        // $classes = [
//   new Furniture($class->getSku(),$class->getName(),$class->getPrice()), 
//   new productMain($class->getSku(),$class->getName(),$class->getPrice()), 
//   new DVD($class->getSku(),$class->getName(),$class->getPrice()), 
//   new Book($class->getSku(),$class->getName(),$class->getPrice())
// ];

// foreach ($classes as $class) {
//   $classes[] = new $class();
// }

// if (isset($_POST["save"])) {

//   $class->setSku(sanatize($_POST['Sku']));
//   $class->setName(sanatize($_POST['firstName']));
//   $class->setPrice(sanatize($_POST['Price']));

//   $class->addPost();

//   header("location:index.php?status=added");
// } 