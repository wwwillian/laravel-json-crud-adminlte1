<div class="box box-primary filters-box collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title">
            {{ trans('crud.filters') }}
        </h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>

    <form id="advanced-filter-form">
        <div class="box-body filters-box-body">
            @foreach ($filters as $filter)
                @include($filter->view, array('filter' => $filter))
            @endforeach
        </div>

        <div class="box-footer">
            <div id="filter-button-wrapper" class="pull-right">
                <button type="button" class="btn btn-default remove-filters">
                    <i class="fas fa-eraser"></i>
                    <span>{{ trans('crud.filter_cancel_button') }}</span>
                </button>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter"></i>
                    <span>{{ trans('crud.filter_button') }}</span>
                </button>
            </div>
        </div>
    </form>
</div>
