<?php
  require_once __DIR__.'/../handler/userHandler.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="../styles.css">
    <title>Public library, "Laza Kostić"</title>
</head>
<body>

    <!-- Navigation -->

    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">

    <div class="container-fluid">
        <a class="navbar-brand" href=".."><img src="../img/logo.png" width="100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="..">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="componentBook.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bookadded.php">Add new book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Book GENERAL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link colour=red" href="#">Sing Up</a>
                </li>
            </ul>
        </div>
    </div>

    </nav>

    <!-- Welcome Section-->

    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
              <div class="table">
                <h1 class="my-3">Users</h1>
                <table id="users-table" class="table">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>First name</th>
                      <th>Last name</th>
                    </tr>
                  </thead>
                  <?php
                    $allUsers = getAllUsers();
                    foreach ($allUsers as $user) : ?>
                    <tr data-id="<?php echo $user->getUserId(); ?>">
                      <td>
                        <?php echo $user->getUserId(); ?>
                      </td>
                      <td>
                        <?php echo $user->getFirstName(); ?>
                      </td>
                      <td>
                    <?php echo $user->getLastName(); ?>
                      </td>
                      <td>
                        <button class="btn btn-primary edit-user">Edit</button>
                        <button class="btn btn-danger delete-user">Delete</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </div>

              
              <form id="add_user_form">
                <div class="form-inline">
                  <input type="text" class="form-control m-2" name="firstName" id="first_name_textfiled" 
                  placeholder="Enter first name" value="" required>
                  <input type="text" class="form-control m-2" name="lastName" id="last_name_textfiled" 
                  placeholder="Enter last name" value="" required>
                </div>
                <div class="form-group m-2">
                  <button type="submit" name="submit" id="add_user_button" class="btn btn-success">Save</button>
                  <button type="submit" name="submit" id="update_user_button" data-id="" 
                          class="btn btn-primary" style="display: none;">Update</button>
                </div>
              </form>     
            </div>
          </div>
    </div>

    <!-- Footer -->

    <footer>

        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-md-6">
                    <img src="../img/logo.png" width="90px">
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

    <script>
  
    // AJAX Add              
    $(function() {
      $('#add_user_button').click(function(event) {
       event.preventDefault();
       let form = document.querySelector('#add_user_form');
       if (form.reportValidity()) {
         let firstName = $('#first_name_textfiled').val();
         let lastName = $('#last_name_textfiled').val();
         $.ajax({
           type: 'POST',
           url: '../handler/userHandler.php',
           data: {
             "add": firstName,
             "lastName" : lastName
           },
           success: function() {
             alert('User added');
             //$('#container-fluid padding').load('componentUser.php');
             location.reload();
           }
         });
       }
       });
    });

    // AJAX Delete
    $(function() {
      $('.delete-user').click(function() {
        let userId = $(this).parent().parent().data('id');
        $.ajax({
          url: '../handler/userHandler.php',
          data: {
            "delete": userId
          },
          type: 'POST',
          success: function() {
            alert('User deleted');
            location.reload();
          }
        });
      });
    });

    // AJAX On edit Click
    $(function() {
      $('.edit-user').click(function() {
        let userId = $(this).parent().parent().data('id');
        $.ajax({
          url: '../handler/userHandler.php',
          contentType: "application/json",
          dataType: "json",
          data: {
            "edit": userId
          },
          type: 'POST',
          success: function(data) {
            alert('Uspesno!!!! izmenjen');
            console.log(data);
            console.log(data["name"]);
            $('#first_name_textfiled').val(data["name"]);
            $('#add_user_button').hide();
            $('#update_user_button').show();
            $('#update_user_button').attr('data-id', data["id"]);
          }
        });
      });
    });


    </script>

</body>
</html>
