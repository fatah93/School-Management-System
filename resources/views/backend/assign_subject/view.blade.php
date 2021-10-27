@extends('admin.admin_master')

@section('main_admin')
<div class="row">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Assign Subject List</a></li>
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
                     <!--Button add new school subject-->
                     <a class="btn btn-primary btn-rounded" href="{{ route('assign.subject.add')}}" style="float: right;">Add Assign subject</a>
                     
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
                                 <thead class="thead-light">
                                    <tr role="row">
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          SL
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Name
                                       </th>
                                       <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date de début : activer pour trier les colonnes par ordre croissant" style="width: 83.5938px;">
                                          Action
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($allData as $key=>$assign)
                                    <tr role="row" class="odd">
                                       <td width='10%'>{{$key+1}} </td>
                                       <td width='75%'>{{ $assign->student_class->name}}</td>
                                       <td width='15%'>
                                          <a href="{{ route('assign.subject.edit',$assign->class_id)}}" >
                                             <i class="fa fa-pencil color-muted m-r-5"></i>
                                          </a> &nbsp;
                                          <a href="{{ route('assign.subject.details',$assign->class_id)}}">
                                             <i class="fa fa-eye color-muted m-r-5"></i>
                                          </a>
                                       </td>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <!--Pagination-->
                     </div>
                  </div>


                  @else
                  <p>No data selected for Assign Subject add new one</p>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

