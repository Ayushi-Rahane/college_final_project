<!--update Orders -->
<div class="modal fade" id="upAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Admin</h1> 
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div> 
         <div class="modal-body">
            <form action="../partials/handlers/_adminUphandler.php" method="post" enctype="multipart/form-data" id="adForm">
               <div class="bg-light rounded h-100 p-4">
               <div class="hidId" id="hidId"></div>
                  <input type="hidden" name="adminId" id="adminId">     
                  <div class="input-group mb-3">
                     <label class="input-group-text" for="inputGroupSelect01">Admin Status</label>
                     <select class="form-select" id="ad1" name="ad1" required>
                        <option selected>Choose...</option>
                        <option value="Active">Active</option>
                        <option value="Freeze">Freeze</option>
                     </select>
                  </div>
                  <!-- <button type="submit" class="btn btn-info">Add a Product</button> -->
               </div>
               <!-- </form> -->
         </div>
         <div class="modal-footer" style="justify-content: start;">
            <button type="submit" class="btn btn-dark">Save</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger btn-del" data-bs-dismiss="modal">Delete a Admin</button>
         </div>
      </form>
      </div>
   </div>
</div>