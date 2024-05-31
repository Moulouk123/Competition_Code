<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/newsletter">
                <i class="icon-mail menu-icon"></i>
                <span class="menu-title">Newsletter</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/categories">
                <i class="icon-mail menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/articls">
                <i class="icon-mail menu-icon"></i>
                <span class="menu-title">Articles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#u-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-folder menu-icon"></i>
                <span class="menu-title">Questions</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="u-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('all_QuestionsA') }}">Questions</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('faqs') }}">Faqs</a></li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/liste_user">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Accounts</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/tips">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Tips</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('comments') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Comments</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/message">
                <i class="icon-mail menu-icon"></i>
                <span class="menu-title">Messages</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#-basicc" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-folder menu-icon"></i>
                <span class="menu-title">Website manage</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="-basicc">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('values') }}">Values</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('setups') }}">Set Ups</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('missions') }}">Missions</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categoriesPolicy') }}">Policies</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('socialworks.getAll') }}">Social Networks</a></li>

                </ul>
            </div>
        </li>
    </ul>
</nav>
