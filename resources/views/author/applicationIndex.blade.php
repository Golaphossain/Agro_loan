@extends('layouts.backend.app')

@section('title','Offer')

@push('css')
    <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    @endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">

        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Applicantion List
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Applicant Name</th>
                                    <th>Loan title</th>
                                    <th>Application Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Applicant Name</th>
                                    <th>Loan title</th>
                                    <th>Application Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($posts as $key=>$post)
                                    @foreach($post->applications as $application)
                                    <tr>
                                        <td>{{$application->farmerName}}</td>
                                        <td>{{\Illuminate\Support\Str::limit($post->title,'20')}}</td>
                                        <td>{{$application->created_at->toFormattedDateString()}}</td>
                                        <td>
                                            <span class="badge bg-blue">{{$application->status}}</span>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{route('author.application.details',$application->id)}}" class="btn btn-info waves-effect">
                                            <i class="material-icons">visibility</i>
                                            </a>
                                            <button class="btn btn-danger waves-effect" type="button" onclick="deleteForm({{$application->id}})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{$application->id}}" action="{{route('author.application.destroy',$application->id)}}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                        @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.15.3/dist/sweetalert2.all.min.js"></script>--}}
{{--    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>--}}
<script type="text/javascript">
   function deleteForm(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
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
            document.getElementById('delete-form-'+id).submit();


        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your data is safe :)',
                'error'
            )
        }
    })
}
</script>
@endpush
