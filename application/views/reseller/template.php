<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WELCOME RESELLER</title>
    <meta name="author" content="phpmu.com">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/<?php echo favicon(); ?>" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/admin/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>
    <script type="text/javascript" src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
    <style type="text/css">
      #example thead tr, #table1 thead tr, #example1 thead tr, #example2 thead tr{ background-color: #e3e3e3; } .checkbox-scroll { border:1px solid #ccc; width:100%; height: 114px; padding-left:8px; overflow-y: scroll; }
      .blink_me{
            animation:blinker 1s linear infinite;color:red
        }
        .blink_me:hover{
            animation:blinker 0s linear infinite;color:orange
        }
        @keyframes blinker{
            50%{opacity:0}
        }

        .mb-10{
          margin-bottom:0px;
        }
        .pricing-table-product-box {
            -webkit-box-shadow: 0 4px 9px 0 rgba(67,65,79,.1);
            box-shadow: 0 4px 9px 0 rgba(67,65,79,.1);
            border: solid 2px #f5f5f5;
        }
        .harga {
            font-size: 3em;
            font-weight: 700;
            line-height: .8em;
          display:inline-block;
        }
        .currency {
            font-size: 1em;
            font-weight: 700;
            margin-top: .2em;
          display:inline-block;
        }
        .waktu {
            font-size: .7em;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end;
            margin: .3em;
          display:inline-block;
        }
        .waktu_block{
          display:inline-block;
        }
      </style>
    
  </head>

  <body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
          <?php include "main-header.php"; ?>
      </header>

      <aside class="main-sidebar">
          <?php include "menu-reseller.php"; ?>
      </aside>

      <div class="content-wrapper">
        <section class="content-header">
          <h1> Dashboard <small>Control panel </small> </h1>
        </section>

        <section class="content">
            <?php 
            if (cek_paket($this->session->id_reseller)=='0'){
              if ($this->uri->segment('2')=='home'){
                echo "<div class='alert alert-danger'><strong>PENTING</strong> - Yuk upgrade Akunnya jadi STAR SELLER agar produknya makin laris, <a class='blink_me' href='".base_url()."reseller/upgrade'>Klik Disini</a> untuk Upgrade akun.</div>";
              }
            }
              echo $contents; 
            ?>
        </section>
        <div style='clear:both'></div>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
          <?php include "footer.php"; ?>
      </footer>

    </div><!-- ./wrapper -->
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>asset/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>asset/admin/dist/js/app.min.js"></script>
    <script>
    $('.datepicker').datepicker();
    $('#rangepicker').daterangepicker();
      $(function () { 
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

        $('#example3').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "info": true,
          "autoWidth": false,
          "pageLength": 10,
          "order": [[ 4, "desc" ]]
        });

      });

      var url = window.location;
      // for sidebar menu entirely but not cover treeview
      $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
      }).parent().addClass('active');

      // for treeview
      $('ul.treeview-menu a').filter(function() {
        return this.href == url;
      }).closest('.treeview').addClass('active');

      $(function () {
        $(".textarea").wysihtml5();
      });
  </script>
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

  <div class="modal fade" id="rekening" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title" id="myModalLabel">Rekening Perusahaan</h5>
      </div>
      <div class="modal-body">
      <div class='alert alert-danger'><center>Silahkan Transfer Tagihan untuk transaksi pembelian anda ke no rekening dibawah ini dan selanjutnya lakukan konfirmasi pembayaran. Terima kasih,.. </center></div><hr style='margin:3px'>
      <table class='table table-condensed'>
                  <?php 
                    $rekening = $this->model_app->view('rb_rekening');
                    $no = 1;
                    foreach ($rekening->result_array() as $row){
                      echo "<tr class='info'><td width=150px><b>Nama Bank</b></td>   <td>$row[nama_bank]</td></tr>
                      <tr><td><b>No Rekening</b></td>       <td>$row[no_rekening]</td></tr>
                      <tr><td><b>Pemilik Rekening</b></td>  <td>$row[pemilik_rekening]</td></tr>";
                      if ($no==1){ echo "<tr><td colspan='2'><br></td></tr>";}
                      $no++;
                    }
                  ?>
      </table><br>
      <div style='clear:both'></div>
      </div>
    </div>
  </div>
</div>
  </body>
</html>
