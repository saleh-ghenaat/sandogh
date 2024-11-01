@extends('karbar.layouts.master')

@section('head-tag')
<title> واریز قسط</title>
<link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#"> تغییر رمز عبور </a></li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                     تغییر رمز عبور
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('karbar.home') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('karbar.content.change-password.update', $user->id) }}" method="post" id="form">
                    @csrf
                    {{method_field('put')}}
                    <section class="row">
                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label>رمز عبور فعلی</label>
                                <input type="password" class="form-control form-control-sm" name="old_password">
                            </div>
                            @error('old_password')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>
                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label>رمز عبور جدید</label>
                                <input type="password" class="form-control form-control-sm" name="new_password">
                            </div>
                            @error('new_password')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>
                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label> رمز عبور جدید مجدد </label>
                                <input type="password" class="form-control form-control-sm" name="new_confirm_password">
                            </div>
                            @error('new_confirm_password')
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
