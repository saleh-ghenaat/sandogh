<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('admin.home') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>


            <section class="sidebar-part-title">بخش محتوی</section>
            <a href="{{ route('admin.content.user.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>کاربران </span>
            </a>
            <a href="{{ route('admin.content.accountinformation.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>حساب کاربری </span>
            </a>
            <a href="{{ route('admin.content.vam.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>وام  </span>
            </a>
            <a href="{{ route('admin.content.pardakhtiha.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پرداختی ها  </span>
            </a>
            <a href="{{ route('admin.content.aghsat.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span> اقساط</span>
            </a>
            <a href="{{ route('admin.content.request.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span> درخواست ها</span>
            </a>




            <section class="sidebar-part-title">تنظیمات</section>
            <a href="{{ route('admin.setting.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تنظیمات</span>
            </a>

        </section>
    </section>
</aside>
