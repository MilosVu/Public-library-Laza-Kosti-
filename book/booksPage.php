
<html>
 <head>
  <title>Book page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
  <script type="text/javascript" src="editRecords.js"></script>
 

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" href="img/favicon.png">
  <link rel="stylesheet" href="../styles.css">
 </head>
 <body>

  <!-- Navigation -->
  <!--
  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
  <div class="container-fluid">
      <a class="navbar-brand" href="../index.php"><img src="../img/logoNov.png" width="100px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../user/userPage.php">Users</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Books</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../borrowings/borrowingsPage.php">Borrowings</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link colour=red" href="#">Sing Up</a>
              </li>
          </ul>
      </div>
  </div>
  </nav>
-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="containerNavbar" colour="red">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=".."><img src="../img/logoNov.png" width="100px"></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav pull-right">
        <li><a href="..">Home</a></li>
        <li><a href="../user/userPage.php">Users</a></li>
        <li class="active"><a href="#">Books</a></li>
        <li><a href="../borrowings/borrowingsPage.php">Borrowings</a></li>
        <li><a href="#">About</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

    <!-- Table -->
  <div class="container-fluid padding">
    <div class="container">
    <br>
    <br>
    <br>
    <h1>Book Page</h1>
    <br>
    <div class="panel panel-default">
      <div class="panel-heading">
      <div class="row">
        <div class="col-md-6">
        <h3 class="panel-title">Book Data</h3>
        </div>
        <div class="col-md-6" align="right">
        <button type="button" name="add_data" id="add_data" class="btn btn-success btn-xs">Add</button>
        </div>
      </div>
      </div>
      <div class="panel-body">
      <div class="table-responsive">
        <span id="form_response"></span>
        <table id="user_data" class="table table-bordered table-striped">
        <thead>
          <tr>
          <td>Book ID</td>
          <td>Title</td>
          <td>Author</td>
          <td>Year</td>
          <td>View</td>
          <td>Edit</td>
          <td>Delete</td>
          </tr>
        </thead>
        </table>      
      </div>
      </div>
    </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>

    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-6">
                <img src="../img/logoNov.png" width="90px">
                <hr class="light">
                <p>tel. 555-123</p>
                <p>laza.kostic@gmail.com</p> 
                <p>Turgenjevljeva 5, Čukarica</p>
                <p>Belgrade, Serbia</p>
            </div>
            <div class="col-md-6">                   
                <hr class="light">
                <h5>Opening hours</h5>
                <hr class="light">
                <p>Monday to Friday: 9am - 5pm</p>
                <p>Saturday: 10am - 4pm</p>
                <p>Sunday: closed</p>
            </div>
        </div>
        <div class = 'row text-center'>
            <div class="col-12 ">
                <hr class="light-100" >
                <h5>&copy; Public library, "Laza Kostić" & Milos Vujic 81/17</h5>
            </div>
            
            
        </div>
    </div>

  </footer>


 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"sql/fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0,3,4,5],
    "orderable":false,
   },
  ],

 });

 $(document).on('click', '.view', function(){
    var id = $(this).attr('id');
  $.ajax({
   url:"sql/fetch_single_data.php",
   method:"POST",
   data:{id:id},
   dataType:'json',
   success:function(data)
   {
    localStorage.setItem('title', data[0].Title);
    localStorage.setItem('author', data[0].Author);
    localStorage.setItem('year', data[0].Year);
    var options = {
     ajaxPrefix:''
    };
    new Dialogify('forms/view_data_form.php', options)
     .title('Book Data')
     .buttons([
      {
       text:'Close',
       click:function(e){
        this.close();
       }
      }
     ]).showModal();
   }
  })
 });
 
 $('#add_data').click(function(){

  var options = {
   ajaxPrefix:''
  };
  new Dialogify('forms/add_data_form.php', options)
   .title('Add New Book Data')
   .buttons([
    {
     text:'Cancle',
     click:function(e){
      this.close();
     }
    },
    {
     text:'Insert',
     type:Dialogify.BUTTON_PRIMARY,
     click:function(e)
     {
      var form_data = new FormData();
      if(!validate($('#title').val(),$('#author').val(),$('#year').val())){
        alert("GRESKAAA!");
      }
      form_data.append('title', $('#title').val());
      form_data.append('author', $('#author').val());
      form_data.append('year', $('#year').val());
      $.ajax({
       method:"POST",
       url:'sql/insert_data.php',
       data:form_data,
       dataType:'json',
       contentType:false,
       cache:false,
       processData:false,
       success:function(data)
       {
        if(data.error != '')
        {
         $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
        }
        else
        {
         $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
         dataTable.ajax.reload();
        }
       }
      });
     }
    }
   ]).showModal();
 });

 $(document).on('click', '.update', function(){
  var id = $(this).attr('id');
  $.ajax({
   url:"sql/fetch_single_data.php",
   method:"POST",
   data:{id:id},
   dataType:'json',
   success:function(data)
   {
    localStorage.setItem('title', data[0].Title);
    localStorage.setItem('author', data[0].Author);
    localStorage.setItem('year', data[0].Year);
    $('#form_response').html('<div class="alert alert-danger">'+id+'</div>');
    var options = {
     ajaxPrefix:''
    };
    new Dialogify('forms/edit_data_form.php', options)
     .title('Edit Book Data')
     .buttons([
      {
       text:'Cancle',
       click:function(e){
        this.close();
       }
      },
      {
       text:'Edit',
       type:Dialogify.BUTTON_PRIMARY,
       click:function(e)
       {
        var form_data = new FormData();
        form_data.append('title', $('#title').val());
        form_data.append('author', $('#author').val());
        form_data.append('year', $('#year').val());
        form_data.append('id', id);
        $.ajax({
         method:"POST",
         url:'sql/update_data.php',
         data:form_data,
         dataType:'json',
         contentType:false,
         cache:false,
         processData:false,
         success:function(data)
         {
          if(data.error != '')
          {
           $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
          }
          else
          {
           $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
           dataTable.ajax.reload();
          }
         }
        });
       }
      }
     ]).showModal();
   }
  })
 });

 $(document).on('click', '.delete', function(){
  var id = $(this).attr('id');
  Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this data?</b></h3>", {
   ok:function(){
    $.ajax({
     url:"sql/delete_data.php",
     method:"POST",
     data:{id:id},
     success:function(data)
     {
      Dialogify.alert('<h3 class="text-success text-center"><b>Data has been deleted</b></h3>');
      dataTable.ajax.reload();
     }
    })
   },
   cancel:function(){
    this.close();
   }
  });
 });

 function validate(title, author, year){

    if(title.len != '' && author != '' && year != ''){
        if(yearCheck(year)){
        return true;
        }
    }
    else{
      return false;
    }
  }

  function yearCheck(year){
    if(isNaN(parseInt(year))){
        //if(yearLength(year)){
        return false;
        //}
    }
    return true;
    }

  
  function yearLength(year){
    if(year.toString().length == 4){
        return true;
    }
    return false; 
    } 

});
</script>