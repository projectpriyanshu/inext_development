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
                  <legend class="w-auto px-2 text-dark">Employee Profile</legend>
                  <div class="card form mt-2">
                  	<div class="table card mt-4">
                        <div class="card-body p-0">
									<div class="header row mb-3 pr-2 float-end">
									  	<div class="col-md-12">
									  		<div class="bind_input text-end">
                                    <span class="spacing"></span>
                                    <a href="{{route('employee-details-export')}}" class="download">
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
                                       <th scope="col">Image</th>
                                       <th scope="col">Employee ID</th>
                                       <th scope="col">Email</th>
                                       <th scope="col">Department</th>
                                       <th scope="col">AADHAR NO, PAN NO</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@forelse($employee as $key => $value)
                                 	<tr>
                                 		<td>{{++$key}}</td>
                                        <td><img src="{{asset('uploads/employee_image')}}/{{$value->photo_path}}" style="width:50px;height:50px"></td>
                                 		<td>{{$value->employee_id}}</td>
                                 		<td>{{$value->email}}</td>
                                 		<td>{{$value->department}}</td>
                                        <td>{{$value->aadhar_no}}, {{$value->pan_no}}</td>
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
                                 {{ $employee->links('includes.pagination') }}
                              </div>
                              <div class="col-md-2">
                                 <a href="{{route('forwarder-account-index')}}" class="btn btn-secondary save-btn mr-3"> Back
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

@endpush