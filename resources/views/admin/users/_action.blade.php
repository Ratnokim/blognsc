<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-xs" 
	data-email="{{$email}}" data-name="{{$name}}" data-role="{{$role}}"
	data-id="{{$id}}" data-photo="{{$avatar}}" 
	data-toggle="modal" data-target="#editModal">
    <i class="fa fa-edit"></i> <span>Ubah</span>
</button> | 
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-xs" data-id="{{$id}}" data-toggle="modal" data-target="#hapusModal">
    <i class="fa fa-trash"></i> <span>Hapus</span>
</button>