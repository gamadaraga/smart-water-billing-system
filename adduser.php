<center><h1>Add User</h1>
<form method="post" action="useradd.php">
<table width="200" border="1">
  <tr>
    <td>Username:</td>
    <td><input type="text" name="username" /></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input type="password" name="password" /></td>
  </tr>
  <tr>
    <td>Name:</td>
    <td><input type="text" name="name" /></td>
  </tr>
  <tr>
    <td>Role:</td>
    <td><select name="role">
<option value="">Select Role</option>
<option value="Admin">Admin</option>
<option value="Customer"> Customer</option>
<option value="Technician">Technician</option>
<option value="Bill Officer"> Bill Officer</option>
    </select></td>
  </tr>
  <tr>
    <td><input type="submit" name="ok" value="Add"/></td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>




</center>