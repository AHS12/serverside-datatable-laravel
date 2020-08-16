<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('datatable/dataTables.bootstrap4.min.css')}}">

    <script src="{{asset('pace/pace.min.js')}}"></script>
    <link href="{{asset('pace/themes/red/pace-theme-minimal.css')}}" rel="stylesheet" />
    <title>Laravel-Server Side Datatable</title>
</head>

<body>
    <div class="container" id="">
        {{-- <h1>Hello, world!</h1> --}}
        <div>

        </div>
        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-2">Datatable with 5000 data SERVER SIDE Processing
        </h1>

        <hr class="mt-2 mb-5">

        <div class="row" id="data-table">
            <div class="table-responsive">
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <th>#</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}
    <script src="{{asset('bootstrap/jquery-3.2.1.min.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script> --}}
    <script src="{{asset('bootstrap/popper.min.js')}}"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}

    <script src="{{asset('bootstrap/bootstrap.min.js')}}"></script>

    <script src="{{asset('datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('datatable/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#example').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/users') }}",
                columns: [
                    {
                        "data": 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });
        });

        function editUser(id) {
            alert(id);
        };

        function deleteUser(id) {
            alert(id);
        };

    </script>

</body>

</html>
