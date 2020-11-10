<link rel="stylesheet" href="./css/style.css">
<h1>Contact List</h1>
<h3>Add Record</h3>
<hr>
<form action="/dashboard/phpTest/work/1103/Creat.php" method="POST">
  <table>
    <tr>
      <td>Name</td>
      <td><input type="text" name="Name"></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>
      <label><input type="radio" name="Gender" value="Male" checked="true">Male</label>
      <label><input type="radio" name="Gender" value="Female">Female</label>
      </td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><input type="text" name="Phone"></td>
    </tr>
    <tr>
      <td>Birthday</td>
      <td><input type="text" name="Birthday"></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="Address"></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><input type="text" name="E-mail"></td>
    </tr>
  </table>
  <button type="submit">Add Record</button>
</form>
<hr>