
<html>
 <head>
   <br>
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
        <li><a href="../book/booksPage.php">Books</a></li>
        <li class="active"><a href="#">Borrowings</a></li>
        <li><a href="#">About</a></li>
      </ul>
    </div>
  </div>
</nav>

    <!-- Table -->
  <div class="container-fluid padding">
    <div class="container">
    <br>
      <br>
      <br>
      <h1>Borrowings Page</h1>
      <br>
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-6">
       <h3 class="panel-title">Borrowings</h3>
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
         <td>Book</td>
         <td>User</td>
         <td>Borrowed</td>
         <td>Returning date</td>
         <td>Returned</td>
         <td>View</td>
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
              <h5>Our hours</h5>
              <hr class="light">
              <p>Monday to Friday: 9am - 5pm</p>
              <p>Saturday: 10am - 4pm</p>
              <p>Sunday: closed</p>
          </div>
      </div>
      <div clas="col-12">
          <hr class="light-100" alignement="centre">
          <h5>&copy; Public library, "Laza Kostić" & Milos Vujic 81/17</h5>
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
    "targets":[5,6],
    "orderable":false,
   },
  ],

 });

 //View
 $(document).on('click', '.view', function(){
    var idbook = $(this).attr('idbook');
    var iduser = $(this).attr('iduser');
  $.ajax({
   url:"sql/fetch_single_data.php",
   method:"POST",
   data:{idbook:idbook,iduser:iduser},
   dataType:'json',
   success:function(data)
   {
    localStorage.setItem('book', data[0].Book);
    localStorage.setItem('user', data[0].User);
    localStorage.setItem('borrowed', data[0].Borrowed);
    localStorage.setItem('returningDate', data[0].ReturningDate);
    localStorage.setItem('returned', data[0].Returned);
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
 
 //Add new
 $('#add_data').click(function(){
  var options = {
   ajaxPrefix:''
  };
  new Dialogify('forms/add_data_form.php', options)
   .title('Add New Borrowing Data')
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
      form_data.append('bookId', $('#bookId').val());
      form_data.append('userId', $('#userId').val());
      form_data.append('borrowed', $('#borrowed').val());
      form_data.append('returningDate', $('#returningDate').val());
      form_data.append('returned', $('#returned').val());
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


 //Delete
 $(document).on('click', '.delete', function(){
  var idbook = $(this).attr('idbook');
  var iduser = $(this).attr('iduser');
  Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this data?</b></h3>", {
   ok:function(){
    $.ajax({
     url:"sql/delete_data.php",
     method:"POST",
     data:{idbook:idbook,iduser:iduser},
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
 
 
});
</script>