
<p><h1 align="center">Add Customer</h1></p>
  <form method="post" action="addclient1.php">
  First Name:
    <input type="text" name="fname" class="form-control" required="required"/>
    Last Name:
    <input type="text" name="lname" class="form-control" required="required" />
   
 
     Username:
    <input type="text" name="uname" class="form-control" required="required" />
   
    Password:
    <input type="password" name="pass" class="form-control" required="required"/>
   
    Meter Number:
    <input type="text" name="mi" class="form-control" required="required"/>
   Address:
    <input type="text" name="address" class="form-control" required="required"/>
    Phone Number:<input type="text" name="contact"  class="form-control" required="required"/>
    First Meter Reading:
    <input type="text" name="meterReader" class="form-control" required="required"/>
    <br />
    Role:
    <select name="role">
<option value="">Select Role</option>

<option value="Customer"> Customer</option>

    </select><br />
    <input type="submit" name="add" value="ADD"  class="btn btn-success form-control"/>
  
 

</form>

