<div class="modal fade " id="leaveapply" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Leave Apply form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('leaveapply')}}" method="post">
                @csrf
                <div class="col-12 mt-3">
                    <label for="leave_day">Enter Total Leave Day</label>
                    <input type="text" class="form-control" name="leave_day" aria-describedby="emailHelp" required>
                </div>
               
                <div class="col-12 mt-3">
                    <label for="from_date">Start Leave Day</label>
                    <input type="date" class="form-control" name="from_date" aria-describedby="emailHelp" required>
                </div>

                <div class="col-12 mt-3">
                    <label for="to_date">End Leave Day</label>
                    <input type="date" class="form-control" name="to_date" aria-describedby="emailHelp" required>
                </div>
               
                <div class="col-12 mt-3">
                    <label for="date_to_join">Date of Joining</label>
                    <input type="date" class="form-control" name="date_to_join" aria-describedby="emailHelp" required>
                </div>

                <div class="col-12 mt-3">
                    <label for="leave_type">Type of Leave</label>
                    <select class="form-select" aria-label="Default select example" name="leave_type">
                        <option value="Personal">Personal</option>
                        <option value="Sick">Sick</option>
                        <option value="Planned">Planned</option>
                        <option value="In-Lieu-of">In Lieu of</option>
                        <option value="Vacation">Vacation</option>
                        <option value="Maternity">Maternity</option>
                        <option value="Other">Other</option>
                      </select>
                </div>

                <div class="col-12 mt-3">
                    <label for="resone">Resone of leave</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="resone"></textarea>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit Application</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>