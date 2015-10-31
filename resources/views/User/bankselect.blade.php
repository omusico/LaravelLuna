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
            <h2 class="col-md-offset-4">选择银行</h2><br><br>

            <table width="100%" border="0">
                <tbody>
                <tr style="vertical-align:middle;">
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="1" style="vertical-align:top;">
                    </td>
                    <td id="b1" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.abchina.com/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/ABOC.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="2" style="vertical-align:top;">
                    </td>
                    <td id="b2" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.bankofbeijing.com.cn" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/BOBJ.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="3" style="vertical-align:top;">
                    </td>
                    <td id="b3" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.bankcomm.com/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/BOCOM.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="4" style="vertical-align:top;">
                    </td>
                    <td id="b4" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.bankofshanghai.com" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/BOS.jpg"></a>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="5" style="vertical-align:top;">
                    </td>
                    <td id="b5" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.boc.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="6" style="vertical-align:top;">
                    </td>
                    <td id="b6" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.ccb.com/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CCB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="7" style="vertical-align:top;">
                    </td>
                    <td id="b7" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.cebbank.com" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CEB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="8" style="vertical-align:top;">
                    </td>
                    <td id="b8" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.cib.com.cn" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CIB.jpg"></a>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="9" style="vertical-align:top;">
                    </td>
                    <td id="b9" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.cmbc.com.cn" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CMBC.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="10" style="vertical-align:top;">
                    </td>
                    <td id="b10" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.cmbchina.com/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CMBCHINA.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="11" style="vertical-align:top;">
                    </td>
                    <td id="b11" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://bank.ecitic.com/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/ECITIC.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="12" style="vertical-align:top;">
                    </td>
                    <td id="b12" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.gdb.com.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/GDB.jpg"></a>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="13" style="vertical-align:top;">
                    </td>
                    <td id="b13" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.hxb.com.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/HXB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="14" style="vertical-align:top;">
                    </td>
                    <td id="b14" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.icbc.com.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/ICBC.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="15" style="vertical-align:top;">
                    </td>
                    <td id="b15" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.chinapost.com.cn" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/PSBC.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="16" style="vertical-align:top;">
                    </td>
                    <td id="b16" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.sdb.com.cn" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SDB.jpg"></a>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="17" style="vertical-align:top;">
                    </td>
                    <td id="b17" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://ebank.spdb.com.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SPDB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="18" style="vertical-align:top;">
                    </td>
                    <td id="b18" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.18ebank.com" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SZPAB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="19" style="vertical-align:top;">
                    </td>
                    <td id="b19" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.cbhb.com.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/BHB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="20" style="vertical-align:top;">
                    </td>
                    <td id="b20" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.dongguanbank.cn" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/DGB.jpg"></a>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="21" style="vertical-align:top;">
                    </td>
                    <td id="b21" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.gzcb.com.cn" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/GZCB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="22" style="vertical-align:top;">
                    </td>
                    <td id="b22" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.hccb.com.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/HZB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="23" style="vertical-align:top;">
                    </td>
                    <td id="b23" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.czbank.com/czbank/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CZB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="24" style="vertical-align:top;">
                    </td>
                    <td id="b24" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.nbcb.com.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/NBCB.jpg"></a>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="25" style="vertical-align:top;">
                    </td>
                    <td id="b25" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.hkbea.com/hk/index_tc.htm" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/HKBEA.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="26" style="vertical-align:top;">
                    </td>
                    <td id="b26" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.wzcb.com.cn" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/WZCB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="27" style="vertical-align:top;">
                    </td>
                    <td id="b27" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.jshbank.com/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SXJS.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="28" style="vertical-align:top;">
                    </td>
                    <td id="b28" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.njcb.com.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/NJCB.jpg"></a>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="29" style="vertical-align:top;">
                    </td>
                    <td id="b29" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.961111.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/GNXS.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="30" style="vertical-align:top;">
                    </td>
                    <td id="b30" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.shrcb.com" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SHRCB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="31" style="vertical-align:top;">
                    </td>
                    <td id="b31" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.hkbchina.com" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/HKBCHINA.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="32" style="vertical-align:top;">
                    </td>
                    <td id="b32" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.zhnx.com.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/ZHNX.jpg"></a>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="33" style="vertical-align:top;">
                    </td>
                    <td id="b33" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.sdebank.com/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SDE.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="34" style="vertical-align:top;">
                    </td>
                    <td id="b34" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.ydxh.cn" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/YDXH.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="35" style="vertical-align:top;">
                    </td>
                    <td id="b35" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.czcb.com.cn/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CZCB.jpg"></a>
                    </td>
                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                        <input name="bank_id" type="radio" value="36" style="vertical-align:top;">
                    </td>
                    <td id="b36" width="70" style="vertical-align:top; padding-top:2px">
                        <a href="http://www.bjrcb.com/" target="_blank"><img
                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/BJRCB.jpg"></a>
                    </td>
                </tr>
                <tr></tr>
                </tbody>
            </table>
        </main>
    </div>
@stop
