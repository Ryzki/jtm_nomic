<?php $detail = $this->db->query("SELECT * FROM rb_penjualan where id_penjualan='".$this->uri->segment(3)."'")->row_array(); ?>

            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Detail Transaksi Penjualan</h3>
                  <a class='pull-right btn btn-default btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/penjualan_konsumen'>Kembali</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="col-sm-6 col-xs-12">  
                  <table class='table table-condensed'>
                  <tbody>
                    <tr><th width='140px' scope='row'>No. Invoice</th>  <td style='font-weight:bold; color:green'><?php echo "$rows[kode_transaksi]"; ?></td></tr>
                    <tr><th scope='row'>Dikirim kepada</th>                 <td><?php echo "<a href='".base_url().$this->uri->segment(1)."/detail_konsumen/$rows[id_konsumen]'>$rows[nama_lengkap]</a>"; ?></td></tr>
                    <tr><th scope='row'>Alamat Pengiriman</th>               <td><?php echo alamat($rows['kode_transaksi']); ?></td></tr>
                  </tbody>
                  </table>

                  <table class="table table-bordered table-condensed">
                    <thead>
                      <tr bgcolor='#e3e3e3'>
                        <th style='width:40px'>No</th>
                        <th>Nama Produk</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $sub_total = ($row['harga_jual']-$row['diskon'])*$row['jumlah'];
                    echo "<tr><td>$no</td>
                              <td><a target='_BLANK' href='".base_url()."produk/detail/$row[produk_seo]' style='font-size:16px; color:green; font-weight:bold'>$row[nama_produk]</a> <br>
                                  Qty. $row[jumlah] x ".rupiah($row['harga_jual']-$row['diskon'])."<br>
                                  <span style='color:red; font-size:11px'>$row[keterangan_order]</span>
                              </td>
                              <td>Rp ".rupiah($sub_total)."</td>
                          </tr>";
                      $no++;
                    }
                    $total = $this->db->query("SELECT sum((a.harga_jual-a.diskon)*a.jumlah) as total FROM `rb_penjualan_detail` a where a.id_penjualan='".$this->uri->segment(3)."'")->row_array();
                    echo "<tr class='warning'>
                            <td colspan='2'><b>Ongkir</b></td>
                            <td><b>Rp ".rupiah($detail['ongkir'])."</b></td>
                          </tr>
                          <tr class='warning'>
                            <td colspan='2'><b>Subtotal</b></td>
                            <td><b>Rp ".rupiah($total['total'])."</b></td>
                          </tr>
                          <tr class='success'>
                            <td colspan='2'><b>Total</b></td>
                            <td><b>Rp ".rupiah($total['total']+$detail['ongkir'])."</b></td>
                          </tr>";
                    ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <table class='table table-condensed'>
                  <tbody>
                    <tr><th width='140px' scope='row'>Kurir</th>                         <td><?php echo "<span style='text-transform:uppercase'>$detail[kurir]</span> - $detail[service]"; ?></td></tr>
                    <tr><th scope='row'>Status Order</th>                        <td><?php echo status($rows['proses']);?></td></tr>
                    <tr><th scope='row'>Input No. Resi</th>                        <td>
                      <form action='<?php echo base_url()."administrator/detail_penjualan_konsumen/".$this->uri->segment(3); ?>' method='POST'>
                      <input style='color:red; width:75%; display:inline-block' type='text' value='<?php echo "$rows[no_resi]"; ?>' class='form-control' name='no_resi' required>
                      <button class='btn btn-primary' style='margin-top:-4px' type='submit' name='submit'>Proses</button>
                      </form>
                    </td></tr>
                  </tbody>
                  </table>

                  <?php 
                      $obj = cek_resi($rows['no_resi'],$rows['kode_kurir']);
                      if ($rows['no_resi']==''){
                          echo "<center style='color:red; margin:10% 0px'>No Resi untuk pesanan Tidak ditemukan, <br>Silahkan untuk input No Resi Pengiriman pada Kolom diatas.</center>";
                      }else{
                      echo "<table class='table table-condensed'>
                              <tbody>
                              <tr>
                                  <tr><td width='130'>No Resi</td>        <td>:</td><td><b>".$obj['rajaongkir']['result']['details']['waybill_number']."</b></td></tr>
                                  <tr><td>Status</td>                     <td>:</td><td><b>".$obj['rajaongkir']['result']['summary']['status']."</b></td></tr>
                                  <tr><td>Dikirim tanggal</td>            <td>:</td><td>".$obj['rajaongkir']['result']['details']['waybill_date']." ".$obj['rajaongkir']['result']['details']['waybill_time']."</td></tr>
                                  <tr><td valign='top'>Dikirim oleh</td>  <td valign='top'>:</td><td valign='top'>".$obj['rajaongkir']['result']['details']['shippper_name']."<br>".$obj['rajaongkir']['result']['details']['origin']."</td></tr>
                                  <tr><td valign='top'>Dikirim ke</td>    <td valign='top'>:</td><td valign='top'>".$obj['rajaongkir']['result']['details']['receiver_name']."<br> ".$obj['rajaongkir']['result']['details']['receiver_address1']." ".$obj['rajaongkir']['result']['details']['receiver_address2']." ".$obj['rajaongkir']['result']['details']['receiver_address3']." ".$obj['rajaongkir']['result']['details']['receiver_city']."</td></tr>
                                  <tr><td>Kurir Status</td>                 <td>:</td><td>".$obj['rajaongkir']['result']['delivery_status']['status']."</td></tr>
                              </tbody>
                          </table><br>
                          
                          <table class='table table-condensed'>
                          <thead>
                          <tr>
                              <th width='130px'><b>Tanggal</b></th>
                              <th><b>Keterangan</b></th>
                          </tr>
                          </thead>
                          <tbody>";
                          for($i=0; $i < count($obj['rajaongkir']['result']['manifest']); $i++){
                              echo "<tr>
                                      <td class='text-success'>".tgl_indo($obj['rajaongkir']['result']['manifest'][$i]['manifest_date'])." ".$obj['rajaongkir']['result']['manifest'][$i]['manifest_time']."</td>
                                      <td>".$obj['rajaongkir']['result']['manifest'][$i]['manifest_description']."</td>
                                  </tr>";
                          }
                          echo "</tbody></table>";
                      }
                  ?>
                </div>
              </div>