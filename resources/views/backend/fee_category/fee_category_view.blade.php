@extends('admin.admin_master')

@section('main_admin')
<div class="row">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Fee Category</a></li>
         </ol>
      </div>
   </div>
   <!-- row -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="card-title">
                     <button class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#AddFeeCategory" style="float: right;">Add new</button>
                  </div>
                  @if(count($allData)>=1)
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
                        <hr>
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
                                       <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Âge&nbsp;: activer pour trier la colonne par ordre croissant" style="width: 38.7344px;">
                                          Created at
                                       </th>
                                       <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date de début : activer pour trier les colonnes par ordre croissant" style="width: 83.5938px;">
                                          Action
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($allData as $key=>$fee_category)
                                    <tr role="row" class="odd">
                                       <td width='5%'>{{$key+1}} </td>
                                       <td width='20%'>{{ $fee_category->name}}</td>
                                       <td width='20%'>{{ $fee_category->created_at->diffForHumans()}} </td>
                                       <td width='15%'>
                                          <a href="#" data-toggle="modal" data-target="#MadelEditFeeCategory{{$fee_category->id}}">
                                             <i class="fa fa-pencil color-muted m-r-5"></i>
                                          </a> &nbsp;
                                          <a href="{{ route('fee.supprimer',$fee_category->id)}}" id="delete">
                                             <i class="fa fa-trash color-muted m-r-5"></i>
                                          </a>
                                          <!--Student class update-->
                                          <form action="{{ route('fee.category.update',$fee_category->id)}}" method="post" autocomplete="off">
                                             @csrf
                                             <div class="modal fade" id="MadelEditFeeCategory{{$fee_category->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                   <div class="modal-content">
                                                      <div class="modal-header">
                                                         <h5 class="modal-title">Update Fee Category</h5>
                                                         <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                         </button>
                                                      </div>
                                                      <div class="modal-body">
                                                         <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label" for="val-username">
                                                               <font style="vertical-align: inherit;">
                                                                  <font style="vertical-align: inherit;"> Name :</font>
                                                               </font><span class="text-danger">
                                                                  <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">*</font>
                                                                  </font>
                                                               </span>
                                                            </label>
                                                            <div class="col-lg-7">
                                                               <input type="text" class="form-control input-rounded" id="name" name="name" value="{{ $fee_category->name}}">
                                                               @error('name')
                                                               <div class="text-danger">{{ $message }}</div>
                                                               @enderror
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                         <input type="submit" value="Update" class="btn btn-primary btn-rounded">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </form>
                                          <!-- End form update name class-->
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
                  @else
                  <p>No data selected for student class add new one</p>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Student class Store-->

<form action="{{route('category.ajouter')}}" method="post" autocomplete="off">
   @csrf
   <div class="modal fade bd-example-modal-lg" id="AddFeeCategory" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Add Fee Category</h5>
               <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label" for="val-username">
                     <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> Name :</font>
                     </font><span class="text-danger">
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">*</font>
                        </font>
                     </span>
                  </label>
                  <div class="col-lg-7">
                     <input type="text" class="form-control input-rounded" id="name" name="name" placeholder="Enter Fee Category">
                     @error('name')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="submit" value="Insert" class="btn btn-primary btn-rounded">
            </div>
         </div>
      </div>
   </div>
</form>

@endsection