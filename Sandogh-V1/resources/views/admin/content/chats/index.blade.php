@extends('admin.layouts.master')

@section('head-tag')
    <title> کاریران</title>
@endsection


@section('content')
    @php
        use Illuminate\Support\Str;

    @endphp
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="admin.home">خانه</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> چت ها </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        چت ها
                    </h5>
                </section>

                @include('admin.alerts.alert-section.success')

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.chat.create') }}" class="btn btn-info btn-sm">ایجاد چت جدید </a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>پیام های خوانده نشده</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($messages as $key => $message)
                                @php

                                    // if ($user->status != 'admin') {
                                    //     $count = $user->first()->messages()->get()->pluck('seen');
                                    //     $count = $count
                                    //         ->filter(function ($value) {
                                    //             return $value === 0;
                                    //         })
                                    //         ->count();
                                    // } else {
                                    //     $user = $user->where('id', $user->messages->first()->receiver_id)->get();
                                    //     $count = $user->first()->messages()->get()->pluck('seen');
                                    //     $count = $count
                                    //         ->filter(function ($value) {
                                    //             return $value === 0;
                                    //         })
                                    //         ->count();
                                    //     $user = $user->first();

                                    // }
                                    if($message->user()->first()->status =='admin'){

                                        $count = \App\Models\User::where('id' , $message->receiver_id)->first()->sentMessages()->pluck('seen');
                                        $count = $count
                                             ->filter(function ($value) {
                                                 return $value === 0;
                                             })
                                            ->count();
                                            $user = \App\Models\User::where('id' , $message->receiver_id)->first();

                                    }else{
                                        $count = $message->user()->first()->sentMessages()->pluck('seen');
                                         $count = $count
                                             ->filter(function ($value) {
                                                 return $value === 0;
                                             })
                                            ->count();
                                            $user = \App\Models\User::where('id' , $message->author_id)->first();

                                    }


                                @endphp
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $message->user()->first()->status == 'admin' ? $message->receiver_firstname : $message->user()->first()->first_name }}
                                    </td>
                                    <td>{{ $message->user()->first()->status == 'admin' ? $message->receiver_lastname : $message->user()->first()->last_name }}
                                    </td>
                                    <td>{{ $count ? $count : '-' }}</td>


                                    <td class="width-16-rem text-center">
                                        <a href="{{ route('admin.content.chat.show', $user) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> نمایش</a>
                                        <form class="d-inline" action="{{ route('admin.content.chat.destroy', $user->id) }}"
                                            method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger btn-sm delete" type="submit"><i
                                                    class="fa fa-trash-alt"></i> حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        function changeStatus(id) {
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('دسته بندی با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیر فعال شد')
                        }
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error: function() {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message) {

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }

            function errorToast(message) {

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }
        }
    </script>


    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
