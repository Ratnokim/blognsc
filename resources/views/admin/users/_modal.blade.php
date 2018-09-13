<!-- Modal Tambah -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
      </div>

      {!! Form::open(['url' => route('admin.users.store'),
                    'method' => 'post', 'files'=> 'true', 'class'=>'form-horizontal']) !!}
        <div class="modal-body">
          @include(' admin.users._form')
        </div>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
      </div> 

      {!! Form::close() !!}

    </div>
  </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
      </div>

      {!! Form::open(['url' => route('admin.users.update', 'test'),
                    'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
        <div class="modal-body">
          
          {!! Form::hidden('id', null, ['class'=>'form-control','id'=>'id']) !!}

          @include('admin.users._form')
        </div>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
      </div> 

      {!! Form::close() !!}

    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal modal-danger fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Konfirmasi Hapus</h4>
      </div>

      {!! Form::open(['url' => route('admin.users.destroy', 'test'),
                    'method' => 'delete', 'class'=>'form-horizontal']) !!}
        <div class="modal-body">

          <p class="text-center">
            Yakin ingin menghapus User ini?
          </p>
          
          {!! Form::hidden('id', null, ['class'=>'form-control','id'=>'id']) !!}

          
        </div>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        {!! Form::submit('Hapus', ['class'=>'btn btn-warning']) !!}
      </div> 

      {!! Form::close() !!}

    </div>
  </div>
</div>