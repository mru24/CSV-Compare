<!-- code,description,width,depth,height,price -->

<?php
// Data from file 1
$file_data = array();

// Matches that are in both files
$matches = array();

// id,name,width,depth,height,price
$handle = fopen("1.csv", "r");
while (list($id, $name, $width, $depth, $height, $price) = fgetcsv($handle, 1000))
{
   $file_data[] = strtolower(preg_replace('/\s/', '', $id));
}
fclose($handle);

// Now check file 2 for matches
$handle = fopen("2.csv", "r");
// id,name,width,depth,height,price
while (list($id, $name, $width, $depth, $height, $price) = fgetcsv($handle, 1000))
{
   if(in_array(strtolower(preg_replace('/\s/', '', $id)), $file_data))
   {
       $ids[] = strtolower(preg_replace('/\s/', '', $id));
       $prices[] = strtolower(preg_replace('/\s/', '', $price));
   }
}
fclose($handle);


print_r($ids);
print_r($prices);
echo '<br> ************* <br>';


foreach ($prices as $key => $price) {
  $price = $price + 100;
  echo strtoupper($ids[$key]) . ' - ' . $price . '<br>';
}

// foreach ($matches as $key => $match) {
//   echo strtoupper($match) . ' - ' . $prices[$key] . '<br>';
// }

?>
