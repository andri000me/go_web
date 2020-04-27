<body style="background-color: #c23616;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <img class="col-lg-6 d-none d-lg-block" src="https://puu.sh/FD0sR.png">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <br/><br/><br/><br/><h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                    <form class="user" action="<?php echo $action ?>" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" placeholder="Username"required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password"required="required">
                    </div>
                    <button style="background-color: #c23616;" type="submit" name="login" class="btn btn-dark btn-user btn-block" >Login</button>
                  </form>
                  <br>
                  <br>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url(). 'auth/register'; ?>">Create an Account!</a>
                  </div>
                  </br>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</body>
