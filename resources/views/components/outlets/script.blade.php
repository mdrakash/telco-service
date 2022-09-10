<script>
    $(function() {
      // add new User ajax request
      $("#add_user_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_user_btn").text('Adding...');
        $.ajax({
          url: '{{ route('user.store') }}',
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
                'User Added Successfully!',
                'success'
              )
              fetchAllUsers();
            }
            $("#add_user_btn").text('Add User');
            $("#add_user_form")[0].reset();
            $("#addUserModal").modal('hide');
          }
        });
      });

      // edit User ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('user.edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#name").val(response.name);
            $("#email").val(response.email);
            $("#user_id").val(response.id);
          }
        });
      });

      // update User ajax request
      $("#edit_user_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_user_btn").text('Updating...');
        $.ajax({
          url: '{{ route('user.update') }}',
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
                'User Updated Successfully!',
                'success'
              )
              fetchAllUsers();
            }
            $("#edit_user_btn").text('Update User');
            $("#edit_user_form")[0].reset();
            $("#editUserModal").modal('hide');
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
              url: '{{ route('user.delete') }}',
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
                fetchAllUsers();
              }
            });
          }
        })
      });

      // fetch all employees ajax request
      fetchAllUsers();

      function fetchAllUsers() {
        $.ajax({
          url: '{{ route('user.fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_users").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>