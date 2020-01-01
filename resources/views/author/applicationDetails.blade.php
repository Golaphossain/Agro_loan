@extends('layouts.backend.app')

@section('title','application')

@push('css')
    <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <a href="{{route('author.application.index')}}" class="btn btn-danger waves-effect">BACK</a>

{{--        @if($post->is_approved==false)--}}
{{--            <button type="button" class="btn btn-success pull-right">--}}
{{--                <i class="material-icons">done</i>--}}
{{--                <span>Approved</span>--}}
{{--            </button>--}}
{{--        @else--}}
{{--            <button type="button" class="btn btn-success pull-right" disabled>--}}
{{--                <i class="material-icons">done</i>--}}
{{--                <span>Approved</span>--}}
{{--            </button>--}}
{{--        @endif--}}
        <br>
        <br>
        <form action="{{route('author.application.progress',$application->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-blue-grey">
{{--                        <h2>{{$post->title}}--}}
{{--                            <small>Posted By <strong> <a href="">{{$post->organization->username}}</a></strong> on {{$post->created_at->toFormattedDateString() }}</small>--}}
{{--                        </h2>--}}
                        <h2>Applicant Details</h2>
                    </div>
                    <div class="body">
                        <div><h5>Farmer Name: </h5><p v-text>{{$application->farmerName}}</p></div>
                        <div><h5>Farmland: </h5><p v-text>{{$application->landAmount}}</p></div>
                        <div><h5>Nid No: </h5><p v-text>{{$application->nidNo}}</p></div>
                        <div><h5>Phone: </h5><p v-text>{{$application->phone}}</p></div>
                        <div><h5>Address: </h5><p v-text>{{$application->address}}</p></div>
                        <h4>জামিনদাতা</h4>
                        <div><h5>Name: </h5><p v-text>{{$application->nomineeName}}</p></div>
                        <div><h5>Relation: </h5><p v-text>{{$application->nRelation}}</p></div>
                        <div><h5>Nid No: </h5><p v-text>{{$application->nNid}}</p></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-blue">
                        <h2>
                            Application status
                        </h2>
                    </div>
                    <div class="body">
                        <h4>Current State: </h4>{{$application->status}}
                        <br>
                        <br>
                        <div class="form-group form-float">
                            <div class="form-line {{$errors->has('Application_state') ? 'focused error':''}}">
                                <label for="Application_state">Update State</label>
                                <select name="Application_state" size="1" id="Application_state" class="form-control show-tick" data-live-search="true" >
                                    <option selected="selected" value="">Select</option>
{{--                                    <option value="{{$application->status}}">{{$application->status}}</option>--}}
                                    <option value="pending">Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="approved">Approved</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
{{--                        <button class="btn btn-danger waves-effect" type="button" onclick="deletepost({{$post->id}})">--}}
{{--                            <i class="material-icons">delete</i>--}}
{{--                        </button>--}}
{{--                        <form id="delete-form-{{$application->id}}" action="{{route('author.application.progress',$application->id)}}" method="POST" style="display: none;">--}}
{{--                            @csrf--}}
{{--                            @method('PUT')--}}
{{--                    </form>--}}
                    </div>
                </div>
{{--                <div class="card">--}}
{{--                    <div class="header bg-green">--}}
{{--                        <h2>--}}
{{--                            Tags--}}
{{--                        </h2>--}}
{{--                    </div>--}}
{{--                    <div class="body">--}}
{{--                        @foreach($post->tags as $tag)--}}
{{--                            <span class="label bg-deep-purple">{{$tag->name}}</span>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>
                            Applicant NidPhoto
                        </h2>
                    </div>
                    <div class="body">
                        <img class="responsive-img thumbnail" src="{{\Illuminate\Support\Facades\Storage::url('applicationForm/'.
                        $application->nidImage)}}" alt="image not show">
                    </div>
                    <div class="header bg-deep-purple">
                        <h2>
                           জামিনদাতা
                        </h2>
                    </div>
                    <div class="body">
                        <img class="responsive-img thumbnail" src="{{\Illuminate\Support\Facades\Storage::url('applicationForm/'.
                        $application->nNidImage)}}" alt="image not show">
                        <img class="responsive-img thumbnail" src="{{\Illuminate\Support\Facades\Storage::url('applicationForm/'.
                        $application->nomineeImage)}}" alt="image not show">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-info">
                        <h2>
                            Requested Loan
                        </h2>
                    </div>
                    <div class="body">
                        <h4>Loan ID :</h4>
                        {{$application->post_id}}
                        <br>
                        <h4>Loan Title :</h4>
                        {{$application->post->title}}
                        <br>
                        {{--                        <strong>Address :</strong>--}}
                        {{--                        {{$application->address}}--}}
                        {{--                        <br>--}}
                    </div>
                </div>            </div>
        </div>
        </form>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <script type="text/javascript">
        function updateStatus(id) {
            // const swalWithBootstrapButtons = Swal.mixin({
            //     customClass: {
            //         confirmButton: 'btn btn-success',
            //         cancelButton: 'btn btn-danger'
            //     },
            //     buttonsStyling: false
            // })

            // swalWithBootstrapButtons.fire({
            //     title: 'Are you sure?',
            //     text: "You won't be able to revert this!",
            //     type: 'warning',
            //     showCancelButton: true,
            //     confirmButtonText: 'Yes, delete it!',
            //     cancelButtonText: 'No, cancel!',
            //     reverseButtons: true
            // }).then((result) => {
            //     if (result.value) {
                    // swalWithBootstrapButtons.fire(
                    //     // 'Deleted!',
                    //     // 'Your file has been deleted.',
                    //     // 'success'
                    // )
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();


                // } else if (
                //     /* Read more about handling dismissals below */
                //     result.dismiss === Swal.DismissReason.cancel
                // ) {
                //     swalWithBootstrapButtons.fire(
                //         'Cancelled',
                //         'Your data is safe :)',
                //         'error'
                //     )
                // }
            // })
        }
    </script>

@endpush
