<div class="form-group">
 <label>Book ID:</label>
</div>
<div class="form-group">
    <label id="book"><i>Test</i></label>
</div>  
<div class="form-group">
 <label>User ID:</label>
</div>
<div class="form-group">
    <label id="user"><i>Test</i></label>
</div>
<div class="form-group">
 <label>Borrowed Date:</label>
</div>
<div class="form-group">
    <label id="borrowed"><i>Test</i></label>
</div>
<div class="form-group">
 <label>Returning Date:</label>
</div>
<div class="form-group">
    <label id="returningDate"><i>Test</i></label>
</div>
<div class="form-group">
 <label>Returned:</label>
</div>
<div class="form-group">
    <label id="returned"><i>Test</i></label>
</div>


<script>
 $(document).ready(function () {

  document.getElementById('book').innerHTML =localStorage.getItem('book');
  document.getElementById('user').innerHTML =localStorage.getItem('user');
  document.getElementById('borrowed').innerHTML =localStorage.getItem('borrowed');
  document.getElementById('returningDate').innerHTML =localStorage.getItem('returningDate');
  document.getElementById('returned').innerHTML =localStorage.getItem('returned');

 });
</script>