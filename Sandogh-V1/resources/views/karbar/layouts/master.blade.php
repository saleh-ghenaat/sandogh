<!DOCTYPE html>
<html lang="en">

<head>
    @include('karbar.layouts.head-tag')
    @yield('head-tag')

</head>

<body dir="rtl">

    @include('karbar.layouts.header')



    <section class="body-container">

        @include('karbar.layouts.sidebar')


        <section id="main-body" class="main-body">

            @yield('content')

        </section>
    </section>


    @include('karbar.layouts.script')
    @yield('script')

    <section class="toast-wrapper flex-row-reverse">
        @include('karbar.alerts.toast.success')
        @include('karbar.alerts.toast.error')
    </section>

    @include('karbar.alerts.sweetalert.error')
    @include('karbar.alerts.sweetalert.success')


</body>
</html>
