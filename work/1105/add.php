<link rel="stylesheet" href="./css/style.css">
<form action="creat.php" method="POST">
  <table>
    <tr>
      <td>ISBN</td>
      <td><input type="text" name="ISBN"></td>
    </tr>
    <tr>
      <td>出版社</td>
      <td><input type="text" name="publish"></td>
    </tr>
    <tr>
      <td>書名</td>
      <td><input type="text" name="bookname"></td>
    </tr>
    <tr>
      <td>作者</td>
      <td><input type="text" name="author"></td>
    </tr>
    <tr>
      <td>定價</td>
      <td><input type="text" name="price"></td>
    </tr>
    <tr>
      <td>發行日</td>
      <td><input type="text" name="publishday"></td>
    </tr>
  </table>
  <button type="submit" class="creatBtn">Add Record</button>
</form>