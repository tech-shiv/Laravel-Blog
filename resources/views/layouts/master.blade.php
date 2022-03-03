<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        @include('layouts.inc.admin-sidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.inc.admin-navbar')
                <!-- End of Topbar -->

                @yield('content')


            </div>
            <!-- End of Main Content -->

            @include('layouts.inc.admin-footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            jQuery('.edit-cat').click(function() {
                jQuery('#edit-cat').modal('show');
                var id = jQuery(this).val();
                jQuery.ajax({
                    url: "{{ url('admin/edit-category') }}" + '/' + id,
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(result) {
                        console.log(JSON.parse(result));

                        let catData = JSON.parse(result);
                        $("#catId").val(catData.id);
                        $("#catName").val(catData.name);
                        $("#catDescription").val(catData.description);
                        $("#catSlug").val(catData.slug);
                        $("#categoryId").val(catData.item_category_id);
                        $("#metaTitle").val(catData.meta_title);
                        $("#metaDescription").val(catData.meta_description);
                        $("#metaKeywords").val(catData.meta_keywords);
                        $("#catImage").attr('src', "{{url('uploads/category')}}" + '/' + catData.image);
                        $("#catUpdateForm").attr('action', "{{ url('admin/update') }}" + '/' + catData.id);
                    }
                });
            });

            jQuery('.delete-cat').click(function() {
                jQuery('#deleteModalCenter').modal('show');
                var id = jQuery(this).val();
                jQuery('#deleteCatForm').attr('action', "{{ url('admin/delete') }}" + '/' + id);
            });

        });
    </script>
</body>

</html>
