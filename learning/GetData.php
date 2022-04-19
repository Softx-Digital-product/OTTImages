<?php

if(isset($_POST['paths'])){

    $path = $_REQUEST['paths'];

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
       <th class="text-center"scope="col">Action</th>
</tr>
<?php
$i=1;
foreach($dirs as $dir){
?>
<tr>
 <td class="text-center text-nowrap" scope="row"style="" ><?php echo $i ?></td>
 <td class="text-center text-nowrap" scope="row"style="" ><?php echo $dir ?></td>
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