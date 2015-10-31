@extends('Layout.master')

@section('title')
    修改密码
@stop

@section('content')
    <div class="container">
        <aside class="col-md-3" style="padding-left: 0px">
            @include('User.left_bar')
        </aside>
        <main class="col-md-9">
            @include('errors.list')
            <h2 class="col-md-offset-4">修改密码</h2><br><br>

            {!! Form::open(['url' => '/company', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            @if(isset($bank))
                <div class="form-group">
                    <label for="amounts" class="control-label col-md-4">充值账户: </label>
                    <label class="radio-inline col-md-4">
                        <input checked type="radio" value="{{$bank->id}}" name="siteBankId">
                        <a style="color:red">
                            银行名称：{{$bank->bankName}}<br/>
                            银行账号：{{$bank->bankCode}}<br/>
                            开户人 ：{{$bank->userName}}
                        </a>
                    </label>
                </div>
            @endif
            <div class="form-group">
                <label for="sn" class="control-label col-md-4">订单号: </label>

                <div class="col-md-4">
                    <input class="form-control" name="sn" type="text" id="sn"
                           value="{{date("YmdHis")}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="amounts" class="control-label col-md-4">充值金额: </label>

                <div class="col-md-4">
                    <input class="form-control money" name="amounts" type="number" id="amounts" required>
                </div>
            </div>
            <div class="form-group">
                <label for="bankId" class="control-label col-md-4">银行: </label>

                <div class="col-md-4">
                    <select class="form-control" name="bankId" id="bankId" required
                            onchange="changetobank(this)">
                        <option value=""></option>
                        <option value="1">北京银行</option>
                        <option value="2">中国建设银行</option>
                        <option value="3">招商银行</option>
                        <option value="4">中国工商银行</option>
                        <option value="5">平安银行</option>
                        <option value="6">杭州银行</option>
                        <option value="7">温州银行</option>
                        <option value="8">上海农商银行</option>
                        <option value="9">交通银行</option>
                        <option value="10">中国农业银行</option>
                        <option value="11">中国银行</option>
                        <option value="12">中国民生银行</option>
                        <option value="13">华夏银行</option>
                        <option value="14">浦发银行</option>
                        <option value="15">广州银行</option>
                        <option value="16">BEA东亚银行</option>
                        <option value="17">广州农商银行</option>
                        <option value="18">顺德农商银行</option>
                        <option value="19">中国光大银行</option>
                        <option value="20">中信银行</option>
                        <option value="21">中国邮政</option>
                        <option value="22">渤海银行</option>
                        <option value="23">浙商银行</option>
                        <option value="24">晋商银行</option>
                        <option value="25">汉口银行</option>
                        <option value="26">浙江稠州商业银行</option>
                        <option value="27">上海银行</option>
                        <option value="28">兴业银行</option>
                        <option value="29">广发银行</option>
                        <option value="30">深圳发展银行</option>
                        <option value="31">东莞银行</option>
                        <option value="32">宁波银行</option>
                        <option value="33">南京银行</option>
                        <option value="34">北京农商银行</option>
                    </select>
                    <input name="payBank" id="payBank" type="hidden">
                    <input name="siteId" value="1" type="hidden">
                    {{--<input name="siteBankId" id="siteBankId" value="1" type="hidden">--}}
                    {{--<input name="status" value="2" type="hidden">--}}
                </div>
            </div>

            <div class="form-group">
                <label for="rechargerUser" class="control-label col-md-4">存款人姓名:</label>

                <div class="col-md-4">
                    <input class="form-control" name="rechargerUser" type="text" id="rechargerUser">
                </div>
            </div>
            <div class="form-group">
                <label for="payArea" class="control-label col-md-4">开户行网点: </label>

                <div class="col-md-4">
                    <input class="form-control" name="payArea" type="text" id="payArea">
                </div>
            </div>
            <div class="form-group">
                <label for="payAreaCity" class="control-label col-md-4">开户行城市: </label>

                <div class="col-md-4">
                    <input class="form-control" name="payAreaCity" type="text" id="payAreaCity">
                </div>
            </div>
            <div class="form-group">
                <label for="payType" class="control-label col-md-4">支付方式: </label>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="radio-inline">
                            <input checked type="radio" value="1" name="payType">网银转帐
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="2" name="payType">ATM自动柜员机
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="3" name="payType">ATM现金入款
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="4" name="payType">银行柜台
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="5" name="payType">手机银行转帐
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    {!! Form::submit('提交,申请', ['class' => 'btn btn-success form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </main>
    </div>
@stop
