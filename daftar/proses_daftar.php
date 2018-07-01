<?php
require_once "konekdb.php";

$r = !empty($_POST) ? (object) $_POST : die('HTTP Method Not Allowed');

try {

    $pdo->prepare("INSERT INTO `calon_mahasiswa` VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")->execute(array(
    	NULL,
    	$r->nama,
    	$r->tempat_lahir,
    	$r->tanggal_lahir,
    	$r->jkel,
    	$r->agama, 
    	$r->biaya, 
    	$r->alamat, 
    	$r->kota, 
    	$r->zip, 
    	$r->provinsi, 
    	$r->nohp, 
    	$r->badan, 
    	$r->keahlian, 
    	$r->program
    ));

    $id = $pdo->lastInsertId();

    try {

    	$pdo->prepare('INSERT INTO `riwayat_penyakit` VALUES(?,?,?,?)')->execute(array(
    		NULL,
    		$id, 
    		$r->penyakit, 
    		$r->penyakit_terakhir
    	));

    	$pdo->prepare('INSERT INTO `riwayat_pendidikan` VALUES (?,?,?,?,?,?,?)')->execute(array(
    		NULL,
    		$id,
    		$r->tk,
    		$r->sd, 
    		$r->smp, 
    		$r->sma, 
    		$r->strata
    	));

    	if(isset($r->orwali) &&  $r->orwali == 1) {
    		$pdo->prepare('INSERT INTO `orang_tua` VALUES (?,?,?,?,?,?,?,?)')->execute(array(
    			NULL,
    			$r->nama_ayah,
    			$r->nama_ibu,
    			$r->alamat_ortu,
    			$r->pekerjaan_ayah,
    			$r->pekerjaan_ibu,
    			$r->telepon_ortu,
    			$id
    		));
    	} else if(isset($r->orwali) && $r->orwali == 2) {
    		$pdo->prepare('INSERT INTO `wali` VALUES (?,?,?,?,?,?)')->execute(array(
    			NULL,
    			$r->nama_wali,
    			$r->alamat_wali,
    			$r->telepon_wali,
    			$r->pekerjaan_wali,
    			$id
    		));
    	}

        echo sprintf('<meta http-equiv="refresh" content="1 url=print.php?id=%s">', base64_encode($id));

    } catch (PDOExecption $e) {
    	$pdo->rollback();
        echo '<meta http-equiv="refresh" content="1 url=index.php">';
    }

} catch (PDOExecption $e) {
	$pdo->rollback();
    echo '<meta http-equiv="refresh" content="1 url=index.php">';
} 