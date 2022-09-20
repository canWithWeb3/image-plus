<?php 
  require "libs/functions.php";

  $error = "";
  $array = array();

  if(isset($_POST["save"])){

    if(empty($_POST["txtImage"])){
      $error = "Image Seçmediniz";
    }else{
      $images = $_POST["txtImage"];
      foreach($images as $image){
        if(!empty($image)){
          array_push($array, $image);
        }
      }
    }

    
    // if($imagesClass->addImage($images)){
    //   $error = "Başarılı";
    // }else{
    //   $error = "Başarısız";
    // }

  }
?>

<?php require "views/_html-start.php"; ?>



<div class="container">
  <?php if(!empty($error)): ?>
    <div class="alert alert-danger">
      <?php echo $error; ?>
    </div>
  <?php endif; ?>  
  <?php if(!empty($array)): ?>
    <div class="alert alert-danger">
      <?php print_r($array); ?>
    </div>
  <?php endif; ?>  
  <form class="insert-form" id="insert_form" method="POST">
    <h1>Dynamicaly Add Input Field</h1>
    <div class="input-field">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Image</th>
            <th>Add&Remove</th>
          </tr>
        </thead>
        <tbody id="table_field">
          <tr>
            <td>
              <input type="file" name="txtImage[]" class="form-control">
            </td>
            <td>
              <input type="button" id="add" value="Add" class="btn btn-warning">
            </td>
          </tr>
        </tbody>
      </table>
      <div class="text-center">
        <button type="submit" name="save" class="btn btn-success">Gönder</button>
      </div>
    </div>
  </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function(){
    var html = `
      <tr>
        <td>
          <input type="file" name="txtImage[]" class="form-control">
        </td>
        <td>
          <input type="button" id="remove" value="Remove" class="btn btn-danger">
        </td>
      </tr>
    `
    var x = 1;
    
    $("#add").click(function(){
      $("#table_field").append(html);
    })
    
    $("#table_field").on("click","#remove",function(){
      $(this).closest("tr").remove();
    })
  });

</script>

<?php require "views/_html-finish.php"; ?>