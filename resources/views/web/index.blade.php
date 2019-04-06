{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: imokhles--}}
 {{--* Date: 2019-02-03--}}
 {{--* Time: 17:15--}}
 {{--*/--}}
@extends('web.layout')


@section('after_style')
    <!--Footable-->
    <link href="{{ asset(config('web_config.theme_name')) }}/plugins/footable/css/footable.core.css" rel="stylesheet">
@endsection

@section('content')

    <div class="search-result-box m-t-30 card-box">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="pt-3 pb-4">
                    <div class="input-group m-t-10">
                        <input type="text"
                               id="searchInput"
                               name="searchInput"
                               class="form-control"
                               placeholder="Order number #" value="@if(isset($orderInfo)) {{$orderInfo->id}} @endif">
                        <div class="input-group-append">
                            <button type="button" id="searchButton" class="btn waves-effect waves-light btn-custom"><i class="fa fa-search m-r-5"></i> Search</button>
                        </div>
                    </div>
                    @if(isset($orderInfo))
                        <div class="m-t-30 text-center">
                            <h4 id="resultTitle">Result for {{$orderInfo->id}}</h4>
                        </div>
                    @else
                        <div class="m-t-30 text-center">
                            <h4 id="resultTitle">No result found</h4>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <!-- end row -->

        @if(isset($orderInfo))

            <table id="resultsTable" class="table table-colored m-b-0 toggle-arrow-tiny">
                <thead>
                <tr>
                    <th data-toggle="true"> Order # </th>
                    <th> Customer Name </th>
                    <th data-hide="all"> Customer Phone </th>
                    <th data-hide="all"> Device </th>
                    <th data-hide="all"> Status </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$orderInfo->id}}</td>
                    <td>{{$orderInfo->customer_name}}</td>
                    <td>{{$orderInfo->customer_phone}}</td>
                    <td>{{$orderInfo->device}}</td>
                    <td><span class="badge label-table badge-secondary">{{$orderInfo->status}}</span></td>
                </tr>
                </tbody>
            </table>

        @endif

    </div>
@endsection

@section('after_scripts')
    <!--FooTable-->
    <script src="{{ asset(config('web_config.theme_name')) }}/plugins/footable/js/footable.all.min.js"></script>
    <!--FooTable Example-->
    <script src="{{ asset(config('web_config.theme_name')) }}/assets/pages/jquery.footable.js"></script>

    <script type="text/javascript">
        // Accordion
        // -----------------------------------------------------------------
        $('#resultsTable').footable().on('footable_row_expanded', function(e) {
            $('#resultsTable tbody tr.footable-detail-show').not(e.row).each(function() {
                $('#resultsTable').data('footable').toggleDetail(this);
            });
        });

        $('#searchButton').click(function () {
            let searchQuery = $( "#searchInput" ).val();
            location.href = "{{url('search/')}}/"+searchQuery;

        })

    </script>
@endsection