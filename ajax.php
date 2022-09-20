<?php
require_once 'functions.php';
if ($mod == 'simpan_jarak') {

    $jarak = $_SESSION['jarak'];

    $arr_jarak = $_POST['arr_jarak'];
    $jenis = $_POST['jenis'];

    foreach ($_POST['arr_tempat'] as $key => $val) {
        $jarak[$jenis][$val] = $arr_jarak[$key];
    }
    $_SESSION['jarak'] = $jarak;

    print_r($_SESSION['jarak']);
} elseif ($mod == 'simpan_bobot') {

    $kode1 = $_POST['kode1'];
    $kode2 = $_POST['kode2'];
    $jarak1 = $_POST['jarak1'];
    $jarak2 = $_POST['jarak2'];

    $db->query("UPDATE tb_bobot SET bobot='$jarak1', updated_at=NOW() WHERE ID1='$kode1' AND ID2='$kode2'");
    $db->query("UPDATE tb_bobot SET bobot='$jarak2', updated_at=NOW() WHERE ID1='$kode2' AND ID2='$kode1'");

    print_r($_POST);
}
