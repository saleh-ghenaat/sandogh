@extends('admin.layouts.master')

@section('head-tag')
<title>  لیست وام های پایان یافته</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> لیست وام های پایان یافته  </li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 لیست وام های پایان یافته
                </h5>
            </section>

            @include('admin.alerts.alert-section.success')

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.content.vam.index') }}" class="btn btn-info btn-sm">بازگشت   </a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام وام گیرنده</th>
                            <th>مبلغ وام</th>
                            <th>تعداد اقساط</th>
                            <th>مبلغ اقساط</th>
                            <th>بافی مانده وام </th>
                            <th>باقی مانده تعداد اقساط </th>
                            <th>وضعیت </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($vams as $key => $vam)

                        <tr>
                           <th class="font-size-20">{{ $key += 1 }}</th>
                            <td class="font-size-20">{{ $vam->user->first_name }} {{ $vam->user->last_name }}</td>
                            <td class="font-size-20" >{{priceFormat( $vam->mablagh_vam)}} ریال</td>
                            <td class="font-size-20">{{priceFormat ($vam->tedad_aghsat)}}</td>
                            <td class="font-size-20">{{priceFormat( $vam->mablagh_ghest)}} ریال</td>
                            <td class="font-size-20">{{priceFormat( $vam->baghimande_vam)}} ریال</td>
                            <td class="font-size-20">{{ priceFormat($vam->baghimande_aghsat)}}</td>
                            <td>
                                <label>
                                    <input id="{{ $vam->id }}" onchange="changeStatus({{ $vam->id }})" data-url="{{ route('admin.content.vam.status', $vam->id) }}" type="checkbox" @if ($vam->status === 1)
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
        function changeStatus(id){
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast(' وام به اتمام رسید   ')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('  وام فعال شد    ')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message){

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

            function errorToast(message){

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
