<body style="background-color: #c23616">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <img class="col-lg-6 d-none d-lg-block" src="https://puu.sh/FD0vn.png">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                <br/><br/><br/><br/><h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
                  <form class="user" action="<?php echo base_url(). 'auth/tambah_aksi'; ?>" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" placeholder="Username"required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password"required="required">
                    </div>
                    <div class="form-group">
                             <!-- <label>Level</label> -->
                      <input type="hidden" class="form-control" name="level" placeholder="level" required="required" value="2">
                    </div>
                    <button style="background-color: #c23616" type="submit" name="register" class="btn btn-dark btn-user btn-block" >Register Account</button>
                  </form>
              <br>
              <br>
              <div class="text-center">
                <a class="small" href="<?php echo base_url(). 'auth'; ?>">Already have an account? Login!</a>
              </div>
              <br/><br/><br/><br/>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>