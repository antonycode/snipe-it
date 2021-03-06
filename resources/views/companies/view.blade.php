@extends('layouts/default')

{{-- Page title --}}
@section('title')
    {{ $company->name }}
    @parent
@stop

{{-- Page content --}}
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">


                    <li class="active">
                        <a href="#asset_tab" data-toggle="tab">
                            <span class="hidden-lg hidden-md">
                            <i class="fa fa-barcode"></i>
                            </span>
                            <span class="hidden-xs hidden-sm">{{ trans('general.assets') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="#licenses_tab" data-toggle="tab">
                            <span class="hidden-lg hidden-md">
                            <i class="fa fa-floppy-o"></i>
                            </span>
                            <span class="hidden-xs hidden-sm">{{ trans('general.licenses') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="#accessories_tab" data-toggle="tab">
                            <span class="hidden-lg hidden-md">
                            <i class="fa fa-keyboard-o"></i>
                            </span> <span class="hidden-xs hidden-sm">{{ trans('general.accessories') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="#consumables_tab" data-toggle="tab">
                            <span class="hidden-lg hidden-md">
                            <i class="fa fa-tint"></i></span>
                            <span class="hidden-xs hidden-sm">{{ trans('general.consumables') }}</span>
                        </a>
                    </li>


                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="asset_tab">
                        <!-- checked out assets table -->
                        <div class="table-responsive">
                            <table
                                    name="companyAssets"
                                    class="table table-striped snipe-table"
                                    id="table"
                                    data-url="{{route('api.assets.index',['company_id' => $company->id]) }}"
                                    data-cookie="true"
                                    data-cookie-id-table="companyAssetsTable-{{ config('version.hash_version') }}">
                                <thead>
                                <tr>
                                    <th data-sortable="true" data-field="id" data-visible="false">{{ trans('general.id') }}</th>
                                    <th data-sortable="true" data-formatter="locationsLinkFormatter" data-field="name" data-searchable="true">{{ trans('admin/locations/table.name') }}</th>
                                    <th data-sortable="true" data-field="parent">{{ trans('admin/locations/table.parent') }}</th>
                                    <th data-searchable="false" data-sortable="false" data-field="assets_default">{{ trans('admin/locations/table.assets_rtd') }}</th>
                                    <th data-searchable="false" data-sortable="false" data-field="assets_checkedout">{{ trans('admin/locations/table.assets_checkedout') }}</th>
                                    <th data-searchable="true" data-sortable="true" data-field="currency">{{ App\Models\Setting::first()->default_currency }}</th>
                                    <th data-searchable="true" data-sortable="true" data-field="address">{{ trans('admin/locations/table.address') }}</th>
                                    <th data-searchable="true" data-sortable="true" data-field="city">{{ trans('admin/locations/table.city') }}
                                    </th>
                                    <th data-searchable="true" data-sortable="true" data-field="state">
                                        {{ trans('admin/locations/table.state') }}
                                    </th>
                                    <th data-searchable="true" data-sortable="true" data-field="zip">
                                        {{ trans('admin/locations/table.zip') }}
                                    </th>
                                    <th data-searchable="true" data-sortable="true" data-field="country">
                                        {{ trans('admin/locations/table.country') }}</th>
                                    <th data-switchable="false" data-formatter="locationsActionsFormatter" data-searchable="false" data-sortable="false" data-field="actions">{{ trans('table.actions') }}</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div><!-- /asset_tab -->

                    <div class="tab-pane" id="licenses_tab">
                        <div class="table-responsive">
                            <table class="display table table-hover">
                                <thead>
                                <tr>
                                    <th class="col-md-5">{{ trans('general.name') }}</th>
                                    <th class="col-md-6">{{ trans('admin/hardware/form.serial') }}</th>
                                    <th class="col-md-1 hidden-print">{{ trans('general.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div><!-- /licenses-tab -->

                    <div class="tab-pane" id="accessories_tab">
                        <div class="table-responsive">
                            <table class="display table table-hover">
                                <thead>
                                <tr>
                                    <th class="col-md-5">Name</th>
                                    <th class="col-md-1 hidden-print">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div><!-- /accessories-tab -->

                    <div class="tab-pane" id="consumables_tab">
                        <div class="table-responsive">
                            <table class="display table table-striped">
                                <thead>
                                <tr>
                                    <th class="col-md-8">{{ trans('general.name') }}</th>
                                    <th class="col-md-4">{{ trans('general.date') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div><!-- /consumables-tab -->

                    

                    
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div>
    </div>

@stop
@section('moar_scripts')
    @include ('partials.bootstrap-table', ['exportFile' => 'companies-export', 'search' => true])

@stop

