<div class="panel panel-default block1">
                            <div class="panel-heading"><h3>Video</button></h3></div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                     <?php foreach($video as $row): ?>
                        <div class='col-md-4 col-xs-12 col-sm-6'>
	                 <video id="video_p" poster="<?= base_url('image/').$row->cover; ?>"  height="200" style="object-fit:cover;object-position:bottom;" controls><source width="200" id="video_wisata" src="<?= base_url('video/').$row->nama_video; ?>" type="video/mp4">
                     </video>
                     <div class="text-muted"><span class="m-r-10"><h3><b> <?php echo $row->judul;?></b><br/><a href="<?= site_url('User/info_detail/video/').$row->id_video; ?>" class="btn btn-success btn-rounded btn-outline waves-effect waves-light m-t-20">Lihat Selengkapnya</a></h3></span></div>
                        </div>

                    <?php endforeach;?>
                               </div>
                            </div>
                        </div>
   