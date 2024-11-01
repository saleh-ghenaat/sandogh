<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span> درخواست ها</span>
            </a>

             <a href="{{ route('karbar.content.pardakhtghest.create') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>ثبت قسط</span>
            </a>
             <a href="{{ route('karbar.content.change-password.index' , Auth::user()->id) }}" class="sidebar-link">
                <i class="fas fa-key"></i>
                <span>تغییر رمز عبور</span>
            </a>



        </section>
    </section>
</aside>
