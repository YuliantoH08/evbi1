<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * FROM `event` where id = '{$_GET['id']}'");
    if($qry->num_rows){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<style>
    .banner-img{
		object-fit:scale-down;
		object-position:center center;
        height:30vh;
        width:calc(100%);
	}
</style>
<div class="content py-4">
    <div class="card card-outline card-primary shadow rounded-0">
        <div class="card-header rounded-0">
            <h5 class="card-title"><?= isset($id) ? "Update Event-{$event_code} Details" : "Add Event" ?></h5>
        </div>
        <div class="card-body rounded-0">
            <div class="container-fluid">
                <form action="" id="event-form">
                    <input type="hidden" name="id" value="<?= isset($id) ? $id : "" ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama_event" class="control-label text-navy">Judul Event</label>
                                <input type="text" name="nama_event" id="nama_event" autofocus placeholder="Judul Event" class="form-control form-control-border" value="<?= isset($nama_event) ?$nama_event : "" ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="event_list_id" class="control-label">Jenis Event</label>
                        <select name="event_list_id" id="event_list_id" class="form-control form-control-border" required data-placeholder="Select Deparment Here">
                            <option <?= !isset($event_list_id) == 1 ? "selected" :"" ?>></option>
                            <?php 
                            $event_list = $conn->query("SELECT * FROM `event_list` where `status` = 1 ".(isset($event_list_id) ? "OR id = '{$event_list_id}'" : "")." order by `name` asc");
                            while($row = $event_list->fetch_assoc()):
                            ?>
                            <option value="<?= $row['id'] ?>" <?= isset($event_list_id) && $event_list_id == $row['id'] ? "selected" : "" ?>><?= ucwords($row['name']) ?></option>
                            <?php endwhile; ?>
                        </select>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label for="lokasi" class="control-label">Lokasi</label>
                            <select name="lokasi" id="lokasi" class="form-control form-control-border" required data-placeholder="Pilih Lokasi">
                                <option <?= !isset($department_id) == 1 ? "selected" :"" ?>></option>
                                <?php 
                                $department = $conn->query("SELECT * FROM `department_list` where `status` = 1 ".(isset($department_id) ? "OR id = '{$department_id}'" : "")." order by `name` asc");
                                while($row = $department->fetch_assoc()):
                                ?>
                                <option value="<?= $row['id'] ?>" <?= isset($department_id) && $department_id == $row['id'] ? "selected" : "" ?>><?= ucwords($row['name']) ?></option>
                                <?php endwhile; ?>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tanggal_dimulai" class="control-label text-navy">Tanggal Event</label>
                                <input name="tanggal_dimulai" id="tanggal_dimulai" class="form-control form-control-border" value="<?= isset($tanggal_dimulai) ?$tanggal_dimulai : "" ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="deskripsi" class="control-label text-navy">Deskripsi</label>
                                <textarea rows="3" name="deskripsi" id="deskripsi" placeholder="deskripsi" class="form-control form-control-border summernote" required><?= isset($deskripsi) ? html_entity_decode($deskripsi) : "" ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-default bg-navy btn-flat"> Update</button>
                                <a href="./?page=profile" class="btn btn-light border btn-flat"> Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }else{
            $('#cimg').attr('src', "<?= validate_image(isset($avatar) ? $avatar : "") ?>");
        }
	}
    $(function(){
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                [ 'style', [ 'style' ] ],
                [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ],
                [ 'fontsize', [ 'fontsize' ] ],
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                [ 'table', [ 'table' ] ],
                ['insert', ['link', 'picture']],
                [ 'view', [ 'undo', 'redo', 'help' ] ]
            ]
        })
        $('.summernote-list-only').summernote({
            height: 200,
            toolbar: [
                [ 'font', [ 'bold', 'italic', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ]
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul' ] ],
                [ 'view', [ 'undo', 'redo', 'help' ] ]
            ]
        })
        // event Form Submit
        $('#event-form').submit(function(e){
            e.preventDefault()
            var _this = $(this)
                $(".pop-msg").remove()
            var el = $("<div>")
                el.addClass("alert pop-msg my-2")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_event",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType:'json',
                error:err=>{
                    console.log(err)
                    el.text("An error occured while ving the data")
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('slow')
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'success'){
                    }else if(!!resp.msg){
                        el.text(resp.msg)
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    }else{
                        el.text("An error occured while saving the data")
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    }
                    end_loader();
                    $('html, body').animate({scrollTop: 0},'fast')
                }
            })
        })
    })
</script>
<script>
$(function() {
  $('input[name="tanggal_dimulai"]').daterangepicker({
    opens: 'left'
  });
});
</script>