<?php
$data = json_decode(file_get_contents("php://input"));
$matricula = mysql_real_escape_string($data->matricula);
$nombre = mysql_real_escape_string($data->nombre);
$apellidos = mysql_real_escape_string($data->apellidos);
$email = mysql_real_escape_string($data->email);
$password = mysql_real_escape_string($data->password);
$imagen = mysql_real_escape_string($data->imagen);


 
$con = mysql_connect('localhost', 'root', '');
mysql_select_db('codeigniter', $con);
 
$qry_em = 'select count(*) as cnt from datos_alumno where matricula ="' . $matricula . '"';
$qry_res = mysql_query($qry_em);
$res = mysql_fetch_assoc($qry_res);
 
if ($res['cnt'] == 0) {
    $qry = 'INSERT INTO datos_alumno values ("' . $matricula . '","' . $nombre . '","' . $apellidos . '","' . $email . '","' . $password . '","' . $imagen . '")';
    $qry_res = mysql_query($qry);
    if ($qry_res) {
        $arr = array('msg' => "User Created Successfully!!!", 'error' => '');
        $jsn = json_encode($arr);
        print_r($jsn);
    } else {
        $arr = array('msg' => "", 'error' => 'Error In inserting record');
        $jsn = json_encode($arr);
        print_r($jsn);
    }
} else {
    $arr = array('msg' => "", 'error' => 'User Already exists with same email');
    $jsn = json_encode($arr);
    print_r($jsn);
}
?>