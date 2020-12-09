<div class="form-group">
 <label>Enter Book Title</label>
 <input type="text" name="title" id="title" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Book Author</label>
 <input type="text" name="author" id="author" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Book Year</label>
 <input type="text" name="year" id="year" class="form-control" />
</div>


<script>
 $(document).ready(function () {

  var title = localStorage.getItem('title');
  var author = localStorage.getItem('author');
  var year = localStorage.getItem('year');

  $('#title').val(title);
  $('#author').val(author);
  $('#year').val(year);


 });
</script>
