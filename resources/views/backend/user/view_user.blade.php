@extends('admin.admin_master')

@section('main_admin')
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class=" card-header">
               <div class="row ">
                  <div class="col-sm-12 col-md-10">
                     <h4>User List</h4>
                  </div>
                  <div class="col-sm-12 col-md-2">
                     <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#ModalAddUser">
                        Add
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                     <div class="row">
                        <div class="col-sm-12 col-md-6">
                           <div class="dataTables_length" id="DataTables_Table_0_length"><label>
                                 <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Spectacle </font>
                                 </font><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control form-control-sm">
                                    <option value="10">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">dix</font>
                                       </font>
                                    </option>
                                    <option value="25">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">25</font>
                                       </font>
                                    </option>
                                    <option value="50">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">50</font>
                                       </font>
                                    </option>
                                    <option value="100">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">100</font>
                                       </font>
                                    </option>
                                 </select>
                                 <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> entrées</font>
                                 </font>
                              </label></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                           <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                 <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Chercher:</font>
                                 </font><input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0">
                              </label></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <table class="table table-hover" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                              <thead>
                                 <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                       SL
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                       Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position : activer pour trier les colonnes par ordre croissant" style="width: 208.578px;">
                                       Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Bureau : activer pour trier les colonnes par ordre croissant" style="width: 91.7188px;">
                                       Role
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Âge&nbsp;: activer pour trier la colonne par ordre croissant" style="width: 38.7344px;">
                                       Created at
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date de début : activer pour trier les colonnes par ordre croissant" style="width: 83.5938px;">
                                       Action
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($allData as $key=>$user)
                                 <tr role="row" class="odd">
                                    <td width='5%'>{{$key+1}} </td>
                                    <td width='20%'>{{ $user->name}}</td>
                                    <td width='25%'>{{$user->email}} </td>
                                    <td width='20%'>{{ $user->usertype}} </td>
                                    <td width='20%'>{{ $user->created_at->diffForHumans()}} </td>
                                    <td width='15%'>
                                       <a href="#" data-toggle="modal" data-target="#ModalEditUser{{$user->id}}">
                                          <i class="fa fa-pencil color-muted m-r-5"></i>
                                       </a> &nbsp;

                                       <a href="{{ route('user.delete',$user->id)}}" id="delete">
                                          <i class="fa fa-trash color-muted m-r-5"></i>
                                       </a>
                                       @include('backend.user.modal.edit_user')

                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 col-md-5">
                           <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Affichage de 1 à 10 sur 57 entrées</font>
                              </font>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                           <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                              <ul class="pagination">
                                 <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">Précédent</font>
                                       </font>
                                    </a></li>
                                 <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">1</font>
                                       </font>
                                    </a></li>
                                 <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">2</font>
                                       </font>
                                    </a></li>
                                 <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">3</font>
                                       </font>
                                    </a></li>
                                 <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">4</font>
                                       </font>
                                    </a></li>
                                 <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0" class="page-link">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">5</font>
                                       </font>
                                    </a></li>
                                 <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0" class="page-link">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">6</font>
                                       </font>
                                    </a></li>
                                 <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="7" tabindex="0" class="page-link">
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">Prochain</font>
                                       </font>
                                    </a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@include('backend.user.modal.add_user')

@endsection