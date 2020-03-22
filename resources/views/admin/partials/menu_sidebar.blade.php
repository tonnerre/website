<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ URL::to('admin/images/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active">
                    <a class="js-arrow" href="{{ route('admin.index') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
        
                <li>
                    <a href="{{ route('list.product') }}">
                        <i class="fas fa-calendar-alt"></i>Liste produit</a>
                </li>
                <li>
                    <a href="{{ route('form.product') }}">
                        <i class="fas fa-calendar-alt"></i>Ajouter produit</a>
                </li>
                <li>
                    <a href="{{ route('list.order') }}">
                        <i class="fas fa-calendar-alt"></i>Liste commandes</a>
                </li>
               
                <li>
                    <a href="">
                        <i class="fas fa-calendar-alt"></i>Liste Clients</a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-cog"></i>Parametres</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>