<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('admin.home') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>
            <section class="sidebar-part-title">بخش محتوی</section>
            <a href="{{ route('admin.content.category.all') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی</span>
            </a>
            <a href="{{ route('admin.content.subcategory.all') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>زیر دسته ها</span>
            </a>
            <a href="{{ route('admin.content.posts.all') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پست های اینگلیسی</span>
            </a>
            <a href="{{ route('admin.content.posts.all.farsi') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span> پست های فارسی</span>
            </a>
            <a href="{{ route('admin.content.comments.all') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>نظرات</span>
            </a>
            <a href="{{ route('admin.content.exams.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>آزمون ها</span>
            </a>
        </section>
    </section>
</aside>
