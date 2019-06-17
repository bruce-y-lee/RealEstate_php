<?php 
    include("$_SERVER[DOCUMENT_ROOT]/api/auth/google_oauth.php");
?>

<!-- LOGIN Modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <!-- Modal content login-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login with username and password</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">

                      <div class="form-group">
                        <label for="email">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                      </div>
                      <div class="checkbox">
                        <label>
                        <input type="checkbox" name="admin" value = "yes"> Login as admin 
                        </label>
                      </div>
                      
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-default" name ="login" value="Submit">Submit</button>
        </form>
        <br/>
        <br/>
        <?php if (isset($googleAuthUrl)): ?>
		<form action="<?php echo $googleAuthUrl; ?>" method="post">
		<button type="submit" class="btn btn-primary btn-block">
	  Login with Google
		</button>
        </form>
        <?php elsif: ?>
        <?php endif ?>
      </div>
    </div>

  </div>
</div>