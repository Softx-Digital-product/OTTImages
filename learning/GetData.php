<?php

include 'Copy.php';

if(isset($_POST['copypath'])){

    $src = $_REQUEST['paths'];
    $dst= $_REQUEST['copypath'];

   
    
 custom_copy($src, $dst);
  echo "copied successfully";

    exit;

}


if(isset($_POST['dirname'])){
    
    $path = $_REQUEST['urls'];
    $dirname= $_REQUEST['dirname'];

   //mkdir($path,$dirname);
   echo $fullpath = $path.'/'.$dirname;
   mkdir($fullpath);
//    if (file_exists($fullpath)) 
// {
//     echo "The file $fullpath exists";
// }
// else 
// {
//     echo "The file $fullpath does not exists";
// }
    exit;
}

if(isset($_POST['paths'])){

    $path = $_REQUEST['paths'];
    //chdir($path);
$dirs = scandir($path);
 
$getdirs= getcwd();
$totaldirs =  count($dirs);

?>
<div class='font-weight-bolder'>Total Files => <b><?php echo $totaldirs?></b><div class='float-right'>current dir => <?php echo $getdirs; ?></div></div><br>
 <div class="tables  table-responsive ">

<table class="table table-striped table-bordered  table-hover " id='UserList'>
   <thead class="">
       <tr>
       <th class="text-center"scope="col">SRN</th>
       <th class="text-center"scope="col">File Name</th>
       <th class="text-center"scope="col">Modified Time</th>
       <th class="text-center"scope="col">Size</th>
       <th class="text-center"scope="col">Action</th>
</tr>
<?php
$i=1;
$files = array();

foreach($dirs as $dir){
 $stat = stat($path.'/'.$dir);
//  if(filetype($stat) == 'file'){
//      $icon = '<i class="fa fa-file" aria-hidden="true"></i>';
//  }else{
//      $icon = '<i class="fa fa-folder" aria-hidden="true"></i>';
//  }
$icon='';

 $size = $stat['size']; 
?>
<tr>
 <td class="text-center text-nowrap" scope="row"style="" ><?php echo $i ?></td>
 <td class="text-center text-nowrap" scope="row"style="" ><?php echo $icon." ".$dir ?></td>
 <td class="text-center text-nowrap" scope="row"style="" ><?php echo date('d/m/Y H:i:s', $stat['mtime']) ?></td>
 <td class="text-center text-nowrap" scope="row"style="" ><?php echo $value= formatSizeUnits($size);  ?></td>
 <td class="text-center text-nowrap" scope="row"style="" ><input type='checkbox' ></td>

</tr>
<?php
    $i++;
}
?>

</table>
</div>
<?php


}


?>