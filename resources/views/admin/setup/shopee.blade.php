@extends('author::admin.master.master')
@section('content')
@section('css')
<link rel="stylesheet" type="text/css" href="http://cronjob.vpssim.vn/script/crontab/corntab.css" />
<link rel="stylesheet" type="text/css" href="http://cronjob.vpssim.vn/script/crontab/jquery.ui.all.css" />
<link rel="stylesheet" type="text/css" href="http://cronjob.hostingaz.vn/script/crontab/atooltip.css" />

@endsection
@section('content')
<section id="main-content">
    <div class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div id="reset_crontab" style="margin-bottom:40px;">
                    <div id="output" class="ui-state-highlight ui-corner-all">
                        <p id="output-crontab" class="no-margin">
                            <span id="min-out"></span>
                            <span id="hour-out"></span>
                            <span id="dom-out"></span>
                            <span id="mon-out"></span>
                            <span id="dow-out"></span>
                            <span id="cmd-out"></span>
                        </p>
                    </div>
                    <button id="reset">Đặt lại</button>
                </div>
                <form id="setup_form" method="post" action="{{ route('setup.crontab.shopee') }}">
                    @csrf
                    <div id="accordion">
                        <h3><a href="#">Phút</a></h3>
                        <div id="min-tabs" class="tabs ui-tabs">
                            <ul>
                                <li><a href="#min-tabs-1" rel="min" id="min-everymin_tab">Mỗi phút</a></li>
                                <li><a href="#min-tabs-2" rel="min" id="min-every_tab">Mỗi <em>n</em> phút</a></li>
                                <li><a href="#min-tabs-3" rel="min" id="min-each_tab">Chọn phút thứ</a></li>
                            </ul>
                            <div id="min-tabs-1" class="ui-tabs-hide">
                                <p class="giant-font">*</p><br class="clear" />
                            </div>
                            <div id="min-tabs-2" class="ui-tabs-hide">
                                <p>
                                    <label for="min-every-slider">Mỗi <input id="min-every-slider" type="text"
                                            name="min-out" class="min-out_val"
                                            style="border:0; color:#f6931f; font-weight:bold; width:43px;" /> phút</label>
                                </p>
                                <div id="min-out_slider"></div>
                            </div>
                            <div id="min-tabs-3" class="ui-tabs-hide">
                                <div id="min-format">
                                    <input type="checkbox" name="min-out" id="min-out_0" />
                                    <label class="min-out_0" for="min-out_0">00</label>
                                    <input type="checkbox" name="min-out" id="min-out_1" />
                                    <label class="min-out_1" for="min-out_1">01</label>
                                    <input type="checkbox" name="min-out" id="min-out_2" />
                                    <label class="min-out_2" for="min-out_2">02</label>
                                    <input type="checkbox" name="min-out" id="min-out_3" />
                                    <label class="min-out_3" for="min-out_3">03</label>
                                    <input type="checkbox" name="min-out" id="min-out_4" />
                                    <label class="min-out_4" for="min-out_4">04</label>
                                    <input type="checkbox" name="min-out" id="min-out_5" />
                                    <label class="min-out_5" for="min-out_5">05</label>
                                    <input type="checkbox" name="min-out" id="min-out_6" />
                                    <label class="min-out_6" for="min-out_6">06</label>
                                    <input type="checkbox" name="min-out" id="min-out_7" />
                                    <label class="min-out_7" for="min-out_7">07</label>
                                    <input type="checkbox" name="min-out" id="min-out_8" />
                                    <label class="min-out_8" for="min-out_8">08</label>
                                    <input type="checkbox" name="min-out" id="min-out_9" />
                                    <label class="min-out_9" for="min-out_9">09</label>
                                    <br /> <input type="checkbox" name="min-out" id="min-out_10" />
                                    <label class="min-out_10" for="min-out_10">10</label>
                                    <input type="checkbox" name="min-out" id="min-out_11" />
                                    <label class="min-out_11" for="min-out_11">11</label>
                                    <input type="checkbox" name="min-out" id="min-out_12" />
                                    <label class="min-out_12" for="min-out_12">12</label>
                                    <input type="checkbox" name="min-out" id="min-out_13" />
                                    <label class="min-out_13" for="min-out_13">13</label>
                                    <input type="checkbox" name="min-out" id="min-out_14" />
                                    <label class="min-out_14" for="min-out_14">14</label>
                                    <input type="checkbox" name="min-out" id="min-out_15" />
                                    <label class="min-out_15" for="min-out_15">15</label>
                                    <input type="checkbox" name="min-out" id="min-out_16" />
                                    <label class="min-out_16" for="min-out_16">16</label>
                                    <input type="checkbox" name="min-out" id="min-out_17" />
                                    <label class="min-out_17" for="min-out_17">17</label>
                                    <input type="checkbox" name="min-out" id="min-out_18" />
                                    <label class="min-out_18" for="min-out_18">18</label>
                                    <input type="checkbox" name="min-out" id="min-out_19" />
                                    <label class="min-out_19" for="min-out_19">19</label>
                                    <br /> <input type="checkbox" name="min-out" id="min-out_20" />
                                    <label class="min-out_20" for="min-out_20">20</label>
                                    <input type="checkbox" name="min-out" id="min-out_21" />
                                    <label class="min-out_21" for="min-out_21">21</label>
                                    <input type="checkbox" name="min-out" id="min-out_22" />
                                    <label class="min-out_22" for="min-out_22">22</label>
                                    <input type="checkbox" name="min-out" id="min-out_23" />
                                    <label class="min-out_23" for="min-out_23">23</label>
                                    <input type="checkbox" name="min-out" id="min-out_24" />
                                    <label class="min-out_24" for="min-out_24">24</label>
                                    <input type="checkbox" name="min-out" id="min-out_25" />
                                    <label class="min-out_25" for="min-out_25">25</label>
                                    <input type="checkbox" name="min-out" id="min-out_26" />
                                    <label class="min-out_26" for="min-out_26">26</label>
                                    <input type="checkbox" name="min-out" id="min-out_27" />
                                    <label class="min-out_27" for="min-out_27">27</label>
                                    <input type="checkbox" name="min-out" id="min-out_28" />
                                    <label class="min-out_28" for="min-out_28">28</label>
                                    <input type="checkbox" name="min-out" id="min-out_29" />
                                    <label class="min-out_29" for="min-out_29">29</label>
                                    <br /> <input type="checkbox" name="min-out" id="min-out_30" />
                                    <label class="min-out_30" for="min-out_30">30</label>
                                    <input type="checkbox" name="min-out" id="min-out_31" />
                                    <label class="min-out_31" for="min-out_31">31</label>
                                    <input type="checkbox" name="min-out" id="min-out_32" />
                                    <label class="min-out_32" for="min-out_32">32</label>
                                    <input type="checkbox" name="min-out" id="min-out_33" />
                                    <label class="min-out_33" for="min-out_33">33</label>
                                    <input type="checkbox" name="min-out" id="min-out_34" />
                                    <label class="min-out_34" for="min-out_34">34</label>
                                    <input type="checkbox" name="min-out" id="min-out_35" />
                                    <label class="min-out_35" for="min-out_35">35</label>
                                    <input type="checkbox" name="min-out" id="min-out_36" />
                                    <label class="min-out_36" for="min-out_36">36</label>
                                    <input type="checkbox" name="min-out" id="min-out_37" />
                                    <label class="min-out_37" for="min-out_37">37</label>
                                    <input type="checkbox" name="min-out" id="min-out_38" />
                                    <label class="min-out_38" for="min-out_38">38</label>
                                    <input type="checkbox" name="min-out" id="min-out_39" />
                                    <label class="min-out_39" for="min-out_39">39</label>
                                    <br /> <input type="checkbox" name="min-out" id="min-out_40" />
                                    <label class="min-out_40" for="min-out_40">40</label>
                                    <input type="checkbox" name="min-out" id="min-out_41" />
                                    <label class="min-out_41" for="min-out_41">41</label>
                                    <input type="checkbox" name="min-out" id="min-out_42" />
                                    <label class="min-out_42" for="min-out_42">42</label>
                                    <input type="checkbox" name="min-out" id="min-out_43" />
                                    <label class="min-out_43" for="min-out_43">43</label>
                                    <input type="checkbox" name="min-out" id="min-out_44" />
                                    <label class="min-out_44" for="min-out_44">44</label>
                                    <input type="checkbox" name="min-out" id="min-out_45" />
                                    <label class="min-out_45" for="min-out_45">45</label>
                                    <input type="checkbox" name="min-out" id="min-out_46" />
                                    <label class="min-out_46" for="min-out_46">46</label>
                                    <input type="checkbox" name="min-out" id="min-out_47" />
                                    <label class="min-out_47" for="min-out_47">47</label>
                                    <input type="checkbox" name="min-out" id="min-out_48" />
                                    <label class="min-out_48" for="min-out_48">48</label>
                                    <input type="checkbox" name="min-out" id="min-out_49" />
                                    <label class="min-out_49" for="min-out_49">49</label>
                                    <br /> <input type="checkbox" name="min-out" id="min-out_50" />
                                    <label class="min-out_50" for="min-out_50">50</label>
                                    <input type="checkbox" name="min-out" id="min-out_51" />
                                    <label class="min-out_51" for="min-out_51">51</label>
                                    <input type="checkbox" name="min-out" id="min-out_52" />
                                    <label class="min-out_52" for="min-out_52">52</label>
                                    <input type="checkbox" name="min-out" id="min-out_53" />
                                    <label class="min-out_53" for="min-out_53">53</label>
                                    <input type="checkbox" name="min-out" id="min-out_54" />
                                    <label class="min-out_54" for="min-out_54">54</label>
                                    <input type="checkbox" name="min-out" id="min-out_55" />
                                    <label class="min-out_55" for="min-out_55">55</label>
                                    <input type="checkbox" name="min-out" id="min-out_56" />
                                    <label class="min-out_56" for="min-out_56">56</label>
                                    <input type="checkbox" name="min-out" id="min-out_57" />
                                    <label class="min-out_57" for="min-out_57">57</label>
                                    <input type="checkbox" name="min-out" id="min-out_58" />
                                    <label class="min-out_58" for="min-out_58">58</label>
                                    <input type="checkbox" name="min-out" id="min-out_59" />
                                    <label class="min-out_59" for="min-out_59">59</label>
                                    <br /> </div>
                            </div>
                        </div>

                        <h3><a href="#">Giờ</a></h3>
                        <div id="hour-tabs" class="tabs ui-tabs">
                            <ul>
                                <li><a href="#hour-tabs-1" rel="hour" id="hour-everyhour_tab">Mỗi giờ</a></li>
                                <li><a href="#hour-tabs-2" rel="hour" id="hour-every_tab">Mỗi <em>n</em> giờ</a></li>
                                <li><a href="#hour-tabs-3" rel="hour" id="hour-each_tab">Lựa chọn giờ</a></li>
                            </ul>
                            <div id="hour-tabs-1" class="ui-tabs-hide">
                                <p class="giant-font">*</p><br class="clear" />
                            </div>
                            <div id="hour-tabs-2" class="ui-tabs-hide">
                                <p>
                                    <label for="hour-every-slider">Mỗi <input id="hour-every-slider" type="text"
                                            name="hour-out" class="hour-out_val"
                                            style="border:0; color:#f6931f; font-weight:bold; width:43px;" /> giờ</label>
                                </p>
                                <div id="hour-out_slider"></div>
                            </div>
                            <div id="hour-tabs-3" class="ui-tabs-hide">
                                <div id="hour-format">
                                    <input type="checkbox" name="hour-out" id="hour-out_0" />
                                    <label class="hour-out_0" for="hour-out_0">00</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_1" />
                                    <label class="hour-out_1" for="hour-out_1">01</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_2" />
                                    <label class="hour-out_2" for="hour-out_2">02</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_3" />
                                    <label class="hour-out_3" for="hour-out_3">03</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_4" />
                                    <label class="hour-out_4" for="hour-out_4">04</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_5" />
                                    <label class="hour-out_5" for="hour-out_5">05</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_6" />
                                    <label class="hour-out_6" for="hour-out_6">06</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_7" />
                                    <label class="hour-out_7" for="hour-out_7">07</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_8" />
                                    <label class="hour-out_8" for="hour-out_8">08</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_9" />
                                    <label class="hour-out_9" for="hour-out_9">09</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_10" />
                                    <label class="hour-out_10" for="hour-out_10">10</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_11" />
                                    <label class="hour-out_11" for="hour-out_11">11</label>
                                    <br /> <input type="checkbox" name="hour-out" id="hour-out_12" />
                                    <label class="hour-out_12" for="hour-out_12">12</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_13" />
                                    <label class="hour-out_13" for="hour-out_13">13</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_14" />
                                    <label class="hour-out_14" for="hour-out_14">14</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_15" />
                                    <label class="hour-out_15" for="hour-out_15">15</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_16" />
                                    <label class="hour-out_16" for="hour-out_16">16</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_17" />
                                    <label class="hour-out_17" for="hour-out_17">17</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_18" />
                                    <label class="hour-out_18" for="hour-out_18">18</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_19" />
                                    <label class="hour-out_19" for="hour-out_19">19</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_20" />
                                    <label class="hour-out_20" for="hour-out_20">20</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_21" />
                                    <label class="hour-out_21" for="hour-out_21">21</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_22" />
                                    <label class="hour-out_22" for="hour-out_22">22</label>
                                    <input type="checkbox" name="hour-out" id="hour-out_23" />
                                    <label class="hour-out_23" for="hour-out_23">23</label>
                                    <br /> </div>
                            </div>
                        </div>

                        <h3><a href="#">Ngày trong tháng</a></h3>
                        <div id="dom-tabs" class="tabs ui-tabs">
                            <ul>
                                <li><a href="#dom-tabs-1" rel="dom" id="dom-everydom_tab">Hàng ngày</a></li>
                                <li><a href="#dom-tabs-2" rel="dom" id="dom-each_tab">Đặt ngày</a></li>
                            </ul>
                            <div id="dom-tabs-1" class="ui-tabs-hide">
                                <p class="giant-font">*</p><br class="clear" />
                            </div>
                            <div id="dom-tabs-2" class="ui-tabs-hide">
                                <div id="dom-format">
                                    <input type="checkbox" name="dom-out" id="dom-out_1" />
                                    <label class="dom-out_1" for="dom-out_1">01</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_2" />
                                    <label class="dom-out_2" for="dom-out_2">02</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_3" />
                                    <label class="dom-out_3" for="dom-out_3">03</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_4" />
                                    <label class="dom-out_4" for="dom-out_4">04</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_5" />
                                    <label class="dom-out_5" for="dom-out_5">05</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_6" />
                                    <label class="dom-out_6" for="dom-out_6">06</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_7" />
                                    <label class="dom-out_7" for="dom-out_7">07</label>
                                    <br /> <input type="checkbox" name="dom-out" id="dom-out_8" />
                                    <label class="dom-out_8" for="dom-out_8">08</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_9" />
                                    <label class="dom-out_9" for="dom-out_9">09</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_10" />
                                    <label class="dom-out_10" for="dom-out_10">10</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_11" />
                                    <label class="dom-out_11" for="dom-out_11">11</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_12" />
                                    <label class="dom-out_12" for="dom-out_12">12</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_13" />
                                    <label class="dom-out_13" for="dom-out_13">13</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_14" />
                                    <label class="dom-out_14" for="dom-out_14">14</label>
                                    <br /> <input type="checkbox" name="dom-out" id="dom-out_15" />
                                    <label class="dom-out_15" for="dom-out_15">15</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_16" />
                                    <label class="dom-out_16" for="dom-out_16">16</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_17" />
                                    <label class="dom-out_17" for="dom-out_17">17</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_18" />
                                    <label class="dom-out_18" for="dom-out_18">18</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_19" />
                                    <label class="dom-out_19" for="dom-out_19">19</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_20" />
                                    <label class="dom-out_20" for="dom-out_20">20</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_21" />
                                    <label class="dom-out_21" for="dom-out_21">21</label>
                                    <br /> <input type="checkbox" name="dom-out" id="dom-out_22" />
                                    <label class="dom-out_22" for="dom-out_22">22</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_23" />
                                    <label class="dom-out_23" for="dom-out_23">23</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_24" />
                                    <label class="dom-out_24" for="dom-out_24">24</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_25" />
                                    <label class="dom-out_25" for="dom-out_25">25</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_26" />
                                    <label class="dom-out_26" for="dom-out_26">26</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_27" />
                                    <label class="dom-out_27" for="dom-out_27">27</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_28" />
                                    <label class="dom-out_28" for="dom-out_28">28</label>
                                    <br /> <input type="checkbox" name="dom-out" id="dom-out_29" />
                                    <label class="dom-out_29" for="dom-out_29">29</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_30" />
                                    <label class="dom-out_30" for="dom-out_30">30</label>
                                    <input type="checkbox" name="dom-out" id="dom-out_31" />
                                    <label class="dom-out_31" for="dom-out_31">31</label>
                                </div>
                            </div>
                        </div>

                        <h3><a href="#">Tháng</a></h3>
                        <div id="mon-tabs" class="tabs ui-tabs">
                            <ul>
                                <li><a href="#mon-tabs-1" rel="mon" id="mon-everymon_tab">Tất cả các tháng</a></li>
                                <li><a href="#mon-tabs-2" rel="mon" id="mon-each_tab">Lựa chọn tháng</a></li>
                            </ul>
                            <div id="mon-tabs-1" class="ui-tabs-hide">
                                <p class="giant-font">*</p><br class="clear" />
                            </div>
                            <div id="mon-tabs-2" class="ui-tabs-hide">
                                <div id="mon-format">
                                    <input type="checkbox" name="mon-out" id="mon-out_1" />
                                    <label class="mon-out_1" for="mon-out_1">Tháng 1</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_2" />
                                    <label class="mon-out_2" for="mon-out_2">Tháng 2</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_3" />
                                    <label class="mon-out_3" for="mon-out_3">Tháng 3</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_4" />
                                    <label class="mon-out_4" for="mon-out_4">Tháng 4</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_5" />
                                    <label class="mon-out_5" for="mon-out_5">Tháng 5</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_6" />
                                    <label class="mon-out_6" for="mon-out_6">Tháng 6</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_7" />
                                    <label class="mon-out_7" for="mon-out_7">Tháng 7</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_8" />
                                    <label class="mon-out_8" for="mon-out_8">Tháng 8</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_9" />
                                    <label class="mon-out_9" for="mon-out_9">Tháng 9</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_10" />
                                    <label class="mon-out_10" for="mon-out_10">Tháng 10</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_11" />
                                    <label class="mon-out_11" for="mon-out_11">Tháng 11</label>
                                    <input type="checkbox" name="mon-out" id="mon-out_12" />
                                    <label class="mon-out_12" for="mon-out_12">Tháng 12</label>
                                    <br /> </div>
                            </div>
                        </div>

                        <h3><a href="#">Chọn ngày trong tuần</a></h3>
                        <div id="dow-tabs" class="tabs ui-tabs">
                            <ul>
                                <li><a href="#dow-tabs-1" rel="dow" id="dow-everymon_tab">Tất cả các ngày</a></li>
                                <li><a href="#dow-tabs-2" rel="dow" id="dow-each_tab">Chọn ngày trong tuần</a></li>
                            </ul>
                            <div id="dow-tabs-1" class="ui-tabs-hide">
                                <p class="giant-font">*</p><br class="clear" />
                            </div>
                            <div id="dow-tabs-2" class="ui-tabs-hide">
                                <div id="dow-format">
                                    <input type="checkbox" name="dow-out" id="dow-out_0" />
                                    <label class="dow-out_0" for="dow-out_0">Chủ nhật</label>
                                    <input type="checkbox" name="dow-out" id="dow-out_1" />
                                    <label class="dow-out_1" for="dow-out_1">Thứ 2</label>
                                    <input type="checkbox" name="dow-out" id="dow-out_2" />
                                    <label class="dow-out_2" for="dow-out_2">Thứ 3</label>
                                    <input type="checkbox" name="dow-out" id="dow-out_3" />
                                    <label class="dow-out_3" for="dow-out_3">Thứ 4</label>
                                    <input type="checkbox" name="dow-out" id="dow-out_4" />
                                    <label class="dow-out_4" for="dow-out_4">Thứ 5</label>
                                    <input type="checkbox" name="dow-out" id="dow-out_5" />
                                    <label class="dow-out_5" for="dow-out_5">Thứ 6</label>
                                    <input type="checkbox" name="dow-out" id="dow-out_6" />
                                    <label class="dow-out_6" for="dow-out_6">Thứ 7</label>
                                    <br /> </div>
                            </div>
                        </div>
                    </div>
                    <input id="time_crontab" style="display:none" type="text" name="value" value="">
                    <br>
                    <div>
                        <button class="btn btn-success save_crontab">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript" src="http://cronjob.hostingaz.vn/script/crontab/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="http://cronjob.hostingaz.vn/script/crontab/jquery-ui-1.8rc3.custom.min.js">
</script>
<script type="text/javascript" src="http://cronjob.hostingaz.vn/script/crontab/atooltip.min.jquery.js"></script>
<script type="text/javascript" src="http://cronjob.hostingaz.vn/script/crontab/utils.js"></script>
<script type="text/javascript" src="http://cronjob.vpssim.vn/script/crontab/corntab.js"></script>
<script>
    $(document).ready(function(){
        $('body').find('#setup_form').find('a').css('font-size','17px');
        $('body').find('#setup_form').find('h3').css('font-size','17px');
        $('body').find('#setup_form').find('label').css('font-size','17px');
        $('body').find('#reset_crontab').find('span').css('font-size','17px');
    });
    $('#setup_form').submit(function(){
            let min_out = $('body').find('#min-out').html();
            let hour_out = $('body').find('#hour-out').html();
            let dom_out = $('body').find('#dom-out').html();
            let mon_out = $('body').find('#mon-out').html();
            let dow_out = $('body').find('#dow-out').html();

            let result = min_out + ' ' + hour_out + ' ' + dom_out + ' ' + mon_out + ' ' + dow_out;
            $('body').find('#time_crontab').val(result);
        });
</script>
@endsection
@endsection


