<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/picture.jpg') }}" class="img-circle" alt="Check cash">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu">
            <li class="header"></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Категории</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('category.list') }}">
                            <i class="fa fa-circle-o"></i> Список</a></li>
                    <li><a href="{{ route('category.create') }}">
                            <i class="fa fa-circle-o"></i> + Создать</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-television"></i> <span>Продукты</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Список</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> + Создать</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>