@extends('karbar.layouts.master')

@section('head-tag')
<title>داشبورد اصلی</title>
@endsection

@section('content')

<section class="row">
    @foreach($AccountInformations as $key => $AccountInformation )
    <section class="col-lg-3 col-md-6 col-12">
        <a href="#" class="text-decoration-none d-block mb-4">
            <section class="card bg-custom-yellow text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <p style="font-size: large;">موجودی حساب </p>

                            <h5 style="font-size: large;">{{ number_format($AccountInformation->mojoodi) }} ریال</h5>

                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>

    </section>
    <section class="col-lg-3 col-md-6 col-12">
        <a href="#" class="text-decoration-none d-block mb-4">
            <section class="card bg-custom-green text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <p style="font-size: large;"> تعداد وام های دریافت شده</p>
                            <h5 style="font-size: large;">{{$AccountInformation->tedad_vam}}</h5>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>
    @endforeach
    @foreach($vams as $key => $vam )
    <section class="col-lg-3 col-md-6 col-12">
        <a href="#" class="text-decoration-none d-block mb-4">
            <section class="card bg-custom-pink text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <p style="font-size: large;">مبلغ اخرین وام دریافتی </p>
                            <h5 style="font-size: large;">{{ number_format($vam->mablagh_vam) }} ریال</h5>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>

    <section class="col-lg-3 col-md-6 col-12">
        <a href="#" class="text-decoration-none d-block mb-4">
            <section class="card bg-custom-yellow text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <p style="font-size: large;">تعداد کل اقساط وام جاری</p>
                            <h5 style="font-size: large;">{{$vam->tedad_aghsat}} ماه</h5>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>

    <section class="col-lg-3 col-md-6 col-12">
        <a href="#" class="text-decoration-none d-block mb-4">
            <section class="card bg-danger text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <p style="font-size: large;">مبلغ هر قسط </p>
                            <h5 style="font-size: large;">{{ number_format($vam -> mablagh_ghest)}} ریال</h5>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>

    <section class="col-lg-3 col-md-6 col-12">
        <a href="#" class="text-decoration-none d-block mb-4">
            <section class="card bg-success text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <p style="font-size: large;">باقی مانده وام </p>
                            <h5 style="font-size: large;">{{ number_format($vam -> baghimande_vam)}} ریال</h5>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>

    <section class="col-lg-3 col-md-6 col-12">
        <a href="#" class="text-decoration-none d-block mb-4">
            <section class="card bg-warning text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <p style="font-size: large;">باقی مانده تعداد اقساط </p>
                            <h5 style="font-size: large;">{{$vam->baghimande_aghsat}}</h5>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>

    <section class="col-lg-3 col-md-6 col-12">
        <a href="#" class="text-decoration-none d-block mb-4">
            <section class="card bg-primary text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <p style="font-size: large;">وضعیت وام </p>
                            @if($vam->status == 0)
                            <h5 style="font-size: large;">در حال انجام</h5>
                            @endif
                            @if($vam->status == 1)
                            <h5 style="font-size: large;">پایان یافته</h5>
                            @endif
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>
    @endforeach

</section>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    بخش اقساط
                </h5>
                <p>
                    در این بخش اطلاعات اقساط خود را ببینید
                </p>
            </section>
            <section class="body-content">
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> کد پیگیری </th>
                                <th>مبلغ قسط</th>
                                <th> شهریه</th>
                                <th>تاریخ </th>
                                <th>عکس رسید </th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($pardakhtihas as $key => $pardakhtiha)
                            <tr>

                                <th>{{ $key += 1 }}</th>
                                <th>{{$pardakhtiha->code_peygiri}}</th>
                                <td>{{$pardakhtiha->mablagh_ghest}}</td>
                                <td>{{$pardakhtiha->shahriye}}</td>
                                <td>{{verta($pardakhtiha->tarikh)}}</td>
                                <td>
                                    <img src="{{ asset($pardakhtiha->image ) }}" alt="" width="100" height="50">
                                </td>
                                @if($pardakhtiha->ghabele_taiid == 0)


                                <td>در انتظار تایید</td>

                                @endif
                                @if($pardakhtiha->ghabele_taiid == 1)

                                <td>تایید شده</td>

                                @endif
                            </tr>
                            @endforeach




                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
</section>

@endsection
<script>
    $(document).ready(function() {
        $('#tarikh1').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#tarikh'
        })
    });
</script>