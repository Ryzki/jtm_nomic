<?php 
$jenis =$this->session->umkm == 'Y'?'UMKM':'Toko';
?>
<div class="ps-page--single">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="#">Members</a></li>
                <li><?php echo $title; ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="ps-vendor-dashboard pro" style='margin-top:10px'>
  <div class="container">
    <div class="ps-section__content"><br>
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ">
          <?php
            $row = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='".$this->session->id_konsumen."'")->row_array();
            if (trim($rows['foto'])==''){ $foto_user = 'toko.jpg'; }else{ $foto_user = $rows['foto']; } 
            echo "<img class='img-thumbnail' style='width:100%' src='".base_url()."asset/foto_user/$foto_user'>
            <a href='".base_url()."members/edit_profil_toko/".reseller($this->session->id_konsumen)."' class='ps-btn btn-block'><center><i class='icon-pen'></i> Edit Informasi $jenis</center></a>
            <a href='".base_url()."produk/produk_reseller/".reseller($this->session->id_konsumen)."' class='ps-btn ps-btn--black btn-block'><center>Kunjungi $jenis</center></a>
          <div style='clear:both'><br></div>";
          ?>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 ">
            <figure class="ps-block--vendor-status biodata">
            <?php 
              echo "<p style='font-size:17px'>Hai <b>$row[nama_lengkap]</b>, selamat datang di halaman Informasi $jenis anda! <br>
                                              Pastikan data $jenis anda sudah benar dan lengkap untuk kemudahan dalam bertransaksi.</p><br>

              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Nama Reseller</b></label>
                <div class='col-sm-9'>
                  $rows[nama_reseller]
                </div>
              </div>
              
              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Nama Daerah</b></label>
                <div class='col-sm-9'>
                  ".kecamatan($rows['kecamatan_id'],$rows['kota_id'])."
                </div>
              </div>
              
              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Alamat Lengkap</b></label>
                <div class='col-sm-9'>
                  $rows[alamat_lengkap]
                </div>
              </div>
              
              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Kontak $jenis</b></label>
                <div class='col-sm-9'>
                  $rows[no_telpon]
                </div>
              </div>
              
              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Keterangan</b></label>
                <div class='col-sm-9'>
                  $rows[keterangan]
                </div>
              </div>
              
              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Status $jenis</b></label>
                <div class='col-sm-9'>";
                  $cek_paket = $this->db->query("SELECT * FROM rb_reseller_paket a JOIN rb_paket b ON a.id_paket=b.id_paket where a.id_reseller='".reseller($this->session->id_konsumen)."'");
                  if ($cek_paket->num_rows()>=1){
                    foreach ($cek_paket->result_array() as $rowp) {
                      if ($rowp['status']=='Y'){
                        $akhir  = strtotime($rowp['expire_date']); //Waktu awal
                        $awal = time(); // Waktu sekarang atau akhir
                        $diff  = $akhir - $awal;
                        echo "<div class='alert alert-success'><strong>PENTING</strong> - Saat ini akun anda Aktif pada paket <b>$rowp[nama_paket]</b>, untuk Durasi $rowp[durasi] Hari.<br>
                                              Dan Masa aktif Paket Akan Berakhir pada ".tgl_indo($rowp['expire_date'])." (".floor($diff / (60 * 60 * 24)) ." hari lagi).</div>";
                            if (floor($diff / (60 * 60 * 24))<1){
                                $this->db->query("UPDATE rb_reseller_paket set status='N' where id_reseller='".reseller($this->session->id_konsumen)."'");
                            }
                      }elseif ($rowp['status']=='N'){
                        echo "<div class='alert alert-warning'><strong>PENTING</strong> - Anda telah memilih paket <b>$rowp[nama_paket]</b>, untuk Durasi $rowp[durasi] Hari,
                              <br>Silahkan melakukan Pembayaran Tepat <b style='color:#000; text-decoration:underline'>Rp ".rupiah($rowp['harga']+$rowp['id_reseller_paket'])."</b><br>";
                              $noo = 1;
                              $rekening = $this->model_app->view('rb_rekening');
                              foreach ($rekening->result_array() as $row){
                                  echo "<span style='color:#000; display:block; border-bottom:1px dotted #a7a7a7;'>$noo. $row[nama_bank], <b>$row[no_rekening]</b>, A/N $row[pemilik_rekening]</span>";
                                  $noo++;
                              }
                        echo "</div>";
                      }
                    }
                  }else{
                    echo "<span style='color:red'>Reseller / $jenis Free</span>";
                  }

                 
                echo "</div>
              </div>";
            ?>
            </figure>
          </div>
        </div>
      </div>
    </div>
</div>