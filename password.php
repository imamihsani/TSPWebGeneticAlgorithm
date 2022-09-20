<div class="page-header">
    <div class="alert alert-dark" role="alert">
    <h1 style="color:black;">Akun</h1>
    </div>
</div>
<div class="row">
    
    <div class="col-sm-5">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post" action="?m=password&act=password_ubah">
            <div class="form-group">
                <label>Password Lama <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass1" />
            </div>
            <div class="form-group">
                <label>Password Baru <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass2" />
            </div>
            <div class="form-group">
                <label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass3" />
            </div>
           <button class="btn btn-warning"><span class="glyphicon glyphicon-save"></span> Simpan</button>
           <button class="btn btn-danger"><a href="aksi.php?act=logout" style="color: white;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></button>
        </form>
        
    </div>

</div>