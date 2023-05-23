@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.datatables_css')
    @include('layouts.costumcss')
@endsection

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary" >
            <div class="box-body">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <section class="content-header">
                        <h4>{{ __('Epizódok') }}</h4>
                        <div class="form-group col-sm-6">
                            <div class="row">
                                <div class="mylabel col-sm-1">
                                    {!! Form::label('serie', 'Évad:') !!}
                                </div>
                                <div class="col-sm-2">
                                    {!! Form::select('serie', \App\Http\Controllers\SeriesController::DDDW(), null,
                                            ['class'=>'select2 form-control', 'id' => 'serie']) !!}
                                </div>
                                <div class="mylabel col-sm-1" id="beginText">
                                    {!! Form::label('beginText', 'Tól:') !!}
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::date('begin', App\Models\Episodes::get()->min('air_date'), ['class' => 'form-control','id'=>'begin', 'required' => true]) !!}
                                </div>
                                <div class="mylabel col-sm-1" id="endText">
                                    {!! Form::label('endText', 'Ig:') !!}
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::date('end', App\Models\Episodes::get()->max('air_date'), ['class' => 'form-control','id'=>'end', 'required' => true]) !!}
                                </div>
                            </div>
                        </div>

                    </section>
                    @include('flash::message')
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body"  >
                            <table class="table table-hover table-bordered partners-table w-100"></table>
                        </div>
                    </div>
                    <div class="text-center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.datatables_js')

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.partners-table').DataTable({
                serverSide: true,
                scrollY: 450,
                scrollX: true,
                order: [[1, 'asc']],
                paging: false,
                ajax: "{{ route('serieEpisodsIndex') }}",
                columns: [
                    {title: 'Akció',
                        data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                    {title: 'Epizód', data: 'episode', name: 'episode'},
                    {title: 'Név', data: 'name', name: 'name'},
                    {title: 'Adás dátum', data: 'air_date', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD') : ''; }, sClass: "text-center", width:'150px', name: 'air_date'},
                    {title: 'Karakterek', data: 'characterNumber', render: $.fn.dataTable.render.number( '.', ',', 0), sClass: "text-right", width:'100px', name: 'characterNumber'},
                ],
                buttons: []
            });

            $('#serie').change(function () {
                let serie = $('#serie').val() != 0 ? $('#serie').val() : -9999;
                let url;
                if (serie === -9999) {
                    $('#begin').show();
                    $('#end').show();
                    $('#beginText').show();
                    $('#endText').show();
                    let begin = $('#begin').val();
                    let end = $('#end').val();
                    url = '{{ route('serieEpisodsIndex', [":serie", ":begin", ":end"]) }}';
                    url = url.replace(':serie', serie);
                    url = url.replace(':begin', begin);
                    url = url.replace(':end', end);
                } else {
                    $('#begin').hide();
                    $('#end').hide();
                    $('#beginText').hide();
                    $('#endText').hide();
                    url = '{{ route('serieEpisodsIndex', [":serie"]) }}';
                    url = url.replace(':serie', serie);
                }
                table.ajax.url(url).load();
            });

            function loader(begin, end) {
                let serie = -9999;
                let url = '{{ route('serieEpisodsIndex', [":serie", ":begin", ":end"]) }}';
                url = url.replace(':serie', serie);
                url = url.replace(':begin', begin);
                url = url.replace(':end', end);
                table.ajax.url(url).load();
            }


            function okDates(begin, end) {
                if ( begin <= end ) {
                    return true;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Az ig nem lehet kisebb mint a tól dátum!',
                        footer: '<a href="">Kérem javítsa!</a>'
                    })
                    $('#end').focus()
                    return false;
                }
            }



            $('#begin').change(function () {
                let begin = $('#begin').val();
                let end = $('#end').val();
                if ( okDates(begin, end) ) {
                    loader(begin, end)
                }
            });

            $('#end').change(function () {
                let begin = $('#begin').val();
                let end = $('#end').val();
                if ( okDates(begin, end) ) {
                    loader(begin, end)
                }
            });


        });
    </script>
@endsection


