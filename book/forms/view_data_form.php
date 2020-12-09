<div class="form-group">
 <label>Book Title:</label>
</div>
<div class="form-group">
    <label id="title"><i>Test</i></label>
</div>  
<div class="form-group">
 <label>Book Author:</label>
</div>
<div class="form-group">
    <label id="author"><i>Test</i></label>
</div>
<div class="form-group">
 <label>Book Year:</label>
</div>
<div class="form-group">
    <label id="year"><i>Test</i></label>
</div>


<script>
 $(document).ready(function () {

  document.getElementById('title').innerHTML =localStorage.getItem('title');
  document.getElementById('author').innerHTML =localStorage.getItem('author');
  document.getElementById('year').innerHTML =localStorage.getItem('year');


 });
</script>