<div class="form-group">
 <label>User First name:</label>
</div>
<div class="form-group">
    <label id="firstName"><i>Test</i></label>
</div>  
<div class="form-group">
 <label>User Last name:</label>
</div>
<div class="form-group">
    <label id="lastName"><i>Test</i></label>
</div>


<script>
 $(document).ready(function () {

  document.getElementById('firstName').innerHTML =localStorage.getItem('firstName');
  document.getElementById('lastName').innerHTML =localStorage.getItem('lastName');

 });
</script>