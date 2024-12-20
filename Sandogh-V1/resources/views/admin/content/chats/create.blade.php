@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد چت جدید</title>
<link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
<style>
    .textarea{
        border: 1px solid #ccc;
        width: 100%;
        height: 100px;
        border-radius: 3px;
        margin-top:10px;
        padding: 20px;
        font-size: 16px;
        color: #333;
        resize: none;

    }
    .textarea:hover{
        border:2px #007BFF solid;

    }
    .button{
        cursor: pointer;
        background-color: #007BFF;
        color: white;
    }
    .button:hover{
        background-color: #0056b3;
        color: white;

    }
</style>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="{{route('admin.home')}}">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="{{route('admin.content.chats.index')}}">چت ها</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">ایجاد چت جدید</a></li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                     ایجاد چت جدید
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.content.chats.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>


                <form action="{{ route('admin.content.chat.store') }}" method="post" id="form">
                    @csrf
                    {{method_field('post')}}
                    <section class="col-12">
                        <div class="form-group">
                            <label for="">انتخاب کاربر</label>
                            <select name="user_id" id="" class="form-control form-control-sm">
                                <option value="">کاربر را انتخاب کنید</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>{{ $user->first_name . ' ' . $user->last_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        @error('user_id')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                    </section>
                    <section class="row">
                        <section class="col-12 my-2" style="height: 100px;">
                            <textarea name="body" class="textarea" placeholder="پیام خود را اینجا بنویسید..." required></textarea>
                            @error('body')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 mt-2">
                            <button class="btn btn-sm button">بفرست</button>
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



@endsection
