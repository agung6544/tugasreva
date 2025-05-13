<?php
include "config.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $login = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $hasil = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);

    if ($hasil > 0) {
        session_start();
        $_SESSION['username'] = $r['username'];
        $_SESSION['password'] = $r['password'];
        $_SESSION['nama'] = $r['nama'];

        header('Location: utama.php?page=home');
        exit;
    } else {
        echo "<script>
                alert('Username atau Password SALAH!');
                window.location.href = 'utama.php?page=login';
              </script>";
    }
}
?>

<!-- Form Login -->
<form action="utama.php?page=login" method="POST">
    <table class="table">
        <tr>
            <td>Username/Email</td>
            <td>:</td>
            <td><input type="text" name="username" required class="form-control" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="password" required class="form-control" /></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" name="submit" class="btn btn-primary" value="Login" />
            </td>
        </tr>
    </table>
</form>