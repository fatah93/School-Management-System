@extends('admin.admin_master')

@section('main_admin')
<div class="row">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Fee Amount details</a></li>
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
                     <a class="btn btn-primary btn-rounded" href="{{ route('fee.amount.add')}} " style="float: right;">Add new</a>
                  </div>
                  @if(count($detailsData)>=1)
                  <div class="table-responsive">
                     <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <h4><strong>Fee Category : </strong><i>{{ $detailsData['0']->fee_category->name }}</i></h4>
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
                                          Class Name
                                       </th> 
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Amount
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($detailsData as $key=>$fee_amount)
                                    <tr role="row" class="odd">
                                       <td width='20%'>{{$key+1}} </td>
                                       <td width='40%'>{{ $fee_amount->student_class->name}}</td>
                                       <td width='40%'>{{ $fee_amount->amount}} $</td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
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


@endsection