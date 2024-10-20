@extends('admin.layouts.master')

@section('head-tag')
<title> وام</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#"> وام</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد وام </li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ایجادوام
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.content.vam.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.content.vam.store') }}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <section class="row">

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="mablagh_vam"> مبلغ وام</label>
                                <input type="text" class="form-control form-control-sm" name="mablagh_vam" id="mablagh_vam" value="{{ old('mablagh_vam') }}">
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
                                <label for="tedad_aghsat">تعداد اقساط</label>
                                <input type="text" class="form-control form-control-sm" name="tedad_aghsat" id="tedad_aghsat" value="{{ old('tedad_aghsat') }}">
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
                                <label for="baghimande_vam">بافی مانده وام </label>
                                <input type="text" class="form-control form-control-sm" name="baghimande_vam" id="baghimande_vam" value="{{ old('baghimande_vam') }}">
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
                                <label for="baghimande_aghsat">باقی مانده تعداد اقساط </label>
                                <input type="text" class="form-control form-control-sm" name="baghimande_aghsat" id="baghimande_aghsat" value="{{ old('baghimande_aghsat') }}">
                            </div>
                            @error('baghimande_aghsat')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group form-group-div-user">
                                <label for="user-input-id"> کاربر</label>
                                <!-- <select name="user_id" id="" class="form-control form-control-sm">

                                    <option value="">کاربر را انتخاب کنید</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if(old('user_id')==$user->id) selected @endif> {{ $user->first_name }} {{ $user->last_name }} </option>
                                    @endforeach

                                </select> -->
                                <input type="text" class="form-control form-control-sm" name="user_id" id="user-input-id">
                                <div class="div-user-option" id="user-show-div">
                                    @foreach ($users as $user)
                                    <option id="user-option-id" class="option-user" value="{{ $user->id }}" @if(old('user_id')==$user->id) selected @endif> {{ $user->first_name }} {{ $user->last_name }} </option>
                                    @endforeach
                                </div>
                            </div>
                            @error('user_id')
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


<script>
    const mablaghVam = document.querySelector('#mablagh_vam')
    const countGhest = document.querySelector('#tedad_aghsat')
    const mablaghGhest = document.querySelector('#mablagh_ghest')
    const baghVam = document.querySelector('#baghimande_vam')
    const baghTedadAgh = document.querySelector('#baghimande_aghsat')

    countGhest.addEventListener('keyup', () => {
        mablaghGhest.value = mablaghVam.value / countGhest.value
    })
    mablaghVam.addEventListener('keyup', () => {
        baghVam.value = mablaghVam.value
    })
    countGhest.addEventListener('keyup', () => {
        baghTedadAgh.value = countGhest.value
    })
</script>

<script>
    const userInputId = document.getElementById('user-input-id')
    const userShowDiv = document.getElementById('user-show-div')
    const userOptionId = document.querySelectorAll('#user-option-id')

    function creatElements(data) {
        const option = document.createElement('option')
        option.className = 'option-user'
        option.id = 'user-option-id'
        option.innerHTML = `${data.first_name} ${data.last_name}`
        userShowDiv.appendChild(option)
    }
    userOptionId.forEach(element => {
        element.addEventListener('click', () => {
            userShowDiv.style.display = 'none'
            userInputId.value = element.value
        })
    });
    userInputId.addEventListener('click', () => {
        userShowDiv.style.display = 'flex'
        userShowDiv.style.flexDirection = 'column'
    })
    userInputId.addEventListener('keyup', () => {
        userOptionId.forEach(element => {
            userShowDiv.removeChild(element)
        });
        const xhr = new XMLHttpRequest()
        xhr.onload = () => {
            
            creatElements(JSON.parse(xhr.responseText).users)
        }
        xhr.open('GET', `http://127.0.0.1:8000/admin/content/user/api/${userInputId.value}`, true)
        xhr.send()
    })
</script>

<!-- <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            

            if(tags_input.val() !== null && tags_input.val().length > 0)
            {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder : 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function ( event ){
                if(select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script> -->

@endsection