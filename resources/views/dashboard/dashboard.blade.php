@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/Highcharts.css">
    @include('layouts.costumcss')
@endsection

@section('content')
    <div class="content">
        @include('dashboard.dashboardInfo')
    </div>
@endsection

@section('scripts')

    @include('functions.sweetalert_js')

    <script type="text/javascript">

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true
        })

        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });




            $('#truncateButton').click(function (e) {
                swal.fire({
                    title: "Sorozat adatok!",
                    text: "Biztos, hogy törli a táblákat?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Törlés",
                    cancelButtonText: "Kilép",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"GET",
                            url:"{{url('api/truncateTables')}}",
                            success: function (response) {
                                console.log('Ok:', response);
                            },
                            error: function (response) {
                                console.log('Error:', response);
                            }
                        });
                        // Toast.fire({
                        //     icon: 'success',
                        //     title: 'A sorozat adatait töröltük!'
                        // })

                        location.reload();
                    }
                });
            });

            $('#downloadButton').click(function (e) {
                swal.fire({
                    title: "Sorozat adatok!",
                    text: "Biztos, hogy betölti a táblákat?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Betöltés",
                    cancelButtonText: "Kilép",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"GET",
                            url:"{{url('api/downloadData')}}",
                            success: function (response) {
                                console.log('Ok:', response);
                            },
                            error: function (response) {
                                console.log('Error:', response);
                            }
                        });
                        // Toast.fire({
                        //     icon: 'success',
                        //     title: 'A sorozat adatait betöltöttük!'
                        // })
                        location.reload();
                    }
                });
            });


        });
    </script>
@endsection

