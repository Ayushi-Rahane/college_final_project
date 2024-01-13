<div class="modal fade" id="updateproducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update a Product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="../partials/handlers/_updateproductshandler.php" method="post" enctype="multipart/form-data"
               id="uproductform">
               <div class="bg-light rounded h-100 p-4" id="upproduct">
                  <div class="hidId" id="hidId"></div>
                  <input type="hidden" name="proId" id="pro">
                  <!-- <input type="hidden" name="deleteId" id="delprid"> -->
                  <!-- <h5 class="mb-4 text-center" id="category-add">Add a Product</h5> -->
                  <div class="input-group mb-3">
                     <span class="input-group-text" id="basic-addon11">Product Name</span>
                     <input type="text" class="form-control" id="prname" name="productName" placeholder="Product"
                        aria-label="Username" aria-describedby="basic-addon1" required>
                  </div>

                  <div class="form-floating mb-3">
                     <textarea class="form-control" placeholder="Leave a comment here" name="product_desc"
                        id="product_desc" style="height: 100px"></textarea>
                     <label for="floatingTextarea2">Comments</label>
                  </div>

                  <div class="input-group mb-3">
                     <input type="file" class="form-control" name="product_image" id="product_image">
                     <label class="input-group-text" for="inputGroupFile02">Upload</label>
                  </div>
                  
                  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                     <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                     <label class="btn btn-outline-primary" for="btnradio1">Image Update</label>

                     <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" checked>
                     <label class="btn btn-outline-primary" for="btnradio2">No image Update</label>
                  </div>

            

                  <!-- <button type="submit" class="btn btn-info">Add a Product</button> -->
               </div>
               <!-- </form> -->
         </div>
         <div class="modal-footer" style="justify-content: start;">
            <button type="submit" class="btn btn-dark product_save">Save</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-del btn-danger" data-bs-dismiss="modal">Delete a Product</button>
         </div>
         </form>
      </div>
   </div>
</div>