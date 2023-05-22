<div class="col-md-4">
    <!-- Widget: user widget style 2 -->
    <div class="card card-widget widget-user-2">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-warning">
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src={{ URL::asset($character->image) }} alt="User Avatar">

            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">{{ $character->name }}</h3>
            <h5 class="widget-user-desc">{{ $character->status }}</h5>
        </div>
        <div class="card-footer p-0">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Species <span class="float-right badge bg-primary">{{ $character->species }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Type <span class="float-right badge bg-info">{{ $character->type }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Gender <span class="float-right badge bg-success">{{ $character->gender }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <a href="{{ route('characters.edit', $character->id) }}" class="small-box-footer">{{ __('Tovább az adatlapra') }} <i class="fas fa-arrow-circle-right"></i></a>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.widget-user -->
</div>
