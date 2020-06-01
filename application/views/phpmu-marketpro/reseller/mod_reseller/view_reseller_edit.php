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
          $attributes = array('id' => 'formku');
          echo form_open_multipart('members/edit_profil_toko',$attributes); 
            $row = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='".$this->session->id_konsumen."'")->row_array();
            if (trim($rows['foto'])==''){ $foto_user = 'toko.jpg'; }else{ $foto_user = $rows['foto']; } 
            echo "<img class='img-thumbnail' style='width:100%' src='".base_url()."asset/foto_user/$foto_user'>
            <input class='required number form-control form-mini' type='file' name='gg'><small><center>Allowed : gif, jpg, png, jpeg (Max 1 MB)</center></small><br>
                    <button type='submit' name='submit' class='ps-btn btn-block'><center><i class='icon-pen'></i> Simpan Perubahan</center></button>
          <div style='clear:both'><br></div>";
          ?>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 ">
            <figure class="ps-block--vendor-status biodata">
            <?php 
              echo "<p style='font-size:17px'>Hai <b>$row[nama_lengkap]</b>, selamat datang di halaman Informasi Toko anda! <br>
                                              Pastikan data toko anda sudah benar dan lengkap untuk kemudahan dalam bertransaksi.</p><br>

              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Nama Toko</b></label>
                <div class='col-sm-9'>
                  <input class='form-control form-mini' type='text' name='c' value='$rows[nama_reseller]'>
                </div>
              </div>
              
              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Daerah Pengiriman</b></label>
              <div class='col-sm-9'>
                <div class='row'>
                  <div class='col'>
                    <select class='form-control form-mini' name='provinsi_id' id='list_provinsi' required>";
                    $obj = get_provinsi();
                    echo "<option value=0>- Pilih Provinsi -</option>";
                    for($i=0; $i < count($obj['rajaongkir']['results']); $i++){
                      if ($rows['provinsi_id']==$obj['rajaongkir']['results'][$i]['province_id']){
                        echo "<option value='".$obj['rajaongkir']['results'][$i]['province_id']."' selected>".$obj['rajaongkir']['results'][$i]['province']."</option>";
                      }else{
                        echo "<option value='".$obj['rajaongkir']['results'][$i]['province_id']."'>".$obj['rajaongkir']['results'][$i]['province']."</option>";
                      }
                    }
                    echo "</select>
                  </div>
                  <div class='col'>
                    <select class='form-control form-mini' name='kota_id' id='list_kotakab' required>";
                    $kota = get_kota($rows['provinsi_id']);
                    echo "<option value=0>- Pilih Kota / Kabupaten -</option>";
                    for($i=0; $i < count($kota['rajaongkir']['results']); $i++){
                      if ($rows['kota_id']==$kota['rajaongkir']['results'][$i]['city_id']){
                        echo "<option value='".$kota['rajaongkir']['results'][$i]['city_id']."' selected>".$kota['rajaongkir']['results'][$i]['city_name']."</option>";
                      }else{
                        echo "<option value='".$kota['rajaongkir']['results'][$i]['city_id']."'>".$kota['rajaongkir']['results'][$i]['city_name']."</option>";
                      }
                    }
                    echo "</select>
                  </div>
                  <div class='col'>
                    <select class='form-control form-mini' name='kecamatan_id' id='list_kecamatan' required>";
                    $kec = get_kecamatan($rows['kota_id']);
                    echo "<option value=0>- Pilih Kecamatan -</option>";
                    for($i=0; $i < count($kec['rajaongkir']['results']); $i++){
                      if ($rows['kecamatan_id']==$kec['rajaongkir']['results'][$i]['subdistrict_id']){
                        echo "<option value='".$kec['rajaongkir']['results'][$i]['subdistrict_id']."' selected>".$kec['rajaongkir']['results'][$i]['subdistrict_name']."</option>";
                      }else{
                        echo "<option value='".$kec['rajaongkir']['results'][$i]['subdistrict_id']."'>".$kec['rajaongkir']['results'][$i]['subdistrict_name']."</option>";
                      }
                    }
                    echo "</select>
                  </div>
                </div>
              </div>
              </div>
              
              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Alamat Lengkap</b></label>
                <div class='col-sm-9'>
                <input type='text' name='e' class='form-control form-mini' value='$rows[alamat_lengkap]'>
                </div>
              </div>
              
              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Kontak Toko</b></label>
                <div class='col-sm-9'>
                  <input type='text' name='f' class='form-control form-mini' value='$rows[no_telpon]'>
                </div>
              </div>
              
              <div class='form-group row' style='margin-bottom:5px'>
              <label class='col-sm-3 col-form-label' style='margin-bottom:1px'>Keterangan</b></label>
                <div class='col-sm-9'>
                  <textarea class='form-control' style='height:170px' name='i'>$rows[keterangan]</textarea>
                </div>
              </div>";
              echo form_close();
            ?>
            </figure>
            
          </div>
        </div>
      </div>
    </div>
</div>

<script>
$(document).ready(function(){
//* select Provinsi */
var base_url    = "<?php echo base_url();?>";
$("#list_provinsi").change(function(){
    var id_province = this.value;
    kota(id_province);
    $("#div_kota").show();
});

/* select Kota */
kota = function(id_province){
    $.ajax({
    type: 'post',
    url: base_url + 'produk/rajaongkir_get_kota',
    data: {id_province:id_province},
    dataType  : 'html',
    success: function (data) {
        $("#list_kotakab").html(data);
    },
    beforeSend: function () {
        
    },
    complete: function () {
      
    }
});
}

$("#list_kotakab").change(function(){
    var id_kota = this.value;
    kecamatan(id_kota);
    $("#div_kecamatan").show();
});

kecamatan = function(id_kota){
    $.ajax({
    type: 'post',
    url: base_url + 'produk/rajaongkir_get_kecamatan',
    data: {id_kota:id_kota},
    dataType  : 'html',
    success: function (data) {
        $("#list_kecamatan").html(data);
    }
});
}
});
</script>