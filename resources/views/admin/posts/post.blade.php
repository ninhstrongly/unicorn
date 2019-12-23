<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>Laravel AJAX CRUD</title>
 
    {{-- <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/4.0.0-alpha.5.bootstrap-flex.min.css"> --}}
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
 
<body style="margin-top: 60px" class="container">
    <div class="container">
 
        <div class="card card-block">
            <h2 class="card-title">Laravel AJAX Examples
                <small>via jQuery .ajax()</small>
            </h2>
            <p class="card-text">Learn how to handle ajax with Laravel and jQuery.</p>
            <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Link</button>
        </div>
 
        <div>
            <table class="table table-inverse">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>slug</th>
                    <th>short_desc</th>
                    <th>content</th>
                    <th>image</th>
                    <th>Edit or Delete</th>
                </tr>
                </thead>
                <tbody id="links-list" name="links-list">
                @foreach ($links as $link)
                    <tr id="link{{$link->id}}">
                        <td>{{$link->id}}</td>
                        <td>{{$link->title}}</td>
                        <td>{{$link->slug}}</td>
                        <td>{{ $link->short_desc }}</td>
                        <td>{{ $link->content }}</td>
                        <td>{{ $link->image }}</td>
                        <td>
                            <button class="btn btn-info open-modal" value="{{$link->id}}">Edit
                            </button>
                            <button class="btn btn-danger delete-link" value="{{$link->id}}">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
 
            <div class="modal fade" id="linkEditorModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="linkEditorModalLabel">Link Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">
 
                                <div class="form-group">
                                    <label for="inputLink" class="col-sm-2 control-label">title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Enter URL" value="">
                                    </div>
                                </div>
 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">slug</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="slug" name="slug"
                                               placeholder="Enter Link Description" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">short_desc</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="short_desc" name="short_desc"
                                                placeholder="Enter Link Description" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">content</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="content" name="content"
                                                placeholder="Enter Link Description" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">image</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="image" name="image"
                                                placeholder="Enter Link Description" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                            </button>
                            <input type="hidden" id="link_id" name="link_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- <script src="js/3.1.1.jquery.min.js"></script> --}}
    <script src="js/1.3.7.tether.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    {{-- <script src="js/4.0.0-alpha.5.bootstrap.min.js"></script> --}}
    <script>
        jQuery(document).ready(function($){
        ////----- Open the modal to CREATE a link -----////
        jQuery('#btn-add').click(function () {
            jQuery('#btn-save').val("add");
            jQuery('#modalFormData').trigger("reset");
            jQuery('#linkEditorModal').modal('show');
        });
     
        ////----- Open the modal to UPDATE a link -----////
        jQuery('body').on('click', '.open-modal', function () {
            var link_id = $(this).val();
            console.log(link_id);
            $.get('/admin/post/' + link_id, function (data) {
                jQuery('#link_id').val(data.id);
                jQuery('#title').val(data.title);
                jQuery('#slug').val(data.slug);
                jQuery('#short_desc').val(data.short_desc);
                jQuery('#content').val(data.content);
                jQuery('#image').val(data.image);
                jQuery('#btn-save').val("update");
                jQuery('#linkEditorModal').modal('show');
            })
        });
     
        // Clicking the save button on the open modal for both CREATE and UPDATE
        $("#btn-save").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                title: jQuery('#title').val(),
                slug: jQuery('#slug').val(),
                short_desc: jQuery('#short_desc').val(),
                content: jQuery('#content').val(),
                image: jQuery('#image').val(),
            };
            var state = jQuery('#btn-save').val();
            var type = "POST";
            var link_id = jQuery('#link_id').val();
            var ajaxurl = 'post';
            if (state == "update") {
                type = "PUT";
                ajaxurl = '/post/' + link_id;
            }
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    var link = '<tr id="link' + data.id + '"><td>' + data.id + '</td><td>' + data.url + '</td><td>' + data.description + '</td>';
                    link += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                    link += '<button class="btn btn-danger delete-link" value="' + data.id + '">Delete</button></td></tr>';
                    if (state == "add") {
                        jQuery('#links-list').append(link);
                    } else {
                        $("#link" + link_id).replaceWith(link);
                    }
                    jQuery('#modalFormData').trigger("reset");
                    jQuery('#linkEditorModal').modal('hide')
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
     
        ////----- DELETE a link and remove from the page -----////
        jQuery('.delete-link').click(function () {
            var link_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: 'admin/post/' + link_id,
                success: function (data) {
                    console.log(data);
                    $("#link" + link_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
    </script>
    </body>
    </html>