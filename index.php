<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>crup_php_oops</title>
      <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <!-- form validity -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

      <!-- jquery cdn link -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <!-- bootstrap css file -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
       <!-- Correct path to Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>


<body >
<nav class="navbar navbar-expand-lg  bg-secondary">
  <div class="container-fluid text-light">
    <a class="navbar-brand" href="#"><i class="fa fa-microchip" aria-hidden="true"></i>
    Wolfmania</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" ></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent  ">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto ">
        <li class="nav-item text-light">
          <a class="nav-link active " aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <h3>All users in database</h3>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6 text-center my-2">
        <button type="button" class="btn btn-success text-light"><i class="fa-sharp fa-regular fa-file-excel"></i> 
        Export to Excel</button>
        </div>
        <div class="col-md-6 my-2  text-center">
       
        <button type="button" class="btn btn-primary  text-light" data-bs-toggle="modal" data-bs-target="#modalbox"><i class="fa-solid fa-user"> </i>
          Add to new Users</button>
        </div>
      </div>
    </div>
  </div>
  
  
  <div  id="divid">
  
     
  
  </div>
  
</div>
<!-- modal use add new user -->
<div class="modal" tabindex="-1" id="modalbox">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" id="formdata" method="post">
      <input type="text" name="fname" id="" class="form-control mb-2" placeholder="first_name">
        <input type="text" name="lname" id="" class="form-control mb-2" placeholder="last_name">
        <input type="text" name="email" id="" class="form-control mb-2" placeholder="email">
        <input type="text" name="phone" id="" class="form-control mb-2" placeholder="mobile_number">
<input type="submit" name="addnewuser" id="clickuser" value="Add new user" class=" btn btn-success">
      </form>
      </div>
      
    </div>
  </div>
</div>
<!-- this model for edit button -->
<div class="modal" tabindex="-1" id="updatemodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" id="updateform" method="post">
        <input type="hidden" name="id" id="id">
      <input type="text" name="fname" id="fname" class="form-control mb-2" >
        <input type="text" name="lname" id="lname" class="form-control mb-2">
        <input type="text" name="email" id="email" class="form-control mb-2" >
        <input type="text" name="phone" id="phone" class="form-control mb-2" >
<input type="submit" name="updatusers" id="updateuser" value="update users" class=" btn btn-success">
      </form>
      </div>
      
    </div>
  </div>
</div>
<!-- show users -->

<div class="modal" tabindex="-1" id="showmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">data show of one users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <h3 id="fname1"></h3>
         <h4 id="lname1"></h4>
         <p id="email1"></p>
         <p id="phone1"></p>

      
      </div>
      
    </div>
  </div>
</div>


<script>
  
  $(document).ready(function(){
    $('table').DataTable();
    function allshowdata(){
      $.ajax({
        url:"action.php",
        type:"POST",
        data:{action:"view"},
        success:function(data){
          // alert(data)    
       $('#divid').html(data);
        }

      })
    }
    
    allshowdata();
    // add new users
    $('#clickuser').click(function(e){
      if($('#formdata')[0].checkValidity()){
      e.preventDefault();
      $.ajax({
        url:"action.php",
        type:"POST",
        data:$("#formdata").serialize()+"&action=insert",
        success:function(data){
Swal.fire({
  title:"user added successfully",
type:"success!"
 })
 $("#modalbox").modal('hide');
 $("#formdata")[0].reset();
 allshowdata();
        }
      })
    }
    })
    // edit the users 
   $("body").on("click",".editBtn",function(e){
    e.preventDefault();
    var id=$(this).attr('id');
    $.ajax({
     url:"action.php",
     type:"POST",
     data:{edit_id:id} ,
     success:function(data){
      response=JSON.parse(data);
     $("#id").val(response.id);
      $("#fname").val(response.first_name);
      $("#lname").val(response.last_name);
      $("#email").val(response.email);
      $("#phone").val(response.phone_number);
      
      
    
     }
    })
   })
  //  update users
  $('#updateuser').click(function(e){
      if($('#updateform')[0].checkValidity()){
      e.preventDefault();
      $.ajax({
        url:"action.php",
        type:"POST",
        data:$("#updateform").serialize()+"&action=update",
        success:function(data){
Swal.fire({
  title:"updated has successfully",
type:"success!"
 })
 $("#updatemodal").modal('hide');
 $("#updateform")[0].reset();
 allshowdata();
        }
      })
    }
    })
    // delete users
    $("body").on("click",".delBtn",function(e){
      e.preventDefault()
       id=$(this).attr('id');
      
          Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then( (result) =>{
  if(result.value){
  $.ajax({
        url:"action.php",
        type:"POST",
        data:{del_id:id},
        success:function(data){
          allshowdata(); 
        }
          
})
}   
      })
    })
    // show the users 
    $("body").on("click",".showBtn",function(e){
       e.preventDefault();
       var id=$(this).attr('id')
     
       $.ajax({
        url:"action.php",
        type:"POST",
        data:{show_id:id},
        success:function(data){
          // console.log(data);
           response=JSON.parse(data);
             
         
         $("#fname1").html(response.first_name);
      $("#lname1").html(response.last_name);
      $("#email1").html(response.email);
      $("#phone1").html(response.phone_number);
        }
       })
    })
  })

  
</script>

      <!--bootsrap js link  -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>