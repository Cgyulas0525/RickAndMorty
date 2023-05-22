@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/Highcharts.css">
    @include('layouts.costumcss')
@endsection

@section('content')
    <div class="content">
        @include('dashboard.dashboardInfo')

        <div class="col-lg-6 col-md-6 col-xs-12 margintop10">
            <!-- small box -->
            <div class="small-box bg-default">
                <div class="inner">
                    <h3 class="card-title">{{ __('Karaterek száma évadonként') }}</h3>
                    <!-- /.card-body -->
                    <div class="clearfix"></div>
                    <div>
                        <figure class="highcharts-figure w-100 h-50">
                            <div id="charactersYear"></div>
                        </figure>
                    </div>
                    <div class="text-center"></div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

    @include('functions.sweetalert_js')
    <script src="{{ asset('/js/highchart/highchartLine.js') }} " type="text/javascript"></script>
    <script src="{{ asset('/js/highchart/categoryUpload.js') }} " type="text/javascript"></script>
    <script src="{{ asset('/js/highchart/chartDataUpload.js') }} " type="text/javascript"></script>


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

            var chart_napi = highchartLine( 'charactersYear', 'line', 450, categoryUpload(<?php echo App\Services\HighChartService::CharacterInYears(); ?>, 'év'),
                chartDataUpload(<?php echo App\Services\HighChartService::CharacterInYears(); ?>, ['value'], ['Karakter']), 'Karakterek száma évadonként', 'évi bontás', 'darab');


        });
    </script>
@endsection

