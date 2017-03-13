<!DOCTYPE html>
<html>
<head>
  <title>Convert angle measurements</title>
</head>
<body>
  <form action="rad_to_degree.php" method="post">
    <input type="number" step="any" placeholder="0" name="value">
    <select name="type">
      <option value="rad">Radian to degree</option>
      <option value="deg">Degree to radian</option>
    </select>
    <input type="submit" name="submit">
  </form>
  <?php
    function convert($value, $type) {
      if (!is_numeric($value)) {
        return 0;
      }
      if ($type === 'rad') {
        // convert to degree
        echo $value . ' rad = ' . $value * 180 / pi() . ' deg';
      } else {
        // convert to rad
        echo $value . ' deg = ' . $value * pi() / 180 . ' rad';
      }
    }

    if (isset($_POST['value'])) {
      $value = isset($_POST['value']) ? $_POST['value'] : 0;
      $type = isset($_POST['type']) ? $_POST['type'] : 'rad';
      convert($value, $type);
    }
  ?>
</body>
</html>