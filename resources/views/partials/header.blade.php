<div class="page-header-inner">
    <div class="page-header-inner">
        <div class="navbar-header">
            <a href="{{ url('/') }}"
               class="navbar-brand">
                {{--  @lang('quickadmin.quickadmin_title')  --}}
                {{--  Ameyem Skills  --}}
                <img src="{{ asset('/quickadmin/images/logo.png') }}" height="50" width="120">
                {{--  <img src="/quickadmin/images/logo.png">  --}}
            </a>
        </div>
        <a href="javascript:;"
           class="menu-toggler responsive-toggler"
           data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>

        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
               <li> <h1>{{$current_user}}'s dashboard</h1></li>
            </ul>
        </div>
    </div>
</div>
