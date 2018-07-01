<?php

require_once 'konekdb.php';

$id = base64_decode($_GET['id']);

try {
	$siswa = $pdo->query("
		SELECT calon_mahasiswa.*, `provinsi`.`nama_provinsi`, `agama`.`nama_agama`, `prodi`.`program_studi`
		FROM `calon_mahasiswa` 
		INNER JOIN `provinsi` ON `calon_mahasiswa`.`provinsi` = `provinsi`.`provinsi_id` 
		INNER JOIN `agama` ON `calon_mahasiswa`.`agama` = `agama`.`agama_id`
		INNER JOIN `prodi` ON `calon_mahasiswa`.`prodi` = `prodi`.`prodi_id`
		WHERE `id` = '$id'
	")->fetch(PDO::FETCH_OBJ);

       $penyakit = $pdo->query("SELECT * FROM `riwayat_penyakit` WHERE `mahasiswa_id` = '$id'
")->fetch(PDO::FETCH_OBJ);

       $pendidikan = $pdo->query("SELECT * FROM `riwayat_pendidikan` WHERE `mahasiswa_id` = '$id'
")->fetch(PDO::FETCH_OBJ);

} catch (PDOException $e) {
	
}

$ortu = $pdo->query("SELECT * FROM `orang_tua` WHERE `mahasiswa_id` = '$id'")->fetch(PDO::FETCH_OBJ);

if(empty((array)$ortu)) {
	$ortu = $pdo->query("SELECT * FROM `wali` WHERE `mahasiswa_id` = '$id'")->fetch(PDO::FETCH_OBJ);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <style type="text/css">
        body {
        	background: rgb(204,204,204);
        }
        
        page {
        	background: white;
     	   	display: block;
      	  	margin: 0 auto;
      	  	margin-bottom: 0.5cm;
        	box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        
        page[size="A4"] {
        	width: 21cm;
        	height: 35.6cm;
        }
        
        page[size="A4"][layout="portrait"] {
	        width: 29.7cm;
    	    height: 27cm;
        }

        @media print {
        	body, page {
        		margin: 0;
        		box-shadow: 0;
        	}
        }

        .bdt {
            border: 1.5px solid;
            border-collapse: collapse;
        }

        .tc {
            text-align: center;
        }

        </style>
    </head>
    <body>
        <page size="A4" layout="portrait">
            <div style="padding-top: 50px;padding-left: 30px;padding-right: 30px;">
                <table class="basic" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="65" rowspan="6">
                            <img src="http://testpmb.stikesgrahamedika.ac.id/pmb/daftar/LOGO.png" width="90">
                        </td>
                        <td width="650" align="center">&nbsp;</td>
                    </tr>
                    <tr><center><a href="#" onclick="window.print()"> Print </a></center>
                        <td align="center">
                            <font style="font-weight:bold;font-size: 18px;paddi">YAYASAN PENDIDIKAN BOGANI</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><font style="font-weight:bold;font-size: 16px;">SEKOLAH TINGGI ILMU KESEHATAN (STIKES) GRAHA MEDIKA</font></td>
                    </tr>
                    <tr>
                        <td align="center"><font style="font-weight:bold;font-size: 16px;">KOTA KOTAMOBAGU</font></td>
                    </tr>
                    <tr>
                        <td align="center">
                                Jl. Raya AKD, RSI Moonow Lantai II Mongkonai Kotamobagu <br>
                        </td>
                    </tr>
                </table>
                <hr style="height:3px;border:none;color:#333;background-color:#333;margin-left: 140px;margin-right: 140px;">
            </div>
            <div  style="padding-top:15px;padding-left: 190px;padding-right: 190px;">
                <div style="font-weight: bold;text-align: center;font-size: 20px">
                    Data Calon Mahasiswa STIKES GRAHA MEDIKA
                </div>
            <div style="font-weight: bold;text-align: center;font-size: 20px">
                    Mahasiswa Baru T.A 2018/2019
                </div>
                <div style="padding-top: 15px;">
                    <table>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td><?php echo $siswa->nama;?></td>
                        </tr>
                        <tr>
                            <td>Jurusan yang dipilih</td>
                            <td>:</td>
                            <td><?php echo $siswa->program_studi;?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>:</td>
                            <td><?php echo $siswa->tempat_lahir . ', ' . $siswa->tanggal_lahir ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?php echo str_replace(['L', 'P'], ['Laki-Laki', 'Perempuan'], $siswa->jenis_kelamin)?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?php echo $siswa->nama_agama;?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo $siswa->alamat;?></td>
                        </tr>
                        <tr>
                            <td>No Hp</td>
                            <td>:</td>
                            <td><?php echo $siswa->kontak;?></td>
                        </tr>
                        <tr>
                            <td>Tinggi/Berat Badan</td>
                            <td>:</td>
                            <td><?php echo $siswa->tinggi_berat;?></td>
                        </tr>
                        <tr>
                            <td>Keahlian</td>
                            <td>:</td>
                            <td><?php echo $siswa->keahlian;?></td>
                        </tr>
                        <tr>
                            <td>Penyakit yang pernah diderita</td>
                            <td>:</td>
                            <td><?php echo $penyakit->penyakit;?></td>
                        </tr>
                        <tr>
                            <td>Penyakit 6 bulan terakhir</td>
                            <td>:</td>
                            <td><?php echo $penyakit->penyakit_terakhir;?></td>
                        </tr>
                  </table>
          <font style="font-weight:bold;font-size: 13px;">Riwayat Pendidikan</font>
                  <table>
                        <tr>
                            <td>TK/thn</td>
                            <td>:</td>
                            <td><?php echo $pendidikan->tk;?></td>
                        </tr>
                        <tr>
                            <td>SD/thn</td>
                            <td>:</td>
                            <td><?php echo $pendidikan->sd;?></td>
                        </tr>
                        <tr>
                            <td>SMP/thn</td>
                            <td>:</td>
                            <td><?php echo $pendidikan->smp;?></td>
                        </tr>
                        <tr>
                            <td>SMA/thn</td>
                            <td>:</td>
                            <td><?php echo $pendidikan->sma;?></td>
                        </tr>
                        <tr>
                            <td>Strata 1</td>
                            <td>:</td>
                            <td><?php echo $pendidikan->perguruan;?></td>
                        </tr>
                    </table>
             <font style="font-weight:bold;font-size: 13px;">Orang Tua/Wali</font>
                 <table>
                       <tr>
                            <td>Nama Ayah</td>
                            <td>:</td>
                            <td><?php echo $ortu->ayah;?></td>
                        </tr>
                       <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td><?php echo $ortu->ibu;?></td>
                        </tr>
                       <tr>
                            <td>Alamat Ortu</td>
                            <td>:</td>
                            <td><?php echo $ortu->alamat_ortu;?></td>
                        </tr>
                       <tr>
                            <td>Pekerjaan Ayah</td>
                            <td>:</td>
                            <td><?php echo $ortu->pekerjaan_ayah;?></td>
                        </tr>
                       <tr>
                            <td>Pekerjaan ibu</td>
                            <td>:</td>
                            <td><?php echo $ortu->pekerjaan_ibu;?></td>
                        </tr>
                       <tr>
                            <td>Telepon</td>
                            <td>:</td>
                            <td><?php echo $ortu->kontak;?></td>
                        </tr>
                 </table>
                </div>
                <div style="padding-left: 70%;padding-top: 50px">
                    Kotamobagu, <?php echo date('d M Y') ;?><br>
                     Calon Mahasiswa Baru<br>
                    <div style="padding-top: 50px;padding-bottom: 20px;"></div>
<hr style="height:3px;border:none;color:#333;background-color:#333;margin-left: 3px;margin-right: 3px;">
                </div>
            </div>
        </page>
    </body>
</html>