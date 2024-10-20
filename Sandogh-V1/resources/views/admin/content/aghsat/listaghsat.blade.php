@extends('admin.layouts.master')

@section('head-tag')
<title>  لیست اقساط پایان یافته</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> لیست اقساط پایان یافته  </li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 لیست اقساط پایان یافته
                </h5>
            </section>

            @include('admin.alerts.alert-section.success')

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.content.aghsat.index') }}" class="btn btn-info btn-sm">بازگشت   </a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                            <th >#</th>
                            <th> کد پیگیری </th>
                            <th>مبلغ قسط</th>
                            <th> شهریه</th>
                            <th>تاریخ </th>
                            <th>عکس رسید </th>
                            <th>وضعیت</th>
                            <th>منتظر تایید</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pardakhtihas as $key => $pardakhtiha)
                        <tr>

                            <th class="font-size-20">{{ $key += 1 }}</th>
                            <th class="font-size-20">{{$pardakhtiha->code_peygiri}}</th>
                            <td class="font-size-20">{{number_format($pardakhtiha->mablagh_ghest)}} ریال</td>
                            <td class="font-size-20">{{number_format($pardakhtiha->shahriye)}} ریال</td>
                            <td class="font-size-20">{{verta($pardakhtiha->tarikh)}}</td>
                            <td>
                                <img src="{{ asset($pardakhtiha->image ) }}" alt="" width="100" height="50">
                            </td>
                            @if($pardakhtiha->ghabele_taiid == 0)


                            <td class="font-size-20">در انتظار تایید</td>

                            @endif
                            @if($pardakhtiha->ghabele_taiid == 1)

                            <td class="font-size-20">تایید شده</td>

                            @endif
                            <td>
                                <label>
                                    <input id="{{ $pardakhtiha->id }}" onchange="changeStatus({{ $pardakhtiha->id }})" data-url="{{ route('admin.content.aghsat.status', $pardakhtiha->id) }}" type="checkbox" @if ($pardakhtiha->ghabele_taiid === 1)
                                    checked
                                    @endif>
                                </label>
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
                if (response.ghabele_taiid) {
                    if (response.checked) {
                        element.prop('checked', true);
                        successToast(' قسط به اتمام رسید   ')
                    } else {
                        element.prop('checked', false);
                        successToast('  قسط فعال شد    ')
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
