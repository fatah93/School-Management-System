<div class="modal fade bd-example-modal-sm" id="ModalDelete{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="card-title">Are you sure delete </h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
         </div>
         <div class="modal-body row">
            <div class="col">
               <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
            </div>
            <div class="col">
               <a class="btn btn-danger" href="{{route('user.delete',$user->id)}}">Yes </a>
            </div>
         </div>
      </div>
   </div>
</div>

