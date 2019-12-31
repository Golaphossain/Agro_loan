@extends('layouts.backend.app')

@section('title','Category')

@push('css')
<link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
    @if($post->is_approved==false)
        <button type="button" class="btn btn-success waves-effect pull-right" onclick="approvedPost({{$post->id}})">
            <i class="material-icons">done</i>
            <span>Approved</span>
        </button>
        <form method="POST" action="{{route('admin.post.approve',$post->id)}}" id="approval-form" style="display: none;">
            @csrf
            @method('PUT')
        </form>
    @else
        <button type="button" class="btn btn-success pull-right" disabled>
            <i class="material-icons">done</i>
            <span>Approved</span>
        </button>
    @endif
    <br>
        <br>
      <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>{{$post->title}}
                        <small>Posted By <strong> <a href="">{{$post->organization->name}}</a></strong> on {{$post->created_at->toFormattedDateString() }}</small>
                        </h2>
                    </div>
                    <div class="body">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-cyan">
                        <h2>
                            Categories
                        </h2>
                    </div>
                    <div class="body">
                        @foreach($post->categories as $category)
                            <span class="label bg-cyan">{{$category->name}}</span>
                            @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Tags
                        </h2>
                    </div>
                    <div class="body">
                        @foreach($post->tags as $tag)
                            <span class="label bg-green">{{$tag->name}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="header bg-cyan">
                        <h2>
                            Featured Image
                        </h2>
                    </div>
                    <div class="body">
                        <img class="responsive-img thumbnail" src="{{\Illuminate\Support\Facades\Storage::url('post/'.
                        $post->image)}}" alt="">
                    </div>
                </div>
            </div>
      </div>
</div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    {{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.15.3/dist/sweetalert2.all.min.js"></script>--}}
    {{--    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>--}}
    <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <!-- TinyMCE -->
    <script src="{{asset('assets/backend/plugins/tinymce/tinymce.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('assets/backend/plugins/tinymce')}}';
        });
        function approvedPost(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You are going to approve this Post!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    // swalWithBootstrapButtons.fire(
                    //     // 'Deleted!',
                    //     // 'Your file has been deleted.',
                    //     // 'success'
                    // )
                    event.preventDefault();
                    document.getElementById('approval-form').submit();


                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Post is not approved :)',
                        'info'
                    )
                }
            })
        }
    </script>
@endpush
