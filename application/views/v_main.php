    <div class="container">
    <div class="card">
        <div class="card-header">
            Sign In
        </div>
        <div class="card-body">
        <?php 
            if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
            </div>
        <?php endif ;?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="formGroupExampleInput">Email</label>
                    <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Password</label>
                    <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Sign In">
                </div>    
            </form>
        </div>
        <div class="registration">
            <p>Don't have an account yet ? <a class="link" href="<?= base_url()?>main/daftar">Sign Up</a></p>
        </div>
    </div>
    </div>