@extends('layouts.backend.app')

@section('title','application')

@push('css')
    <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">

        <a href="{{route('author.application.index')}}" class="btn btn-danger waves-effect">BACK</a>

{{--        @if($post->is_approved==false)--}}
            <button type="button" class="btn btn-success pull-right">
                <i class="material-icons">done</i>
                <span>Approved</span>
            </button>
{{--        @else--}}
{{--            <button type="button" class="btn btn-success pull-right" disabled>--}}
{{--                <i class="material-icons">done</i>--}}
{{--                <span>Approved</span>--}}
{{--            </button>--}}
{{--        @endif--}}
        <br>
        <br>
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-info">
{{--                        <h2>{{$post->title}}--}}
{{--                            <small>Posted By <strong> <a href="">{{$post->organization->username}}</a></strong> on {{$post->created_at->toFormattedDateString() }}</small>--}}
{{--                        </h2>--}}
                        <h2>Applicant Details</h2>
                    </div>
                    <div class="body">

                            <h4>Farmer Name :</h4>
                            {{$application->farmerName}}
                            <br>
                            <h4>Farmer Type :</h4>
                            {{$application->farmerType}}
                            <br>
                            <h4>Farmland :</h4>
                            {{$application->landAmount}}
                            <br>
                            <h4>Nid No :</h4>
                            {{$application->nidNo}}
                            <br>
                            <h4>Phone :</h4>
                            {{$application->phone}}
                            <br>
                            <h4>District :</h4>
                            {{$application->district}}
                            <br>
                            <h4>Address :</h4>
                            {{$application->address}}
                            <br>
                        <h3>জামিনদাতা</h3>
                            <h4>Name :</h4>
                            {{$application->nomineeName}}
                            <br>
                            <h4>Relation :</h4>
                            {{$application->nRelation}}
                            <br>
                            <h4>Nid No :</h4>
                            {{$application->nNid}}

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
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
                    <div class="header bg-info">
                        <h2>
                            Applicant NidPhoto
                        </h2>
                    </div>
                    <div class="body">
                        <img class="responsive-img thumbnail" src="{{\Illuminate\Support\Facades\Storage::url('applicationForm/'.
                        $application->nidImage)}}" alt="image not show">
                    </div>
                    <div class="header bg-info">
                        <h2>
                            Nominee
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
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <!-- TinyMCE -->
    <script src="{{asset('assets/backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
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
    </script>
@endpush
