<?php 

class Images{

  function addImage($images){
    require "ayar.php";

    $query = "";
    foreach($images as $image){
      if(!empty($image)){
        $query .= "INSERT INTO addImages(image) VALUES ('$image');";
      }
    }

    $result = mysqli_multi_query($connection, $query);
    mysqli_close($connection);
    return $result;
  }


}

$imagesClass = new Images();

?>