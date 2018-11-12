<nav class="navbar navbar-inverse ">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href="#">饿了吧</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @auth
            <ul class="nav navbar-nav">
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">管理员<span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="{{ route('admin.index') }}">管理员列表</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="{{ route('admin.create') }}">添加管理员</a></li>--}}

                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商户活动<span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="{{ route('activity.index') }}">商户活动详细</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商户信息<span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="{{ route('user.index') }}">商户详情</a></li>--}}
                        {{--<li><a href="{{ route('user.create') }}">添加商户</a></li>--}}
                        {{--<li><a href="{{ route('audit.list') }}">商户审核</a></li>--}}

                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="{{ route('shopcategory.update',[$shopc]) }}">修改商铺分类</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商铺分类管理<span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="{{ route('shopcategory.index') }}">商铺分类详情</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="{{ route('shopcategory.update',[$shopc]) }}">修改商铺分类</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">会员管理<span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="{{ route('member.index') }}">会员信息列表</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}

                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">权限|角色管理<span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="{{ route('permission.index') }}">权限管理详细</a></li>--}}
                        {{--<li><a href="{{ route('role.index') }}">角色管理详细</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="{{ route('permission.create') }}">添加权限</a></li>--}}
                        {{--<li><a href="{{ route('role.create') }}">添加角色</a></li>--}}

                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">统计|报表<span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="{{ route('order.week') }}">周订单统计</a></li>--}}
                        {{--<li><a href="{{ route('menu.week') }}">周菜品销量统计</a></li>--}}
                        {{--<li><a href="{{ route('order.month') }}">月订单统计</a></li>--}}
                        {{--<li><a href="{{ route('menu.month') }}">月菜品销量统计</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">菜单管理<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('navs.index') }}">添加菜单</a></li>

                    </ul>
                </li>
                {!!\App\Models\Nav::getNavs()!!}
            </ul>
            @endauth
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索瓜皮">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{ route('login') }}">登录</a></li>
                @endguest
                @auth
                        <li><a href="{{ route('admin.create') }}">注册</a></li>

                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>{{ auth()->user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.index')}}">个人中心</a></li>
                            <li><a href="{{route('admin.show',[auth()->user()])}}">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}">退出</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>