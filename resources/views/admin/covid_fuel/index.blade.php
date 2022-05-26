@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
<div class="row background_image">
    <div class="col-md-12">
        <div class="card-body">
            <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
            <div class="mt-5">

                @if(Session::has('success'))
                    <div class="col-md-6 offset-md-3">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Success!</strong> {{Session::get('success')}}
                        </div>
                    </div>
                @endif

                <form class="" method="post" action="{{route('covid.fuel.add')}}">
                    @csrf
                    <input id="id" type="hidden" name="id">
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">COVID FUEL TAG</legend>
                            <div class="form card mt-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p id="message" class="text-danger text-center"></p>
                                            <div class="row code form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Search</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input id="search-input" type="text" class="form-control"
                                                            placeholder="Search here...">
                                                        <button id="search-btn" type="button" class="btn btn-common rounded-0 save-btn">
                                                            <span><i class="fa fa-search"
                                                                    aria-hidden="true"></i></span>
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
                                                    <label for="name" class="form-label ">Shipper</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <div class="row form-row">
                                                            <div class="col-md-4">
                                                                <input id="shipper_code" type="text" class="form-control" name="shipper_code" value="{{old('shipper_code')}}">

                                                                @if($errors->has('shipper_code'))
                                                                  <div class="error text-end">{{ $errors->first('shipper_code') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input id="shipper" type="text" class="form-control" name="shipper" value="{{old('shipper')}}">
                                                                @if($errors->has('shipper'))
                                                                  <div class="error text-end">{{ $errors->first('shipper') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row name form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Network<label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <div class="row form-row">
                                                            <div class="col-md-4">
                                                                <input id="network_code" type="text" class="form-control" name="network_code" value="{{old('network_code')}}" readonly>
                                                                @if($errors->has('network_code'))
                                                                  <div class="error text-end">{{ $errors->first('network_code') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input id="network" type="text" class="form-control" name="network" placeholder="Search Network Name.." value="{{old('network')}}">
                                                                @if($errors->has('network'))
                                                                  <div class="error text-end">{{ $errors->first('network') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row name form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Tag</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <select id="tag" class="form-select" name="tag">
                                                            <option value="{{old('tag')}}">--Select Tag--</option>
                                                            <option value="tag1">TAG1</option>
                                                            <option value="tag2">TAG2</option>
                                                            <option value="tag3">TAG3</option>
                                                            <option value="tag4">TAG4</option>
                                                        </select>
                                                    </div>
                                                    @if($errors->has('tag'))
                                                      <div class="error text-end">{{ $errors->first('tag') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a href="{{route('covid.fuel.list')}}" class="btn btn-secondary save-btn mr-3"> List
                                        <i class="fa fa-list ms-2"></i>
                                    </a>

                                    <button id="edit" type="button" class="btn btn-secondary save-btn mr-3"> Edit
                                        <i class="fa fa-edit ms-2"></i>
                                    </button>

                                    <button  type="submit" class="btn btn-success save-btn">Save
                                        <i class="fa fa-save ms-2"></i>
                                    </button>

                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

 @push('js')
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
   $(document).ready(function(){


      $('#search-btn').click(function(){
         var searchkey = $('#search-input').val();
         if(searchkey.length < 1){
            alert('please enter a keyword!');
            return false;
         }
         $.ajax({
            method: "POST",
            url: "{{route('covid.fuel.search')}}", 
            data: {'_token':"{{csrf_token()}}",'searchkey':searchkey},
            success: function(response){
                console.log(response);
                if(response.status == true){
                    $('#shipper_code').val(response.data.shipper_code).prop('disabled', true);
                    $('#shipper').val(response.data.shipper).prop('disabled', true);
                    $('#network_code').val(response.data.network_code).prop('disabled', true);
                    $('#network').val(response.data.network).prop('disabled', true);
                    $('#tag').val(response.data.tag).prop('disabled', true);
                    $('#id').val(response.data.id).prop('disabled', true);
                }else{
                    $('#message').html(response.message);
                }

            }  
         });
      });

      $('#edit').click(function(){
         $('input').prop('disabled', false);
         $('select').prop('disabled', false);
      })

      
   });
    // Network Search
    var token = "{{csrf_token()}}";
        $( "#network" ).autocomplete({
        
        source: function( request, response ) {
          $.ajax({
            url:"{{route('search-network-code')}}",
            type: 'get',
            dataType: "json",
            data: {
               _token: token,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }       
          });
        },
        
        select: function (event, ui) {
           $('#network').val(ui.item.label); 
           $('#network_code').val(ui.item.network_code); 
           return false;
        }
      });
</script>
@endpush