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
                  <legend class="w-auto px-2 text-dark">Franchise</legend>
                  <div class="card form mt-2">
                  	<div class="table card mt-4">
                        <div class="card-body p-0">
									<div class="header row mb-3 pr-2 float-end">
									  	{{-- <div class="col-md-12">
									  		<div class="bind_input text-end">
                                    <span class="spacing"></span>
                                    <a href="{{route('country-export')}}" class="download">
                                    Download Excel
                                    </a>
                                 </div>
									  	</div> --}}
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
                                       <th scope="col">Name</th>
                                       <th scope="col">Address</th>
                                       <th scope="col">Country_id</th>
                                       <th scope="col">State_id</th>
                                       <th scope="col">City_id</th>
                                       <th scope="col">PinCode</th>
                                       <th scope="col">Telephone</th>
                                       <th scope="col">Email</th>
                                       <th scope="col">Website</th>
                                       <th scope="col">Bank_Name</th>
                                       <th scope="col">Ac_No</th>
                                       <th scope="col">Ifsc_code</th>
                                       <th scope="col">Bank_Address</th>
                                       <th scope="col">GST_No</th>
                                       <th scope="col">Pan_No</th>
                                       <th scope="col">Cin_No</th>
                                       <th scope="col">Code</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@forelse($franchise as $key => $value)
                                 	<tr>
                                 		<td>{{++$key}}</td>
                                 		<td>{{$value->name}}</td>
                                 		<td>{{$value->address}}</td>
                                 		<td>{{$value->country_id}}</td>
                                         <td>{{$value->state_id}}</td>
                                         <td>{{$value->city_id}}</td>
                                         <td>{{$value->pincode}}</td>
                                         <td>{{$value->telephone}}</td>
                                         <td>{{$value->email}}</td>
                                         <td>{{$value->website}}</td>
                                         <td>{{$value->bank_name}}</td>
                                         <td>{{$value->ac_no}}</td>
                                         <td>{{$value->ifsc}}</td>
                                         <td>{{$value->bank_address}}</td>
                                         <td>{{$value->gst_no}}</td>
                                         <td>{{$value->pan_no}}</td>
                                         <td>{{$value->cin_no}}</td>
                                         <td>{{$value->code}}</td>
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
                                 {{ $franchise->links('includes.pagination') }}
                              </div>
                              <div class="col-md-2">
                                 <a href="{{route('franchise.index')}}" class="btn btn-secondary save-btn mr-3"> Back
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