{{-- add new Outlet modal start --}}
<div class="modal fade" id="addOutletModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Outlet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_outlet_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
          </div>
          <div class="my-2">
            <label for="phone">Phone</label>
            <input type="text" autocomplete="off" name="phone" class="form-control" placeholder="Phone" required>
          </div>
          <div class="my-2">
            <label for="image">Select Image</label>
            <input type="file" name="image" class="form-control" required>
          </div>
          <div class="my-2">
            <label for="map">Select Outlet</label>
            <div id="map"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_outlet_btn" class="btn btn-primary">Add Outlet</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new Outlet modal end --}}

{{-- edit Outlet modal start --}}
<div class="modal fade" id="editOutletModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Outlet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_outlet_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="outlet_id">
        <input type="hidden" name="image" id="outlet_image">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
            </div>
          </div>
          <div class="my-2">
            <label for="phone">Phone</label>
            <input type="text" id="phone" autocomplete="off" name="phone" class="form-control" placeholder="Phone" required>
          </div>
          <div class="my-2">
            <label for="image">Select Image</label>
            <input type="file" name="image" class="form-control">
          </div>
          <div class="mt-2" id="image">

          </div>
          <div class="my-2">
            <label for="map">Select Outlet</label>
            <div id="map1"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_outlet_btn" class="btn btn-success">Update Outlet</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit Outlet modal end --}}

{{-- map style  --}}
