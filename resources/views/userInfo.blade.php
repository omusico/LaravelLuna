<div>
    @if(isset(Auth::user()->name))
        <span>欢迎您回来 {{Auth::user()->name}}<br/><br/>
                                余额：{{ \App\lu_user_data::where('uid',Auth::user()->id)->first()->points}}
                            </span>
    @else
        <div style="margin-top: 50px">
            尊敬的用户<br/>您还未登陆，请马上<a href="/login"><span
                        style="font-family: bold;color: red">登陆</span> </a>
            或<a><span style="color: red;">注册</span></a>
        </div>
    @endif
</div>
