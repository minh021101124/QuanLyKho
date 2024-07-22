@extends('app')
  
@section('content')
<div class="row">
    <h1>Laravel Fetch Data using Jquery Ajax and show data in modal with pagination | Laravel 9</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->ma_don }}</td>
                <td>{{ $user->price }}</td>
                <td>
                    <a 
                        href="javascript:void(0)"
                        id="show-user"
                        data-url="{{ route('users.show', $user->id) }}"
                        class="btn btn-info"
                        >Show</a>
                </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">{{ $users->links() }}</div>
 
<!-- Modal -->
<div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Show User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>ID:</strong> <span id="user-id"></span></p>
        <p><strong>Name:</strong> <span id="user-name"></span></p>
        <p><strong>Email:</strong> <span id="user-email"></span></p>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 
</div>
@endsection
 
@section('script')
<script type="text/javascript">
       
    $(document).ready(function () {
        
        $('body').on('click', '#show-user', function () {
          var userURL = $(this).data('url');
          $.get(userURL, function (data) {
              $('#userShowModal').modal('show');
              $('#user-id').text(data.id);
              $('#user-name').text(data.ma_don);
              $('#user-email').text(data.price);
          })
       });
        
    });
   
</script>
@endsection