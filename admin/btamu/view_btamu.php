<?php
require_once('../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * from `btamu` order by `id` desc");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none !important;
    }
</style>
<div class="container-fluid">
    <dl>
        <dt class="text-muted">Buku Tamu</dt>
        <dt class="text-muted">Nama</dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($tfname) ? $tfname : '' ?>. <?= isset($tlname) ? $tlname : '' ?> </dd>
        <dt class="text-muted">Phone</dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($phone) ? $phone : '' ?></dd>
        <dt class="text-muted">Instansi</dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($instansi) ? $instansi : '' ?></dd>
        <dt class="text-muted">Email</dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($email) ? $email : '' ?></dd>
        <dt class="text-muted">Pesan</dt>
        <dd class='pl-4'>
            <p class=""><?= isset($pesan) ? $pesan : '' ?></p>
        </dd>
    </dl>
    <div class="col-12 text-right">
        <button class="btn btn-flat btn-sm btn-dark" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>