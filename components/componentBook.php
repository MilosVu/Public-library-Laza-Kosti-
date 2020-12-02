<?php
  require_once __DIR__.'/../handler/bookHandler.php';
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
                    <a class="nav-link" href="componentUser.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Books</a>
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
                <h1 class="my-3">Books</h1>
                <table id="users-table" class="table">
                  <thead>
                    <tr>
                      <th>Book ID</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Year</th>
                    </tr>
                  </thead>
                  <?php
                    $allBooks = getAllBooks();
                    foreach ($allBooks as $book) : ?>
                    <tr data-id="<?php echo $book->getBookId(); ?>">
                      <td>
                        <?php echo $book->getBookId(); ?>
                      </td>
                      <td>
                        <?php echo $book->getTitle(); ?>
                      </td>
                      <td>
                        <?php echo $book->getAuthor(); ?>
                      </td>
                      <td>
                    <?php echo $book->getYear(); ?>
                      </td>
                      <td>
                        <button class="btn btn-primary edit-book">Edit</button>
                        <button class="btn btn-danger delete-book">Delete</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </div>

              
              <form id="add_book_form">
                <div class="form-inline">
                  <input type="text" class="form-control m-2" name="title" id="title_textfiled" 
                  placeholder="Enter title" value="" required>
                  <input type="text" class="form-control m-2" name="author" id="author_textfiled" 
                  placeholder="Enter author" value="" required>
                  <input type="text" class="form-control m-2" name="year" id="year_textfiled" 
                  placeholder="Enter year" value="" required>
                </div>
                <div class="form-group m-2">
                  <button type="submit" name="submit" id="add_book_button" class="btn btn-success">Save</button>
                  <button type="submit" name="submit" id="update_book_button" data-id="" 
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
      $('#add_book_button').click(function(event) {
       event.preventDefault();
       let form = document.querySelector('#add_book_form');
       if (form.reportValidity()) {
         let title = $('#title_textfiled').val();
         let author = $('#author_textfiled').val();
         let year = $('#year_textfiled').val();
         $.ajax({
           type: 'POST',
           url: '../handler/bookHandler.php',
           data: {
             "add": title,
             "author" : author,
             "year" : year
           },
           success: function() {
             alert('Book added');
             //$('#container-fluid padding').load('componentUser.php');
             location.reload();
           }
         });
       }
       });
    });

    // AJAX Delete
    $(function() {
      $('.delete-book').click(function() {
        let bookId = $(this).parent().parent().data('id');
        $.ajax({
          url: '../handler/bookHandler.php',
          data: {
            "delete": bookId
          },
          type: 'POST',
          success: function() {
            alert('Book deleted');
            location.reload();
          }
        });
      });
    });

    // AJAX On edit Click
    $(function() {
      $('.edit-book').click(function() {
        let userId = $(this).parent().parent().data('id');
        $.ajax({
          url: '../handler/userHandler.php',
          data: {
            "edit": userId
          },
          type: 'POST',
          dataType: "json",
          success: function(data) {
            alert('User deleted');
            console.log(data);
            console.log(data["name"]);
            $('#title_textfiled').val(data["name"]);
            $('#add_book_button').hide();
            $('#update_book_button').show();
            $('#update_book_button').attr('data-id', data["id"]);
          }
        });
      });
    });


    </script>

</body>
</html>
