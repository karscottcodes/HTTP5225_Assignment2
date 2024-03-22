
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Login Your Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action=""  method="POST" class="row g-3 needs-validation" id="form" novalidate>
          <p id="error_message" ><?php echo $login_error_message;?></p>
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" placeholder="Email"required>
                <div class="invalid-feedback">
                  Please enter email.
                </div>
              </div>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
              <div class="input-group has-validation">
                  <input type="password" class="form-control" id="password" name="password" aria-describedby="inputGroupPrepend"  placeholder="Password"required>
                  <div class="invalid-feedback">
                    Please enter password.
                  </div>
              </div>
          </div>
          <div>
            <button type="submit" id="btnlog" name="login" class="btn btn-secondary text-white mt-3">Submit</button>
          </div>
            

        </form>
      </div>
        
    </div>
</div>
</div>
