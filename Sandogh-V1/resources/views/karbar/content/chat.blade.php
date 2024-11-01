@extends('karbar.layouts.master')

@section('head-tag')
<title>گفتگوی آنلاین</title>
<link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">گفتگوی آنلاین</a></li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                     گفتگوی آنلاین
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('karbar.home') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <section id="messages" style="background-color: lightgray;overflow:scroll;height:200px;" class="py-1 px-2 rounded">
                    @foreach($user->chats()->get() as $chat)
                        <p class="p-2 rounded" style="background-color: azure;width:fit-content"><strong>{{ $user->first_name . ' '. $user->last_name }} :</strong> {{ $chat->body }}</p>
                    @endforeach
                </section>
                <form action="{{ route('karbar.content.chat.send', $user->id) }}" method="post" id="form">
                    @csrf
                    {{method_field('post')}}
                    <section class="row">
                        <section class="col-12 my-2" style="height: 100px;">
                            <textarea name="body" class="w-100 h-100 rounded mt-2 p-3" required></textarea>
                            @error('body')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 mt-2">
                            <button class="btn btn-primary btn-sm">بفرست</button>
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
