<script>
    let lat= 23.8103;
    let lng= 90.4125;
    $(function() {
      // add new Outlet ajax request
      $("#add_outlet_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        fd.append('latitude', lat);
        fd.append('longitude', lng);
        $("#add_outlet_btn").text('Adding...');
        $.ajax({
          url: '{{ route('outlet.store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Outlet Added Successfully!',
                'success'
              )
              fetchAllOutlets();
            }
            $("#add_outlet_btn").text('Add User');
            $("#add_outlet_form")[0].reset();
            $("#addOutletModal").modal('hide');
          },
          error: function(error) {
            $("#addOutletModal").modal('hide');
            Swal.fire(
                'Error!',
                `${error.responseJSON.message}`,
                'error'
              )
          }
        });
      });

      // edit Outlet ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('outlet.edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#name").val(response.name);
            $("#phone").val(response.phone);
            $("#outlet_id").val(response.id);
            $("#image").html(
              `<img src="storage/images/${response.image}" width="100" class="img-fluid img-thumbnail">`);
            $("#outlet_image").val(response.image);
            // $("#image_url").val(response.image);
          }
        });
      });

      // update Outlet ajax request
      $("#edit_outlet_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        fd.append('latitude', lat);
        fd.append('longitude', lng);
        $("#edit_outlet_btn").text('Updating...');
        $.ajax({
          url: '{{ route('outlet.update') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Updated!',
                'Outlet Updated Successfully!',
                'success'
              )
              fetchAllOutlets();
            }
            $("#edit_outlet_btn").text('Update Outlet');
            $("#edit_outlet_form")[0].reset();
            $("#editOutletModal").modal('hide');
          }
        });
      });

      // delete User ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('outlet.delete') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                fetchAllOutlets();
              }
            });
          }
        })
      });

      // fetch all Outlets ajax request
      fetchAllOutlets();

      function fetchAllOutlets() {
        $.ajax({
          url: '{{ route('outlet.fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_outlets").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>