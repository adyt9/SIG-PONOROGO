
    	<script type="text/javascript">
    		var cordx = [];
    	</script>
	    <div class="container-fluid full-height">
	    
        <div class="row row-height">
        
            <div class="col-lg-7 col-md-6 content-left">
            
                <div id="filters_map">
                    <div class="pull-right">
                    </div>
                </div>
                <div class="row">
                <div class="main_title">
                    <h2>Kalender<strong> Agenda</strong></h2>
                    <p><?= $text_cover[1]?></p>
                </div>
                    <div id="calendar"></div>
               
                </div>
                <!-- End row -->
            </div>
            <!-- End content-left-->

            <div class="col-lg-5 col-md-6" style="margin-top: 75px;">
             <div class="main_title">
                    <h2>Data <strong>Agenda</strong></h2>
                    <p><?= $text_cover[1]?></p>
                </div>
                <div id="data_agenda_by_click" style="display: none;">
                </div>
                <div id="data_agenda_full">
                 <?php foreach($data_agenda as $row):?>
                    <div class="col-lg-6 col-md-12 col-sm-6">
                        <div class="img_wrapper">
                            <!-- End tool_i -->
                            <div class="img_container">
                                <a href="<?= site_url('User/detail_agenda/').$row->id_agenda;?>">
                                     <img src="<?= base_url('image/').$row->gambar;?>" width="800" style="object-fit: cover;height: 200px;" class="img-responsive" alt="">
                                    <div class="short_info">
                                        <h3><?= $row->judul_agenda;?></h3>
                                        <em><span class="icon-calender"></span><?= $row->tanggal_mulai;?><?php if($row->tanggal_berakhir !='') echo ' - '.$row->tanggal_berakhir; ?></em>
                                        <em><?= $row->waktu_mulai;?></em>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- End img_wrapper -->
                    </div>
                    <script type="text/javascript">
                    	cordx.push({'id_agenda':<?= $row->id_agenda?>,'kordinat_lng': <?= $row->longitude?>,'kordinat_lat':<?= $row->latitude?>,'nama_wisata':"<?= $row->judul_agenda?>",'deskripsi':"<?= $row->deskripsi?>",'icon':"circle","waktu": "<?= $row->waktu_mulai?> - <?= $row->waktu_selesai?>","alamat" : "<?= $row->alamat?>","tgl_mulai":"<?= $row->tanggal_mulai?>","tgl_selesai":"<?= $row->tanggal_berakhir?>"});
                    </script>
                    <?php endforeach;?>
                    </div>
                <!-- map-->
            </div>

        </div>
        <!-- End row-->
    </div>
    <!-- End container-fluid -->
    
    
    
<script src="<?= base_url('asset/user_/')?>js/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
	 loadCSS = function(href) {
	     var cssLink = $("<link rel='stylesheet' type='text/css' href='"+href+"'>");
	     $("head").append(cssLink); 
	 };

	 loadJS = function(src) {
	     var jsLink = $("<script type='text/javascript' src='"+src+"'>");
	     $("head").append(jsLink); 
	 }; 
	 loadCSS("<?= base_url("asset/plugins/bower_components/bootstrap-year-calendar/bootstrap-year-calendar.min.css")?>");
	 loadJS("<?= base_url("asset/user_/js/bootstrap.min.js")?>");
	 loadJS("<?= base_url("asset/plugins/bower_components/bootstrap-year-calendar/bootstrap-year-calendar.min.js")?>");
	 
	});
</script>

<script type="text/javascript">
$("header").attr("id","plain");
$("footer").addClass("hidden-lg hidden-md hidden-sm");
$(".map").css({"position":"fixed","height":"100%"});
</script>
<script>
var source_calendars = [];
var test = [];
var id = 0;
var rand_tgl = 1;
var tempat = 12;
var name = 2;
var rand_bln = 1;
//console.log(cordx);
cordx.forEach(function(index){
    test.push(JSON.parse('{"type": "Feature", "geometry": {"type": "Point", "coordinates": ['+index.kordinat_lng+','+index.kordinat_lat+']},"properties": {"title": "'+index.nama_wisata+'","description": "<b>'+index.nama_wisata+'</b><p>'+index.deskripsi+'</p>","icon":"rocket"}}'));
	source_calendar = '{"id": '+id+++',"name" : "<b>'+index.nama_wisata+'</b>","location":"'+index.alamat+'<hr>"}';
	source_calendar = JSON.parse(source_calendar);
	source_calendar.startDate = new Date(new Date(index.tgl_mulai).getFullYear(),new Date(index.tgl_mulai).getMonth(),new Date(index.tgl_mulai).getDate() + 1);
	source_calendar.endDate = new Date(new Date(index.tgl_selesai).getFullYear(),new Date(index.tgl_selesai).getMonth(),new Date(index.tgl_selesai).getDate() + 1);
	source_calendar.lng = index.kordinat_lng;
	source_calendar.lat = index.kordinat_lat;
	source_calendar.id_agenda = index.id_agenda;
	source_calendars.push(source_calendar);
});

</script>
<script type="text/javascript">
$(function() {
    $('#calendar').calendar({
        clickDay: function(e){
        	if(e.events.length > 0) {
    			$("#data_agenda_full").hide();
    			$("#data_agenda_by_click").show();
    			$.ajax({
					url : "<?= site_url('User/getAgendaById')?>",
					type : "POST",
					data : {data : e.events},
					beforeSend : function(){
					},
					success : function(x){
						var Obj = JSON.parse(x);
						var content = "";
						Obj.forEach(function(index){
							console.log(index);
							 content += '<div class="col-lg-6 col-md-12 col-sm-6">'
		                        +'<div class="img_wrapper">'
		                            +'<div class="img_container">'
		                                +'<a href="<?= site_url('User/detail_agenda/');?>'+index.id_agenda+'">'
		                                     +'<img src="<?= base_url('image/');?>'+index.gambar+'" width="800" style="object-fit: cover;height: 200px;" class="img-responsive" alt="">'
		                                    +'<div class="short_info">'
		                                        +'<h3>'+index.judul_agenda+'</h3>'
		                                        +'<em><span class="icon-calender"></span>'+index.tanggal_mulai+'-'+index.tanggal_berakhir+' </em>'
		                                        +'<em>'+index.waktu_mulai+'</em>'
		                                        +'</div>'
                                        +'</a>'
                                    +'</div>'
                                +'</div>'
                            +'</div>';
		                    $("#data_agenda_by_click").html(content);
						});
					}
        		});
        	}else{
    			$("#data_agenda_full").show();
    			$("#data_agenda_by_click").hide();
        	}
        },
    	mouseOnDay: function(e) {
        if(e.events.length > 0) {
            var content = '';
            
            for(var i in e.events) {
                content += '<div class="event-tooltip-content">'
                                + '<div class="event-name" style="color:' + e.events[i].color + '">' + e.events[i].name + '</div>'
                                + '<div class="event-location">' + e.events[i].location + '</div>'
                            + '</div>';
            }
        
            $(e.element).popover({
                trigger: 'manual',
                container: 'body',
                html:true,
                content: content
            });
            
            $(e.element).popover('show');
        }
    },
    mouseOutDay: function(e) {
        if(e.events.length > 0) {
            $(e.element).popover('hide');
        }
    },  
    dataSource: source_calendars

    });
});

</script>
    	
