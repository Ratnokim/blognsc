@extends('layouts.admin.app2')

@section('assets-top')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection


@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA USER
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">User Management</a></li>
        <li class="active">Data User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('layouts._flash')
                        <button data-toggle="modal" data-target="#addUser" class="btn btn btn-primary"><i class="fa fa-user-plus"></i>Add User</button>
                    </div>

                     @include('admin.users._modal')
        
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Picture</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>

@endsection

@section('assets-bottom')

<!-- DataTables -->
<script src="{{asset('assets/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#dataTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.datatable.users') }}",
            columns: [
                {data: 'picture', name: 'picture'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>

<script type="text/javascript">
    
    $('#editModal').on('show.bs.modal', function (event) {

      console.log('Modal edit tester');
      var button = $(event.relatedTarget) // Button that triggered the modal
      // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var name = button.data('name')
      var email = button.data('email')
      var avatar = button.data('avatar')
      var role = button.data('role')
      var id = button.data('id')
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #avatar').val(avatar);
      modal.find('.modal-body #role').val(role);
    })

     $('#hapusModal').on('show.bs.modal', function (event) {

      console.log('Modal delete tester');
      var button = $(event.relatedTarget) // Button that triggered the modal
      // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var id = button.data('id')
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      
    })
  </script>

@endsection
