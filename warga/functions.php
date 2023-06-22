<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$host = "localhost";
$username = "root";
$password = "";
$database = "sepatu";

$db = new mysqli($host, $username, $password, $database);

function esc_field($str)
{
    global $db;
    return $db->real_escape_string($str);
}

function md5Decrypt($hashedPassword)
{
    // Implementasikan logika untuk mendekripsi hash MD5
    // ...

    return "Decrypted Password";
}

function getAllMasyarakat()
{
    global $db;
    $query = "SELECT * FROM masyarakat";
    $result = $db->query($query);
    $masyarakat = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $masyarakat[] = $row;
        }
    }
    return $masyarakat;
}

function getAllData()
{
    global $db;
    $query = "SELECT * FROM data";
    $result = $db->query($query);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

function update_option($option_name, $option_value)
{
    global $db;
    return $db->query("UPDATE tb_options SET option_value='$option_value' WHERE option_name='$option_name'");
}

function redirect_js($url)
{
    echo '<script type="text/javascript">window.location.replace("' . $url . '");</script>';
}

function alert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '");</script>';
}

function print_msg($msg, $type = 'danger')
{
    echo '<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
   <a href=""><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>&emsp;' . $msg . '</div>';
}

function getStatusColor($status)
{
    switch ($status) {
        case 'pending':
            return 'text-danger';
        case 'diproses':
            return 'text-success';
        case 'selesai':
            return 'text-primary';
        default:
            return '';
    }
}

// Pemanggilan nama dari id_mas yang sedang login
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $query = "SELECT * FROM user WHERE id_user = $id_user";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $id = $row['id_user'];
        // echo "Halo, $nama!";
    }

}
?>
