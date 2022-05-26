@extends('layouts.main')
@section('content')

<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="usertype" role="tabpanel" aria-labelledby="usertype-tab">
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">USER TYPE/ROLE</legend>
                                <form method="POST" action="{{route('user.type.add')}}">
                                  @csrf
                                    <div class="card">
                                        <div class="card-body">

                                            {{-- @if(session()->has('success'))
                                            <div class="alert alert-success">
                                            {{session()->get('error')}}
                                            </div>
                                            @endif --}}

                                            @if (\Session::has('success'))
                                            <div class="alert alert-success">
                                                <ul>
                                                    <li>{!! \Session::get('success') !!}</li>
                                                </ul>
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
                                                            <label for="name" class="form-label">Search</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="search" id="search" class="form-control">
                                                                <div class="d-flex">
                                                                    <button type="button" class="btn btn-dark" id="search_btn" >
                                                                    <span><i class="fa fa-search"></i></span>
                                                                </button>
                                                                </div>
                                                                
                                                            </div>
                                                            @if($errors->has('search'))
						                                        <div class="error text-end">{{ $errors->first('search') }}</div>
						                                       	@endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label">Name<label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="name" id="name" class="form-control">
                                                            </div>
                                                            @if($errors->has('name'))
						                                     <div class="error text-end">{{ $errors->first('name') }}</div>
						                           	        @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="btn_group">
                                                <input type="hidden" name="id" id="id">
                                                <a href="{{route('user.type.list')}}" class="btn btn-secondary save-btn mr-3"> List
                                                <i class="fa fa-list ms-2"></i>
                                                </a>
                                                <button type="button" class="btn btn-secondary" id="edit_usertype"> Edit
                                                <i class="fa fa-edit ms-2"></i>
                                                </button>
                                                  <button type="submit" class="btn btn-success">Save
                                                 <i class="fa fa-save ms-2"></i>
                                                   </button>

                                               <button type="button" class="btn btn-danger" id="delete_usertype">Delete
                                                    <i class="fa fa-trash"></i>
                                                </button>  
                                                   
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('js')
    <script type="text/javascript">
    
          $('#search_btn').click(function(){
             var search = $('#search').val();
             var token = "{{csrf_token()}}";
             $.ajax({
                url: "{{route('user.type')}}", 
                data: {'_token':token,'search':search},
                success: function(result){
                   var role = jQuery.parseJSON( result );
                   console.log(role);
                   $('#id').val(role.id);
                   $('#name').val(role.name).prop('disabled', true);
                  
                   if(role.status == '400')
                   {
                      $('#id').val();
                      $('#name').val();
                     
                      $('#name').prop('disabled', false);
                     
                      $('#alert-danger').text(role.message);
                   }
                }  
             });
          });

            $('#edit_usertype').click(function() 
            {
                $('#name').prop('disabled', false);
                })

        $('#delete_usertype').click(function() 
        {
            var id = $('#id').val();
            var token = "{{csrf_token()}}";
            $.ajax({
                type: 'post',
                url: "{{route('delete-user-type')}}", 
                data: {'_token':token,'id':id},
                success: function(){
                    alert('Data Deleted Successfully!')
                    location.reload();
                }
      })
   });
          
    </script>
    @endpush   