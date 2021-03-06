@extends('layouts.backend.app')

@section('title','Category')

@push('css')
<link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
    <form action="{{route('author.post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD NEW OFFER</h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="title" class="form-control" name="title">
                            <label class="form-label">Loan Title</label>
                        </div>
                        </div>
                        <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="interest_rate" class="form-control" name="interest_rate">
                            <label class="form-label">Interest rate</label>
                        </div>
                        </div>
                        <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="loanSize" class="form-control" name="loanSize">
                            <label class="form-label">Loan Size</label>
                        </div>
                        </div>
                        <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="loanPeriod" class="form-control" name="loanPeriod">
                            <label class="form-label">Loan period</label>
                        </div>
                        </div>
                         <div class="form-group ">
                            <label for="image">Featured Image</label>
                            <input type="file" name="image">
                         </div>
{{--                         <div class="form-group ">--}}
{{--                            <input type="checkbox" id="publish" name="status" class="filled-in" value="1">--}}
{{--                            <label for="publish">Publish</label>--}}
{{--                         </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2></h2>
                    </div>
                    <div class="body">
{{--                        <div class="form-group form-float">--}}
{{--                        <div class="form-line {{$errors->has('categories') ? 'focused error':''}}">--}}
{{--                            <label for="category">Select Category</label>--}}
{{--                            <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>--}}
{{--                            @foreach($categories as $category)--}}
{{--                            <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                            @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group form-float">--}}
{{--                        <div class="form-line  {{$errors->has('tags') ? 'focused error':''}}">--}}
{{--                            <label for="tag">Select Tag</label>--}}
{{--                            <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>--}}
{{--                            @foreach($tags as $tag)--}}
{{--                            <option value="{{$tag->id}}">{{$tag->name}}</option>--}}
{{--                            @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                     </div>--}}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label for="installment">Installment Type</label>
                                <select name="installment_type"id="installment_type" class="form-control show-tick" data-live-search="true" >
                                            <option selected="selected" value="">Nothing selected</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Quarterly">Quarterly</option>
                                            <option value="Half-Yearly">Half-Yearly</option>
                                            <option value="Yearly">Yearly</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <a  class="btn btn-danger m-t-15 waves-effect" href="{{route('author.post.index')}}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                    </div>
                </div>
            </div>
      </div>
   <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>BODY</h2>
                    </div>
                    <div class="body">
                    <textarea id="tinymce" name="body"></textarea>
                    </div>
                </div>
            </div>
      </div>
    </form>
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
