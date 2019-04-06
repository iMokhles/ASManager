{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: imokhles--}}
{{--* Date: 2019-02-03--}}
{{--* Time: 17:15--}}
{{--*/--}}
@extends('web.layout')


@section('after_style')

@endsection

@section('content')

    @php($localKey = 'applocale')

    <div class="m-t-30 card-box" id="printableInvoice">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box" style="padding-top: 100px;">

                    <div class="row">
                        @if(session($localKey) === 'ar')
                            <div class="col-6">
                                <div class="float-left mt-3">

                                </div>
                            </div><!-- end col -->
                        @endif
                        <div class="@if(session($localKey) === 'ar') col-4 offset-2 @endif" @if(session($localKey) === 'en') style="margin-left: 15px" @endif>
                            <div class="mt-3 @if(session($localKey) === 'en') float-left @elseif(session($localKey) === 'ar') float-right @endif ">

                                @if(session($localKey) === 'en')
                                    <p class="m-b-10"><strong>Invoice Date </strong> {{$entry->created_at->format('d-m-Y')}}</p>
                                    <p class="m-b-10"><strong>Invoice Status </strong> <span class="badge badge-success">@lang('web_dashboard.'.$entry->status)</span></p>
                                    <p class="m-b-10"><strong>Invoice ID </strong> #{{$entry->id}}</p>
                                @elseif(session($localKey) === 'ar')
                                    <p class="m-b-10 text-right"> {{$entry->created_at->format('d-m-Y')}} <strong>تاريخ الفاتورة </strong></p>
                                    <p class="m-b-10 text-right"><span class="badge badge-success">@lang('web_dashboard.'.$entry->status)</span> <strong>حالة الفاتورة </strong></p>
                                    <p class="m-b-10 text-right">#{{$entry->id}} <strong>رقم الفاتورة </strong></p>
                                @endif


                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mt-4" @if(session($localKey) === 'ar') dir="rtl" @endif>
                                    <thead>
                                    <tr @if(session($localKey) === 'ar') class="text-right" @endif>
                                        <th>@lang('web_dashboard.order_device')</th>
                                        <th>@lang('web_dashboard.order_type')</th>
                                        <th>@lang('web_dashboard.order_quantity')</th>
                                        <th class="text-right">@lang('web_dashboard.order_cost')</th>
                                    </tr></thead>
                                    <tbody @if(session($localKey) === 'ar') class="text-right" @endif>
                                    @if(isset($entry->requests))

                                        @foreach($entry->requests as $request)
                                            <tr>
                                                <td>
                                                    <b>{{$request->device}}</b> <br/>
                                                    @if(session($localKey) === 'en')
                                                        Serial: {{$request->serial_number}}
                                                        <br>
                                                        Type: {{$request->type}}
                                                    @elseif(session($localKey) === 'ar')
                                                        الرقم التسلسلي: {{$request->serial_number}}
                                                        <br>
                                                        نوع الخدمة: {{$request->type}}
                                                    @endif
                                                </td>
                                                <td>@lang('web_dashboard.request')</td>
                                                <td>1</td>
                                                <td class="@if(session($localKey) === 'en') text-right @elseif(session($localKey) === 'ar') text-right @endif">{{$request->cost}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if(isset($entry->offers))
                                        @foreach($entry->offers as $offer)
                                            <tr>
                                                <td>
                                                    <b>{{$offer->device}}</b> <br/>
                                                    @if(session($localKey) === 'en')
                                                        Serial: {{$offer->serial_number}}
                                                    @elseif(session($localKey) === 'ar')
                                                        الرقم التسلسلي: {{$offer->serial_number}}
                                                    @endif
                                                </td>
                                                <td>@lang('web_dashboard.offer')</td>
                                                <td>1</td>
                                                <td class="@if(session($localKey) === 'en') text-right @elseif(session($localKey) === 'ar') text-right @endif">{{$offer->cost}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="hidden-print mt-4 mb-4">
                        <div class="text-right">
                            <button onclick="printDiv('printableInvoice')" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</button>
                            <a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-info waves-effect waves-light">@lang('backpack::crud.edit')</a>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')

    <script type="text/javascript">

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection