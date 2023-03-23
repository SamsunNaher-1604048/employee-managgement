<div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                @csrf
                <div class="col-12">
                    <label for="current_password">Enter Your Current Password</label>
                    <input type="text" class="form-control" name="current_password" aria-describedby="emailHelp" required>
                </div>

                <div class="col-12 mt-4">
                    <label for="Update_password">Enter Your Update Password</label>
                    <input type="text" class="form-control" name="update_password" aria-describedby="emailHelp" required>
                </div>
                 
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>