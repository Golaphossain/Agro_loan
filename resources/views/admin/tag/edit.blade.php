@extends('layouts.backend.app')

@section('title','Tag')

@push('css')

@endpush
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>EDIT TAG</h2>
        </div>
        <div class="body">
            <form action="{{route('admin.tag.update',$tag->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="name" class="form-control" name="name" value="{{$tag->name}}">
                        <label class="form-label"></label>
                    </div>
                </div>
                {{--                    <div class="form-group form-float">--}}
                {{--                        <div class="form-line">--}}
                {{--                            <input type="password" id="password" class="form-control">--}}
                {{--                            <label class="form-label">Password</label>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <br>
                <a  class="btn btn-danger m-t-15 waves-effect" href="{{route('admin.tag.index')}}">BACK</a>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
            </form>
        </div>
    </div>

@endsection
@push('js')

@endpush
