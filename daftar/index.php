<?php
include "header.php";
require_once 'konekdb.php';
?>
<div class="span9">
    <form method="POST" action="proses_daftar.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Formulir Pendaftaran Mahasiswa Baru T.A 2018/2019</legend>
        </fieldset>
        
        <hr>
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label" style="text-align:left" for="pil_1">Pilihan Utama</label>
                <div class="controls">
                    <select required name="program" id="pil_1">
                        <?php foreach ($pdo->query("SELECT * FROM prodi") as $program) : ?>
                        <option value="<?=$program['prodi_id'];?>"><?=$program['program_studi'];?></option>}
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <h6>I. DATA PRIBADI CALON MAHASISWA</h6>
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="nama">Nama (sesuai akte lahir)</label>
                <div class="controls">
                    <input required type="text" name="nama" class="span10" value="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="tempat">Tempat Lahir</label>
                <div class="controls">
                    <input required type="text" name="tempat_lahir" class="span5" value="">
                    &nbsp;Tanggal Lahir&nbsp;
                    <input required type="text" id="datepicker" name="tanggal_lahir" class="span3" value="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="jekl">Jenis Kelamin</label>
                <div class="controls">
                    <select required name="jkel">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="agama">Agama</label>
                <div class="controls">
                    <select required name="agama">
                        <?php foreach ($pdo->query("SELECT * FROM agama") as $agama) : ?>
                        <option value="<?=$agama['agama_id'];?>"><?=$agama['nama_agama'];?></option>}
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="biaya">Sumber Biaya</label>
                <div class="controls">
                    <select required name="biaya">
                        <option value="Orang Tua" >Orang Tua</option>
                        <option value="Wali" >Wali</option>
                        <option value="Sendiri" >Sendiri</option>
                        <option value="Lain-lain" >Lain-lain</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="alamat">Alamat</label>
                <div class="controls">
                    <input required type="text" name="alamat" class="otom span10" value="" id="alamat_siswa">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="kota">Kota</label>
                <div class="controls">
                    <input required type="text" name="kota" class="otom span5" value="" id="kota_siswa">
                    &nbsp;Kodepos
                    <input required type="text" name="zip" class="otom span3" value="" id="kdpos_siswa">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="provinsi">Provinsi</label>
                <div class="controls">
                    <select required name="provinsi" class="form-control">
                        <?php foreach ($pdo->query("SELECT * FROM provinsi") as $prov) : ?>
                        <option value="<?=$prov['provinsi_id'];?>"><?=$prov['nama_provinsi'];?></option>}
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="nohp">No Hp</label>
                <div class="controls">
                    <input required type="text" name="nohp" class="otom span5" value="" id="nohp_siswa">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="badan">Tinggi Badan/Berat Badan</label>
                <div class="controls">
                    <input required type="text" name="badan" class="otom span5" value="" id="badan_siswa">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="penyakitdi">Penyakit yang pernah diderita</label>
                <div class="controls">
                    <input required type="text" name="penyakit" class="otom span5" value="" id="penyakitdi_siswa">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="penyakit6">Penyakit 6 bulan terakhir</label>
                <div class="controls">
                    <input required type="text" name="penyakit_terakhir" class="otom span5" value="" id="penyakit6_siswa">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label span4" style="text-align:left" for="keahlian">Keahlian yang dimiliki</label>
                <div class="controls">
                    <input required type="text" name="keahlian" class="otom span5" value="" id="keahlian_siswa">
                </div>
            </div>
            <hr>
            <h6>II. DATA SEKOLAH</h6>
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label span4" style="text-align:left" for="tk">TK/thn</label>
                    <div class="controls">
                        <input required type="text" name="tk" class="otom span5" value="" id="tk_siswa">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label span4" style="text-align:left" for="sd">SD/thn</label>
                    <div class="controls">
                        <input required type="text" name="sd" class="otom span5" value="" id="sd_siswa">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label span4" style="text-align:left" for="smp">SMP/thn</label>
                    <div class="controls">
                        <input required type="text" name="smp" class="otom span5" value="" id="smp_siswa">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label span4" style="text-align:left" for="sma">SMA/SMK/thn</label>
                    <div class="controls">
                        <input required type="text" name="sma" class="otom span5" value="" id="sma_siswa">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label span4" style="text-align:left" for="strata">Strata 1</label>
                    <div class="controls">
                        <input required type="text" name="strata" class="otom span5" value="" id="strata_siswa">
                    </div>
                </div>
            </div>
            <hr>
            <h6>III. DATA ORANG TUA / WALI (YANG DAPAT DIHUBUNGI)</h6>
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label span4" style="text-align:left">Data Orang Tua/ Wali</label>
                    <div class="controls">
                        <select required name="orwali" id="data-orwali">
                            <option selected disabled>-- Data Orang Tua/ Wali --</option>
                            <option value="1">Orang Tua</option>
                            <option value="2">Wali</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="ortu" style="display: none;">
                <h7>ORANG TUA</h7>
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label span4" style="text-align:left" for="nama_ayah">Nama Ayah</label>
                        <div class="controls">
                            <input required type="text" name="nama_ayah" class="span10" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4" style="text-align:left" for="nama_ibu">Nama Ibu</label>
                        <div class="controls">
                            <input required type="text" name="nama_ibu" class="span10" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4" style="text-align:left" for="alamat_ortu">Alamat Orang Tua</label>
                        <div class="controls">
                            <input required type="text" name="alamat_ortu" class="span10" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4" style="text-align:left" for="telepon_ortu">Telepon</label>
                        <div class="controls">
                            <input required type="text" name="telepon_ortu" class="span10" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4" style="text-align:left" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                        <div class="controls">
                            <input required type="text" name="pekerjaan_ayah" class="span10" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4" style="text-align:left" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                        <div class="controls">
                            <input required type="text" name="pekerjaan_ibu" class="span10" value="">
                        </div>
                    </div>
                </div>
            </div>
                <div id="wali" style="display: none;">
                    <h7>WALI</h7>
                    <div class="control-group">
                        <label class="control-label span4" style="text-align:left" for="nama_wali">Nama Wali</label>
                        <div class="controls">
                            <input required type="text" name="nama_wali" class="span10" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4" style="text-align:left" for="alamat_wali">Alamat Wali</label>
                        <div class="controls">
                            <input required type="text" name="alamat_wali" class="span10" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4" style="text-align:left" for="telepon_wali">Telepon Wali</label>
                        <div class="controls">
                            <input required type="text" name="telepon_wali" class="span10" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4" style="text-align:left" for="pekerjaan_wali">Pekerjaan Wali</label>
                        <div class="controls">
                            <input required type="text" name="pekerjaan_wali" class="span10" value="">
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-large"><i class="icon-ok"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <footer>
        <p>&copy; 2018 Universitas Tarumanagara. All rights reserved.</p>
    </footer>
    </div> <!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-transition.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-alert.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-modal.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-dropdown.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-scrollspy.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-tab.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-tooltip.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-popover.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-button.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-collapse.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-carousel.js"></script>
    <script src="http://testpmb.stikesgrahamedika.ac.id/pmb/assets/js/bootstrap-typeahead.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
    $( function() {
        $( "#datepicker" ).datepicker();

        $('#data-orwali').change(function(event) {
            if($(this).val() == 1) {
                $('#ortu').show();
                $('#wali').hide();
                $.each($('#wali input'), function(i, w) {
                    $(w).attr('disabled', true);
                });
                $.each($('#ortu input'), function(i, w) {
                    $(w).attr('disabled', false);
                });
            } else if($(this).val() == 2) {
                $('#ortu').hide();
                $('#wali').show();
                $.each($('#ortu input'), function(i, w) {
                    $(w).attr('disabled', true);
                });
                $.each($('#wali input'), function(i, w) {
                    $(w).attr('disabled', false);
                });
            }
        });
    });

    </script>
</body>
</html>