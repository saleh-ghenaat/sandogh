@extends('karbar.layouts.master')

@section('head-tag')
<title> واریز قسط</title>
<link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#"> واریز قسط ها</a></li>
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
                <a href="{{ route('karbar.home') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('karbar.content.pardakhtghest.store') }}" method="post" enctype="multipart/form-data" id="form">
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
                        

                      
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">تاریخ انتشار</label>
                                <input type="text" name="tarikh" id="tarikh" class="form-control form-control-sm d-none">
                                <input type="text" id="tarikh1" class="form-control form-control-sm">
                            </div>
                            @error('tarikh')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="image">عکس رسید </label>
                                <input type="file" name="image" id="image" class="form-control form-control-sm">
                            </div>
                            @error('image')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="shahriye">شهریه</label>
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
<script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script>
    CKEDITOR.replace('description');
</script>
<script>
            $(document).ready(function () {
                $('#tarikh1').persianDatepicker({
                    
                    format: 'YYYY/MM/DD',
                    altField: '#tarikh'
                })
            });
    </script>

@endsection