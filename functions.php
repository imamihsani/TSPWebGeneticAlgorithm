<?php
ini_set('max_execution_time', 60 * 3);
ini_set('memory_limit', '256M');
session_start();
include 'config.php';
include 'includes/db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include 'includes/general.php';
include 'includes/paging.php';

function _get($key)
{
    if (isset($_GET[$key]))
        return $_GET[$key];
}

function _post($key)
{
    if (isset($_POST[$key]))
        return $_POST[$key];
}

$mod = _get('m');
$act = _get('act');

$NILAI = array(
    1 => 'Sangat Rendah',
    2 => 'Rendah',
    3 => 'Cukup',
    4 => 'Tinggi',
    5 => 'Sangat Tinggi'
);

$rows = $db->get_results("SELECT kode_titik, nama_titik, lat, lng FROM tb_titik ORDER BY kode_titik");
$TITIK = array();
$POINTS = array();
$LATLING = array();
foreach ($rows as $row) {
    $TITIK[$row->kode_titik] = $row->nama_titik;
    $POINTS[$row->kode_titik] = $row;
    $LATLING[$row->kode_titik] = array('lat' => $row->lat * 1, 'lng' => $row->lng * 1);
}

function get_kelompok_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT kode_kelompok, nama_kelompok FROM tb_kelompok ORDER BY kode_kelompok DESC");
    $a = '';
    foreach ($rows as $row) {
        if ($row->kode_kelompok == $selected)
            $a .= "<option value='$row->kode_kelompok' selected>$row->nama_kelompok</option>";
        else
            $a .= "<option value='$row->kode_kelompok'>$row->nama_kelompok</option>";
    }
    return $a;
}

function get_titik_option($selected = '', $kode_kelompok)
{
    global $db;
    $rows = $db->get_results("SELECT kode_titik, nama_titik, lat, lng FROM tb_titik WHERE kode_kelompok='$kode_kelompok' ORDER BY kode_titik");
    $a = '';
    foreach ($rows as $row) {
        if ($row->kode_titik == $selected || in_array($row->kode_titik, (array)$selected))
            $a .= "<option value='$row->kode_titik' data-lat='$row->lat' data-lng='$row->lng' selected>$row->nama_titik</option>";
        else
            $a .= "<option value='$row->kode_titik' data-lat='$row->lat' data-lng='$row->lng'>$row->nama_titik</option>";
    }
    return $a;
}

function get_data()
{
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_bobot ORDER BY ID1, ID2");

    $data = array();
    foreach ($rows as $row) {
        $data[$row->ID1][$row->ID2]  = $row->bobot;
        $ID[$row->ID1][$row->ID2] = $row->ID;
    }
    return $data;
}

function get_graph($data = array())
{
    $graph = array();
    foreach ($data as $key => $val) {
        $graph[$key] = array_values($val);
    }

    return array_values($graph);
}

function dd($arr)
{
    echo '<pre>' . print_r($arr, 1) . '</pre>';
}
