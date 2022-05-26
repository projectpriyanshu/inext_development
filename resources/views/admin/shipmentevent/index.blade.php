@extends('layouts.main')
@section('content')
<div class="row background_image">
    <div class="col-md-12">
        <div class="card-body">
            <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
            <div class="mt-5">
                <!-- <div class="tab-pane fade show active" id="shipmentevent" role="tabpanel" aria-labelledby="shipmentevent-tab"> -->
                <form class="" action="{{url('shipmentevent-add')}}" method="post">
                    @csrf()
                <div class="detail_edit">
                    <fieldset class="form-group border p-3">
                        <legend class="w-auto px-2 text-dark">EVENT MASTER</legend>
                        <div class="form card mt-2">
                            <div class="card-body">
                                <div class="row">

                                    @if(session()->has('success'))
                                    <div class="alert alert-success">
                                      {{ session()->get('success') }}
                                    </div>
                                    @endif

                                    @if(session()->has('error'))
                                    <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                    </div>
                                     @endif
                                    <span id="alert-success" style="color: green;"></span>
                                    <span id="alert-danger" style="color: red;"></span>

                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="name" class="form-label ">Search</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="bind_input">
                                                    <span class="spacing">:</span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Search here..." id="search">
                                                    <button type="button" class="btn btn-common rounded-0 save-btn" id="search_btn">
                                                        <span><i class="fa fa-search"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-8">
                                                <hr class="yellow_line">
                                            </div>
                                        </div>
                                        <div class="row code form-group">
                                            <div class="col-md-4">
                                                <label for="name" class="form-label ">Code</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="bind_input">
                                                    <span class="spacing">:</span>
                                                    <input type="text" class="form-control" name="code" id="code" value="{{old('code')}}">
                                                    <button type="button" class="btn btn-common rounded-0 save-btn" id="check_code">
                                                        <span><i class="fa fa-search"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row text-end mb-3">
                                            @if($errors->has('code'))
                                                 <div class="error">{{ $errors->first('code') }}</div>
                                              @endif
                                        </div>

                                        <div class="row name form-group">
                                            <div class="col-md-4">
                                                <label for="name" class="form-label ">Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="bind_input">
                                                    <span class="spacing">:</span>
                                                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row text-end mb-3">
                                            @if($errors->has('name'))
                                                 <div class="error">{{ $errors->first('name') }}</div>
                                              @endif
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="hidden" name="id" id="id" value="">
                                <a href="{{url('shipmentevent-list')}}" class="btn btn-secondary save-btn mr-3"> List
                                <i class="fa fa-list ms-2"></i>
                                </a>
                                <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_shipment"> Edit
                                    <i class="fa fa-edit ms-2"></i>
                                </button>

                                <button type="submit" class="btn btn-success save-btn">Save
                                    <i class="fa fa-save ms-2"></i>
                                </button>

                            </div>
                        </div>
                    </fieldset>
                </div>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
   $(document).ready(function(){
      $('#check_code').click(function(){
         var id = $('#id').val();
         var code = $('#code').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: baseurl + "/shipmentevent-index", 
            data: {'_token':token,'code':code,'id':id},
            success: function(result){
               var shipment = jQuery.parseJSON( result );
               $('#id').val(shipment.id);
               $('#code').val(shipment.code).prop('disabled', true);
               $('#name').val(shipment.name).prop('disabled', true);
               
               if(shipment.status == '400')
               {
                  $('#id').val();
                  $('#code').val();
                  $('#name').val();
                  $('#name').prop('disabled', false);
                  $('#code').prop('disabled', false);
                  $('#alert-danger').text(shipment.message);
               }
            }  
         });
      });

      $('#search_btn').click(function(){
         var search = $('#search').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: baseurl + "/shipmentevent-index", 
            data: {'_token':token,'search':search},
            success: function(result){
               var shipment = jQuery.parseJSON( result );
               $('#id').val(shipment.id);
               $('#code').val(shipment.code).prop('disabled', true);
               $('#name').val(shipment.name).prop('disabled', true);
              
               if(shipment.status == '400')
               {
                  $('#id').val();
                  $('#code').val();
                  $('#name').val();
                
                  $('#name').prop('disabled', false);
                  $('#code').prop('disabled', false);
                  $('#alert-danger').text(shipment.message);
               }
            }  
         });
      });

      $('#edit_shipment').click(function() 
      {
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
      })
      
   });
</script>
@endpush   