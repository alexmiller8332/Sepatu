<?php if (config('market_sample')==1){ ?>
<div class="alert alert-warning alert-dismissible" style='background-color:#d0d0d0 !important; border-color:#a2a2a2;'>
  <i class="icon fa fa-warning text-danger"></i> <span style='color:#000'>Klik tombol Berikut untuk menghapus Sample/Dummy Data.</span> 
  <a style='text-decoration:none; margin-left:3px; color:#000' class='pull-right btn btn-default btn-xs' href='<?= base_url().$this->uri->segment(1); ?>/format_data?hide=0'>Hide</a>
  <a style='text-decoration:none' class='pull-right btn btn-danger btn-xs' href='<?= base_url().$this->uri->segment(1); ?>/format_data' onclick="return confirm('Apa anda yakin untuk Format Sample/Dummy Data?')">Format Data</a>
</div>
<?php } ?>

<?php 
echo $this->session->flashdata('message');
$this->session->unset_userdata('message');
?>

<a class='hidden-xs' style='color:#000' href='<?php echo base_url().$this->uri->segment(1); ?>/produk'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Produk</span>
        <?php $jmla = $this->model_app->view('rb_produk')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmla; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <a class='hidden-xs' style='color:#000' href='<?php echo base_url().$this->uri->segment(1); ?>/konsumen'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Konsumen</span>
        <?php $jmlb = $this->model_app->view('rb_konsumen')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmlb; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <a class='hidden-xs' style='color:#000' href='<?php echo base_url().$this->uri->segment(1); ?>/reseller'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Reseller</span>
        <?php $jmlc = $this->model_app->view('rb_reseller')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmlc; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <a class='hidden-xs' style='color:#000' href='<?php echo base_url().$this->uri->segment(1); ?>/komplain'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-warning"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Komplain</span>
        <?php $jmld = $this->model_app->view_where('rb_pusat_bantuan',array('putusan'=>'proses'))->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmld; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>


<section class="col-lg-7 connectedSortable">
  <?php 
    $jmlpesan = $this->model_app->view_where('hubungi', array('dibaca'=>'N'))->num_rows(); 
    $jmlberita = $this->model_app->view_where('komentar', array('aktif'=>'N'))->num_rows(); 
    $jmlvideo = $this->model_app->view_where('komentarvid', array('aktif'=>'N'))->num_rows(); 
  ?>
  <div class='box'>
    <div class='box-header'>
      <h3 class='box-title'>Application Buttons</h3>
    </div>
    <div class='box-body'>
    <?php if (config('license')=='Y'){ ?>
    <div class="alert alert-success alert-dismissible">
      <i class="icon fa fa-check-square-o"></i> <span>Butuh Lisensi baru <b>(Diskon 50%+50%)</b> untuk bisnis/domain anda yang lainnya? </span> 
      <a style='text-decoration:none; margin-left:3px' class='pull-right btn btn-danger btn-xs' href='<?= base_url().$this->uri->segment(1); ?>/format_data?lisensi=0'>Jangan tampilkan lagi!</a>
      <a style='text-decoration:none; color:#000; font-weight:bold' class='pull-right btn btn-default btn-xs' target='_BLANK' href='<?php echo "https://api.whatsapp.com/send?phone=".format_telpon('081267771344')."&amp;text=Hallo%20kak!,%20Saya%20Mau%20Order%20Lisensi%20baru%20TAJALAPAK%20Marketplace%20PRO%20untuk%20domain%20saya%20yang%20lain..."; ?>'>Beli Lisensi</a>
    </div>
    <?php 
    } 
    $date_notif = array("0102", "0104", "0106", "0108","0110","0112");
    if (in_array(date('dm'), $date_notif)){
      $tajalapak_notif = get_cookie('tajalapak');
      if($tajalapak_notif == ''){
        $this->model_app->update('rb_config', array('value'=>'Y'),array('field'=>'license'));
      }
    }
  ?>


      <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda 
          atau pilih ikon-ikon pada Control Panel di bawah ini : </p>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/identitaswebsite" class='btn btn-app'><i class='fa fa-th'></i> Identitas</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/menuwebsite" class='btn btn-app'><i class='fa fa-th-large'></i> Menu</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/halamanbaru" class='btn btn-app'><i class='fa fa-file-text'></i> Halaman</a>
      
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/konsumen" class='btn btn-app'><i class='fa fa-user'></i> Konsumen</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/reseller" class='btn btn-app'><i class='fa fa-users'></i> Reseller</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/paket" class='btn btn-app'><i class='fa fa-th-large'></i> Paket</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/supplier" class='btn btn-app'><i class='fa fa-truck'></i> Supplier</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/produk" class='btn btn-app'><i class='fa fa-shopping-cart'></i> Produk</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/tagpro" class='btn btn-app'><i class='fa fa-paint-brush'></i> Merek</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/testimoni" class='btn btn-app'><i class='fa fa-comments-o'></i> Testimoni</a>

      <a href="<?php echo base_url().$this->uri->segment(1); ?>/listberita" class='btn btn-app'><i class='fa fa-television'></i> Berita</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/kategoriberita" class='btn btn-app'><i class='fa fa-bars'></i> Kategori</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/tagberita" class='btn btn-app'><i class='fa fa-tag'></i> Tag Berita</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/iklansidebar" class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Sidebar</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/banner" class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Link</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/logowebsite" class='btn btn-app'><i class='fa fa-circle-thin'></i> Logo</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/templatewebsite" class='btn btn-app'><i class='fa fa-file'></i> Template</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/background" class='btn btn-app'><i class='fa fa-circle'></i> Background</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/manajemenuser" class='btn btn-app'><i class='fa fa-user-secret'></i> Users</a>
    </div>
  </div>
</section><!-- /.Left col -->

<section class="col-lg-5 connectedSortable">
    <?php include "grafik.php"; ?>
</section><!-- right col -->
