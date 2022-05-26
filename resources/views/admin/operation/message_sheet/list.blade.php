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
                  <legend class="w-auto px-2 text-dark">Message Sheet</legend>
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
                                       <th scope="col">Company</th>
                                       <th scope="col">Run_no</th>
                                       <th scope="col">Sector</th>
                                       <th scope="col">Counter_Part</th>
                                       <th scope="col">Al_Mawb</th>
                                       <th scope="col">Flight</th>
                                       <th scope="col">Date</th>
                                       <th scope="col">OBC</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@forelse($sheet as $key => $value)
                                 	<tr>
                                 		<td>{{++$key}}</td>
                                 		<td>{{$value->company}}</td>
                                 		<td>{{$value->run_no}}</td>
                                 		<td>{{$value->sector}}</td>
                                         <td>{{$value->counter_part}}</td>
                                         <td>{{$value->al_mawb}}</td>
                                         <td>{{$value->flight}}</td>
                                         <td>{{$value->date}}</td>
                                         <td>{{$value->obc}}</td>
                                         <td>
                                            <a class="btn btn-danger" type="button" href="{{ url('delete-sheet/'.$value->id) }}" onclick="return confirm('Are you sure?')">delete</a>
                                          </td>
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
                                 {{ $sheet->links('includes.pagination') }}
                              </div>
                              <div class="col-md-2">
                                 <a href="{{route('message-sheet.index')}}" class="btn btn-secondary save-btn mr-3"> Back
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