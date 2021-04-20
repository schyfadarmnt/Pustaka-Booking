<?=$this->session->flashdata('pesan');?>
  <div style="padding: 25px;">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
  <?php
    foreach ($buku as $buku)
{
  ?>
  <div class="col-md-2 col-md-3">
  <div class="thumbnail" style="height: 380px;">
    <img src="<?php echo base_url(); ?>assets/img/upload/<?= $buku->image; ?>" style="max-width:100%; maxheight: 100%; height: 200px; width: 180px">
  <div class="caption">
    <h5 style="min-height:5px;"><?= $buku->pengarang ?>
    </h5>
    <h5><?= $buku->penerbit ?></h5> 
    <h5><?= substr($buku->tahun_terbit, 0, 4) ?></h5>
    <p>
  <?php
  if ($buku->stok < 1)
  {
    echo "<i class='btn btn-outline-primary fas fw fa-shopping-cart'> Booking&nbsp;&nbsp 0</i>";
  }
  else
  {
    echo "<a class='btn btn-outline-primary fas fw fa-shopping-cart' href='" . base_url('booking/tambahBooking/' . $buku->id) . "'> Booking</a>";
  }
  ?>
  <a class="btn btn-outline-warning fas fw fa-search" href="<?= base_url('home/detailBuku/' . $buku->id); ?>"> Detail
  </a>
    </p>
      </div>
        </div>
          </div>
<?php
}
?>
  </div>
    </div>
      </div>
        </div>
