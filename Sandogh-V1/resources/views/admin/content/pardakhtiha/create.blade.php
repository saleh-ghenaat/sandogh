@extends(karbar.layouts.master')

@section('head-tag')
<title> واریز قسط</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#"> واریز قسط </a></li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    واریز قسط
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.content.pardakhtiha.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.content.pardakhtiha.store') }}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="code_peygiri"> کد پیگیری </label>
                                <input type="text" class="form-control form-control-sm" name="code_peygiri" id="code_peygiri" value="{{ old('code_peygiri') }}">
                            </div>
                            @error('code_peygiri')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="mablagh_ghest">مبلغ اقساط</label>
                                <input type="text" class="form-control form-control-sm" name="mablagh_ghest" id="mablagh_ghest" value="{{ old('mablagh_ghest') }}">
                            </div>
                            @error('mablagh_ghest')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <select name="shahriye" class="form-control form-control-sm col-12 col-md-6 my-2">
                                    <option value="500000">{{number_format(500000)}} ریال</option>
                                    <option value="100000">{{number_format(1000000)}} ریال</option>
                                    <option value="1500000">{{number_format(1500000)}} ریال</option>
                                    <option value="2000000">{{number_format(2000000)}} ریال</option>
                                </select>
                            </div>
                            @error('shahriye')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="month">ماه </label>
                                <select name="month" class="form-control form-control-sm">
                                    <option value="فروردین">فروردین</option>
                                    <option value="اردیبهشت">اردیبهشت</option>
                                    <option value="خرداد">خرداد</option>
                                    <option value="تیر">تیر</option>
                                    <option value="مرداد">مرداد</option>
                                    <option value="شهریور">شهریور</option>
                                    <option value="مهر">مهر</option>
                                    <option value="ابان">ابان</option>
                                    <option value="اذر">اذر</option>
                                    <option value="دی">دی</option>
                                    <option value="بهمن">بهمن</option>
                                    <option value="اسفند">اسفند</option>
                                </select>
                            </div>
                            @error('tedad_aghsat')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">عکس رسید </label>
                                <input type="file" name="akse_resid" class="form-control form-control-sm">
                            </div>
                            @error('akse_resid')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>





                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

@endsection

@section('script')

<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description');
</script>

@endsection