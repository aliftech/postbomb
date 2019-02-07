<div class="container">

    <div class="card">
    <h5 class="card-header">Registration</h5>
        <div class="card-body">
        <?php 
            if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
            </div>
        <?php endif ;?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="formGroupExampleInput">Name</label>
                    <input type="text" name="nama" class="form-control" id="formGroupExampleInput" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="text" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Gender</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option>Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Phone Number</label>
                    <input type="text" name="hp" class="form-control" id="formGroupExampleInput2" placeholder="Nomor HP">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Address</label>
                    <input type="text" name="alamat" class="form-control" id="formGroupExampleInput2" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Place of Birth</label>
                    <input type="text" name="tempat_lhr" class="form-control" id="formGroupExampleInput2" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Date of Birth</label>
                    <input type="date" name="tanggal_lhr" class="form-control" id="formGroupExampleInput2">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Password</label>
                    <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Hobby</label>
                    <input type="text" name="hobi" class="form-control" id="formGroupExampleInput2" placeholder="Hobi">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Job</label>
                    <input type="text" name="pekerjaan" class="form-control" id="formGroupExampleInput2" placeholder="Pekerjaan">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Religy</label>
                    <input type="text" name="agama" class="form-control" id="formGroupExampleInput2" placeholder="Agama atau Kepercayaan">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="registrasi" value="Sign Up">    
                </div>
            </form>
        </div>
        <div class="footer">
            <p>Have an account ? <a class="link" href="<?= base_url()?>main">Sign In</a></p>
        </div>
    </div>

</div>