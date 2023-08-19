<div class="row">
    <div class="col-lg-3 col-md-6 col-xs-12 mt-3">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="info-box mb-3 bg-primary">
                    <div class="info-box-content">
                        <span class="h4"> {{ __( 'Adat betöltés BABABA' ) }}:</span>
                        <h1><a href="#" class="btn btn-default btn-block" id="downloadButton">{{ __('Indít') }}</a></h1>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="info-box mb-3 bg-danger">
                    <div class="info-box-content">
                        <span class="h4"> {{ __( 'Adat törlés BABABA' ) }}:</span>
                        <h1><a href="#" class="btn btn-default btn-block" id="truncateButton">{{ __('Indít') }}</a></h1>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12 mt-3">
        <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><img src={!! URL::asset('/img/series.jpg') !!} class="img-fluid"></span>

            <div class="info-box-content">
                <span class="h4"> {{ __( 'Évad' ) }}:</span>
                <span class="info-box-number h3 text-right">{{ number_format(App\Models\Series::all()->count(),0,",",".") }}</span>
            </div>
            <a href="{{ route('series.index') }}" class="small-box-footer">{{ __('Tovább') }} <i class="fas fa-arrow-circle-right"></i></a>
            <!-- /.info-box-content -->
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12 mt-3">
        <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><img src={!! URL::asset('/img/episodes.jpg') !!} class="img-fluid"></span>

            <div class="info-box-content">
                <span class="h4">{{ __('Epizódok') }}:</span>
                <span class="info-box-number h3 text-right">{{ number_format(App\Models\Episodes::all()->count(),0,",",".") }}</span>
            </div>
            <a href="{{ route('episodes.index') }}" class="small-box-footer">{{ __('Tovább') }} <i class="fas fa-arrow-circle-right"></i></a>
            <!-- /.info-box-content -->
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12 mt-3">
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><img src={!! URL::asset('/img/characters.jpg') !!} class="img-fluid"></span>

            <div class="info-box-content">
                <span class="h4">{{ __('Karakterek') }}:</span>
                <span class="info-box-number h3 text-right">{{ number_format(App\Models\Characters::all()->count(),0,",",".") }}</span>
            </div>
            <a href="{{ route('characters.index') }}" class="small-box-footer">{{ __('Tovább') }} <i class="fas fa-arrow-circle-right"></i></a>
            <!-- /.info-box-content -->
        </div>
    </div>
</div>
