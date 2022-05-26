@extends('layouts.main')
@section('content')
<div class="row background_image">
   <div class="col-md-12">
      <div class="card-body">
         <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
         <div class="mt-5">
            <!-- <div class="tab-pane fade show active" id="state" role="tabpanel" aria-labelledby="state-tab"> -->
            <div class="detail_edit">
               <fieldset class="form-group border p-3">
                  <legend class="w-auto px-2 text-dark">Shipment Type Master</legend>
                  <div class="card form mt-2">
                  	<div class="table card mt-4">
                        <div class="card-body p-0">
									<div class="header row mb-3 pr-2 float-end">
									  	<div class="col-md-12">
									  		<div class="bind_input text-end">
                                    <span class="spacing"></span>
                                    <a href="{{route('shipment-type-export')}}" class="download">
                                    Download Excel
                                    </a>
                                 </div>
									  	</div>
									  	<!-- <div class="col-md-3 d-flex">
									      <input type="text" class="form-control" placeholder="Search here..." name="search" id="search">
                                 <button type="button" id="search_btn" class="btn btn-common rounded-0 save-btn">
                                 <span><i class="fa fa-search"></i></span>
                                 </button>
									  	</div> -->
									</div>
                           <div class="table-responsive">
                              <table class="table-bordered">
                                 <thead>
                                    <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Code</th>
                                       <th scope="col">Name</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@forelse($shipment_type as $key => $value)
                                 	<tr>
                                 		<td>{{++$key}}</td>
                                 		<td>{{$value->code}}</td>
                                 		<td>{{$value->name}}</td>
                                 	</tr>
                                 	@empty
                                 	<tr>
                                 		<td colspan="4">No Data Found!</td>
                                 	</tr>
                                 	@endforelse
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="card-footer text-right">
                           <div class="row">
                              <div class="col-md-10">
                                 {{ $shipment_type->links('includes.pagination') }}
                              </div>
                              <div class="col-md-2">
                                 <a href="{{url('shipment-type-index')}}" class="btn btn-secondary save-btn mr-3"> Back
                                 <i class="fa fa-arrow-left ms-2"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </fieldset>
            </div>
            <!-- </div> -->
         </div>
      </div>
   </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
   $(document).ready(function(){
      $('#search_btn').click(function(){
         var search = $('#search').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: baseurl + "/shipment-type-index", 
            data: {'_token':token,'search':search},
            success: function(result)
            {
               var shipment_type = jQuery.parseJSON( result );
               $('#id').val(shipment_type.id);
               $('#code').val(shipment_type.code).prop('disabled', true);
               $('#name').val(shipment_type.name).prop('disabled', true);
               if(shipment_type.status == '400')
               {
                  $('#id').val();
                  $('#code').val();
                  $('#name').val();
                  $('#name').prop('disabled', false);
                  $('#alert-danger').text(shipment_type.message);
               }
            }  
         });
      });
   });
</script>
@endpush