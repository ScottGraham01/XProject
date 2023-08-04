<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XProject</title>
<!--    CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--    CSS MyStyle -->
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <!-- heading -->
    <div>
        <h1 class="text-primary fw-bold fs-0">LIST OF EMPLOYEES</h1>
    </div>
    <table align="center">
        <th>#</th>
        <th>Name</th>
        <th>Addres</th>
        <th>Salary</th>
        <th>Action</th>
    </table>
</body>
</html>

<?php
// Kết nối đến CSDL
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "XProject";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn CSDL để lấy thông tin nhân viên
    $sql = "SELECT * FROM employees";
    $stmt = $conn->query($sql);
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Lỗi kết nối CSDL: " . $e->getMessage();
}

$conn = null;
?>

<tbody>
<?php foreach ($employees as $employee): ?>
    <tr>
        <td><?php echo $employee['id']; ?></td>
        <td><?php echo $employee['name']; ?></td>
        <td><?php echo $employee['address']; ?></td>
        <td><?php echo $employee['salary']; ?></td>
        <td><?php echo $employee['action']; ?></td>
    </tr>
<?php endforeach; ?>
</tbody>

