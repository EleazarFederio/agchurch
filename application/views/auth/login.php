<section class="container-fluid">
    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-3">
            <form class="form-container" action="<?php echo base_url().'loginAuthentication'?>" method="post">
                <h1 class="text-center font-weight-bold">Login</h1>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <small><?php echo $this->session->flashdata('error'); ?></small>
            </form>
        </section>
    </section>
</section>