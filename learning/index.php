
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src='https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js'></script>
    <title>File Manager </title>
  </head>
  <body>
    
   <div class="container center mt-4">
   <form method='POST' >
  <div class="form-group">
    <label for="path">Enter path</label>
    <input type="text" class="form-control" name="path" id="path">
    <br>
    <div id="copydiv">
    <label for="path">Enter path Where to Copy</label>
    <input type="text" class="form-control" name="copypath" id="copypath">
</div>
  </div>
  <button type="button" class="btn btn-success" id="submitpath">Go</button>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" id="makedir">Make Dir</button>
  <button type="button" class="btn btn-primary" id="copy">Copy</button>
  <!-- <button type="button" class="btn btn-primary" id="front">Front</button> -->
  <!-- <button type="button" class="btn btn-primary" id="back">Back</button> -->
</form>

</div>

<div class="container mt-4">
    <div id="display">
</div>

</div>
   
<div class=''>
<div class="modal"  id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Make Directory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method='POST' >
  <div class="form-group">
    <label for="path">Enter Directory Name</label>
    <input type="text" class="form-control" name="Dirname" id="Dirname">

  </div>
  
  <button type="button" class="btn btn-danger" id="makedirname">Make Directory</button>
  <!-- <button type="button" class="btn btn-primary" id="front">Front</button> -->
  <!-- <button type="button" class="btn btn-primary" id="back">Back</button> -->
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</div>
<script>
   
    
    $("#makedirname").click(function(){
        var path = $('#path').val();
        var dirname= $('#Dirname').val();
        if(path == ""){
            alert("Enter path first");
            $('#path').focus();
        }else{
            if(dirname == ""){
                alert("Enter Dirctory first");
            $('#Dirname').focus();
            }else{
                $.ajax({
        url :"GetData.php",
        type:"POST",
        cache:false,
        data:{urls:path,dirname:dirname},
        success:function(data){
            $("#submitpath").click();
            }
        });

        }
    }
    });


     $('#copydiv').hide();
    $("#copy").click(function(){
        $('#copydiv').show();
        var path = $('#path').val();
        var copypath = $('#copypath').val();
        
        $.ajax({
        url :"GetData.php",
        type:"POST",
        cache:false,
        data:{paths:path,copypath:copypath},
        success:function(data){
            alert(data);
            //console.log(data);
          // $("#display").html(data)
        }
    });

    });
   
    $("#submitpath").click(function(){
        var path = $('#path').val();
       
        $.ajax({
        url :"GetData.php",
        type:"POST",
        cache:false,
        data:{paths:path},
        success:function(data){
           // alert(data);
            //console.log(data);
           $("#display").html(data);
           
//            $('#UserList').DataTable({
// //        "pagingType":"full_numbers",
//             "bFilter": true,
//             "bInfo": true,
//             "lengthMenu": [
//                 [15, 25, 50, -1],
//                 [15, 25, 50, "All"]
//             ],
//             "responsive": true,
//             language: {
//                 //"search": "_INPUT_",
//                 searchPlaceholder: "Search Documents"
//             }
//         });
          
        }
      });
  
        
});



</script>
   
   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

 
  </body>
</html>