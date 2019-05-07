         </div><!-- /.blog-main -->
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Made with &#x2764; in <a href="license.html"> Houston, Texas</a></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
	
	
	 <!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Add New Tool</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

</div>
<div class="modal-body">

<div class="form-group">
<label for="tool_name">Tool Name:</label>
<input type="text" id="tool_name" placeholder="Tool Name" class="form-control" />
</div>

<div class="form-group">
<label for="link_name">Url Link:</label>
<input type="text" id="link_name" placeholder="Link" class="form-control" />
</div>

<div class="form-group">
<label for="qty">Quantity:</label>
<input type="text" id="qty" placeholder="Quantity" class="form-control" />
</div>

<div class="form-group">
<label for="stat">Status:</label>
<select class="form-control" id="stat">
     <option value="2" selected="selected">Pending</option>
     <option value="1">Complete</option>
</select>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-danger" onclick="addRecord()">Add Tool</button>
</div>
</div>
</div>
</div>




<!-- Modal - Update User details -->
<div class="modal fade" id="updateusermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
			
            <div class="modal-body">
				<div class="form-group">
                <label for="update_tool_name">Tool Name:</label>
                <input type="text" id="update_tool_name" placeholder="Tool Name" class="form-control" />
                </div>
				
                <div class="form-group">
                <label for="update_link_name">Link URL:</label>
                <input type="text" id="update_link_name" placeholder="Link Url" class="form-control" />
                </div>
				
                <div class="form-group">
                <label for="update_qty">Quantity:</label>
                <input type="text" id="update_qty" placeholder="Quantity" class="form-control" />
                </div>
				

                <div class="form-group">
                <label for="update_stat">Status:</label>
                <select class="form-control" id="update_stat">
                <option value="2" selected="selected">Pending</option>
                <option value="1">Complete</option>
                </select>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->




<!-- Bootstrap Modal - To Add New user -->
<!-- Modal -->
<div class="modal fade" id="add_new_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Add New User</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

</div>
<div class="modal-body">

<div class="form-group">
<label for="admin_username">Username:</label>
<input type="text" id="admin_username" placeholder="Username" class="form-control" />
</div>

<div class="form-group">
<label for="admin_password">Password:</label>
<input type="text" id="admin_password" placeholder="password" class="form-control" />
</div>


<div class="form-group">
<label for="access">access:</label>
<select class="form-control" id="access">
     <option value="0" selected="selected">User</option>
     <option value="1">Admin</option>
</select>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-danger" onclick="addUser()">Add User</button>
</div>
</div>
</div>
</div>







<!-- Modal - Update User details -->
<div class="modal fade" id="updateaccessmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
			
			<div class="modal-body">
			
            <div class="form-group">
<label for="update_admin_username">Username:</label>
<input type="text" id="update_admin_username" placeholder="Username" class="form-control" />
</div>

<div class="form-group">
<label for="update_admin_password">Password:</label>
<input type="text" id="update_admin_password" placeholder="password" class="form-control" />
</div>


<div class="form-group">
<label for="update_access">access:</label>
<select class="form-control" id="update_access">
     <option value="0" selected="selected">User</option>
     <option value="1">Admin</option>
</select>
</div>
                
				
				
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->


  <!-- Scripts -->

  


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="js/common.js"></script>

  <script src="js/datepicker.js"></script>
  <script src="js/datepicker.en-US.js"></script>
  <script src="js/main.js"></script>




 



   
  </body>
</html>
