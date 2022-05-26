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
                  <legend class="w-auto px-2 text-dark">Counter Part</legend>
                  <div class="card form mt-2">
                  	<div class="table card mt-4">
                        <div class="card-body p-0">
									<div class="header row mb-3 pr-2 float-end">
									  	<div class="col-md-12">
									  		<div class="bind_input text-end">
                                    <span class="spacing"></span>
                                    <a href="{{route('city-export')}}" class="download">
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
                                       <th scope="col">address</th>
                                       <th scope="col">address1</th>
                                       <th scope="col">zipcode</th>
                                       <th scope="col">Country</th>
                                       <th scope="col">State</th>
                                       <th scope="col">City</th>
                                       <th scope="col">contact</th>
                                       <th scope="col">telephone</th>
                                       <th scope="col">email</th>
                                       <th scope="col">website</th>
                                       <th scope="col">sector</th>
                                    
                                    </tr>
                                 </thead>
                                 <tbody>
                                 </thead>
                                 <tbody>
                                 	@forelse($counter as $key => $value)
                                 	<tr>
                                 		<td>{{++$key}}</td>
                                 		<td>{{$value->code}}</td>
                                 		<td>{{$value->name}}</td>
                                         <td>{{$value->address}}</td>
                                         <td>{{$value->address1}}</td>
                                         <td>{{$value->zipcode}}</td>
                                       <td>{{$value->country_id}}</td>
                                       <td>{{$value->state_id}}</td>
                                       <td>{{$value->city_id}}</td>
                                       <td>{{$value->contact}}</td>
                                       <td>{{$value->telephone}}</td>
                                       <td>{{$value->email}}</td>
                                       <td>{{$value->website}}</td>
                                       <td>{{$value->sector}}</td>
                                       
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
                                 {{ $counter->links('includes.pagination') }}
                              </div>
                              <div class="col-md-2">
                                 <a href="{{url('counter-part-index')}}" class="btn btn-secondary save-btn mr-3"> Back
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
