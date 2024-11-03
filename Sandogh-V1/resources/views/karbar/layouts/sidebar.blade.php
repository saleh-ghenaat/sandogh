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
            <a href="{{ route('karbar.content.change-password.index', Auth::user()->id) }}" class="sidebar-link">
                <i class="fas fa-key"></i>
                <span>تغییر رمز عبور</span>
                <a href="{{ route('karbar.content.message.index', Auth::user()->id) }}" class="sidebar-link">
                    @php
                        use App\Models\Message;

                        $lastMessage = Message::where('receiver_id', Auth::user()->id)
                            ->latest()
                            ->first();

                    @endphp
                    <i class="{{ $lastMessage->seen == 0 ? 'fas fa-circle' : ' ' }}"
                        style="color: red;margin:0;padding:0;"></i>
                    <i class="fas fa-comment"></i>
                    <span> گفتگوی آنلاین </span>
                </a>



        </section>
    </section>
</aside>
