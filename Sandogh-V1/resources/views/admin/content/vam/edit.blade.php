@extends('admin.layouts.master')

@section('head-tag')
    <title>وام</title>
@endsection

@section('content')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">کاربران </a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش  وام  </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                         ویرایش وام
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.vam.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.vam.update', $vams->id) }}" method="post"
                        enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="mablagh_vam">مبلغ وام </label>
                                    <input type="text" class="form-control form-control-sm" name="mablagh_vam" id="mablagh_vam"
                                        value="{{ old('mablagh_vam', $vams->mablagh_vam) }}">
                                </div>
                                @error('mablagh_vam')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="tedad_aghsat">تعداد اقساط </label>
                                    <input type="text" class="form-control form-control-sm" name="tedad_aghsat" id="tedad_aghsat"
                                        value="{{ old('tedad_aghsat', $vams->tedad_aghsat) }}">
                                </div>
                                @error('tedad_aghsat')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="mablagh_ghest"> مبلع اقساط </label>
                                    <input type="text" class="form-control form-control-sm" name="mablagh_ghest" id="mablagh_ghest"
                                        value="{{ old('mablagh_ghest', $vams->mablagh_ghest) }}">
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
                                    <label for="baghimande_vam"> باقی مانده وام  </label>
                                    <input type="text" class="form-control form-control-sm" name="baghimande_vam" id="baghimande_vam"
                                        value="{{ old('baghimande_vam', $vams->baghimande_vam) }}">
                                </div>
                                @error('baghimande_vam')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="baghimande_aghsat"> باقی مانده تعداد اقساط  </label>
                                    <input type="text" class="form-control form-control-sm" name="baghimande_aghsat" id="baghimande_aghsat"
                                        value="{{ old('baghimande_aghsat', $vams->baghimande_aghsat) }}">
                                </div>
                                @error('baghimande_aghsat')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                           

                            <section class="col-12 my-3">
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
    <script>
        $(document).ready(function() {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>

@endsection
