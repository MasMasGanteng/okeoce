@extends('layouts.admin')

@section('head')


@section('header_admin')


@section('content')

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Banner</li>
            </ol>
            <!-- form -->
            <div class="col-6 px-0">
                <form>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="editor1"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload Banner Image</label>
                        <div class="file-loading">
                            <input id="input-fa-1" name="input-fa-1[]" type="file" multiple>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>


@include('partials.footer_admin')

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top"><i class="fa fa-angle-up"></i></a>

<!-- Bootstrap core JavaScript-->
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/jquery/jquery.min.js"></script>
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/datatables/jquery.dataTables.js"></script>
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/js/sb-admin-datatables.min.js"></script>
<script src="https://cdn.ckeditor.com/4.7.3/basic/ckeditor.js"></script>
<!-- piexif.min.js is only needed for restoring exif data in resized images and when you wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<!-- optionally uncomment line below for loading your theme assets for a theme like Font Awesome (`fa`) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/fa/theme.min.js"></script>
<script>
CKEDITOR.replace('editor1');

$(document).ready(function() {
    $("#input-fa-1").fileinput({
        theme: "fa",
        uploadUrl: "/file-upload-batch/2"
    });
});
</script>
@stop
