<!DOCTYPE html>
<html>
    <head>  
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> <!--https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js bootstrap2 -->
        <script src="js/canvasjs.min.js"></script>
        <title>MPF Drive</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> <!-- https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css bootstrap1.css -->

        <!-- Styles -->
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- add thư viện cho nút nhất hoặc icon -->
        <link rel="stylesheet" href="css/setting.css"> <!-- css cho phần hiển thị cài đặt  -->
        <link rel="stylesheet" href="css/home/body.css"> <!-- css cơ bản cho phần giao diện trang web -->
        <link rel="stylesheet" href="css/home/camera.css"> <!-- phần css cho phần camera chủ yếu là backgroud -->
        <link rel="stylesheet" href="css/home/range.css">
        <link rel="stylesheet" href="css/home/selection.css">
        <!-- <link rel="stylesheet" href="css/home/media.css"> -->
    </head>
   
    <style>

/* phóng to phóng nhỏ */
        .zoom{ 
            /* background-color: #DDD;  */
            /* height: 100px;  */
            margin: auto; 
            overflow: hidden; 
            width: calc(60%); 
            /*width: px;*/
        }
 
        .erro-battery{
            /* display: none; */
            -webkit-animation: NAME-YOUR-ANIMATION 1s infinite; /* Safari 4+ */
            -moz-animation:    NAME-YOUR-ANIMATION 1s infinite; /* Fx 5+ */
            -o-animation:      NAME-YOUR-ANIMATION 1s infinite; /* Opera 12+ */
            animation:         NAME-YOUR-ANIMATION 1s infinite; /* IE 10+, Fx 29+ */
        }
        @-webkit-keyframes NAME-YOUR-ANIMATION {
            0%, 49% {
                border: 3px solid #e50000;
            }
            50%, 100% {
                border: 3px solid #337ab7;
            }
        }

/* nút nhấn điều khiển */
        .btn2 {
            background-color: #ffffff00;
            border: none;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            color: #b7337a;  /*337ab780*/
            /* padding: 1px 6px; */
            cursor: pointer;
            font-size: 50px;
        }
        .btn2:hover {
            color: #23527c;
            text-decoration: underline;
        }

/* nút nhấn phần cài đặt */
        .btn-setting {
            background-color: #ffffff00;
            border: none;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            color: #005df3b3;
            /* padding: 1px 6px; */
            cursor: pointer;
            font-size: 25px;
        }
        .btn-setting:hover {
            color: #004aff;
            text-decoration: underline;
        }
        
        
        .grid-control-center {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-Loop {
            background-color: #ffffff00;
            border: none;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            color: #b7337a;  /*337ab780*/
            /* padding: 1px 6px; */
            cursor: pointer;
            font-size: 60px;
            flex: 0 0 calc(50% - 40px);
        }
        .btn-Loop:hover {
            color: #23527c;
            text-decoration: underline;
        }
/* chia grid phần điều khiển */
        .grid-control-up {
            text-align: center;
            display: grid;
            /* grid-template-columns: 30px 30px 30px;
            grid-template-rows: 30px 30px 30px; */
            gap: 0px 0px;
            grid-template-areas:
                ". Up ."
                "Up-Left Stop Up-Right"
                ". Down .";
        }

        .CCW { grid-area: CCW; }
        .Up { grid-area: Up; }
        .CW { grid-area: CW; }
        .Up-Left { grid-area: Up-Left; }
        .Stop { grid-area: Stop; }
        .Up-Right { grid-area: Up-Right; }
        .Down { grid-area: Down; }
        .Down-Left { grid-area: Down-Left; }
        .Down-Right { grid-area: Down-Right; }

/* chia web làm 3 phần */
        .height-col-top{
            height: calc(100%/4)
        }
        .height-col-mid{
            height: calc(75%/2)
        }
        .height-col-bot{
            height: calc(75%/2)
        }

/* css phần đầu(header) */
        .batteryContainer {
            padding-top: 5px;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .batteryOuter {
            border-radius: 3px;
            border: 2px solid black;
            padding: 0px;
            width: 45px;
            height: 18px;
        }

        .batteryBump {
            border-radius: 2px;
            border: 1px solid black;
            margin: 1px;
            width: 2px;
            height: 7px;
        }

        #batteryLevel {
            border-radius: 1px;
            background-color: #73AD21;
            /* width: 41px; */
            /* height: 14px; */
            text-align: center;
        }

        .error-notification{
            height: 25px; 
            display: none;
            border: 1.5px solid #337ab7;
            border-radius: 0 0 10px 10px;
            border-top-style: hidden;
            background-color: #ffffff54;
            font-size: 25px;
            flex: 0 0 calc(50% - 40px);
        }
        .degree-notification{
            height: 25px; 
            display: none;
            border: 1.5px solid #337ab7;
            border-radius: 0 0 10px 10px;
            border-top-style: hidden;
            background-color: #ffffff54;
            font-size: 25px;
            flex: 0 0 calc(50% - 40px);
        }

        #control-left, #control-right, #control-bot-left{
            visibility: hidden;
        }

/* phần dropdown bên trong phần cài đặt */
        .icon{
            height: 14px;
            width: 14px;
        }
        .icons8{
            height: 16px;
            width: 16px;
        }

/* bot one by one */
        #bot-1-by-1{
            display: none;
        }

/* media */
        @media screen and (max-width: 1679px) {
            .btn2 {
                font-size: 30px;
            }
        }

        @media screen and (max-width: 1592px) {
            .btn2 {
                font-size: 75px;
            }
        }

        @media screen and (max-width: 1534px) {
            .btn2 {
                font-size: 70px;
            }
        }
        @media screen and (max-width: 1476px) {
            .btn2 {
                font-size: 65px;
            }
        }
        @media screen and (max-width: 1414px) {
            .btn2 {
                font-size: 60px;
            }
        }
        @media screen and (max-width: 1196px) {
            .btn2 {
                font-size: 40px;
            }
        }
        @media screen and (max-width: 414px) {
            .btn2 {
                font-size: 40px;
            }
        }

        @media screen and (max-height: 375px) {
            .camera_id2 {
                /* width: 187px; */
                height: 375px;

            }
            .camera_id3, .camera_id1 {
                /* width: 187px; */
                /* height: 375px; */

            }
        }

    </style>
    <body> 
        <div class="container">
            <div class="row camera_id2" id = "camera_id2">
             <!-------------------------------------------------------TOP--------------------------------------------------------------->
                <div class = "col-xs-12 height-col-top">
                    <div class = "col-xs-2">
                        <div class="batteryContainer">
                            <div class="batteryOuter"><div id="batteryLevel"></div></div>
                            <div class="batteryBump"></div>
                            <a href="#" style = "padding: 0 0 0 5px; font-size: 18px; color: red;"><span id = "span" class="fa fa-bullseye"></span></a>
                        </div>
                    </div> <!-- div pin -->
                    <div class = "col-xs-8 grid-control-center ">
                        <div class = "error-notification text-center" id = "error-notification" ></div>
                        <div class = "degree-notification text-center" id = "degree-notification" > </div>
                        <div class="rich-select custom-select">
                            <div class="rich-select-dropdown">
                                    <div class="rich-select-option">
                                        <input type="radio" name="game" id="game-174430-268248" checked="">
                                        <div class="rich-select-option-body">
                                            <label tabindex="-1">
                                                <img src="public/images/big.png" alt="">Big Boundaries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="rich-select-option">
                                        <input type="radio" name="game" id="game-174430-331119">
                                        <div class="rich-select-option-body">
                                            <label tabindex="-1">
                                                <img src="public/images/medium.png" alt="">Medium Boundaries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="rich-select-option">
                                        <input type="radio" name="game" id="game-174430-331120">
                                        <div class="rich-select-option-body">
                                            <label tabindex="-1">
                                                <img src="public/images/small.png" alt="">Small Boundaries
                                            </label>
                                        </div>
                                    </div>
                            </div>
                            <input type="checkbox" id="rich-select-dropdown-button" class="rich-select-dropdown-button">
                            <label for="rich-select-dropdown-button"></label>
                            <div class="rich-select-options">
                                    <div class="rich-select-option">
                                        <div class="rich-select-option-body">
                                            <label for="game-174430-268248" tabindex="-1" onclick="document.getElementById('rich-select-dropdown-button').click();">
                                                <img src="public/images/big.png" alt=""> Big Boundaries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="rich-select-option">
                                        <div class="rich-select-option-body">
                                            <label for="game-174430-331119" tabindex="-1" onclick="document.getElementById('rich-select-dropdown-button').click();">
                                                <img src="public/images/medium.png" alt=""> Medium Boundaries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="rich-select-option">
                                        <div class="rich-select-option-body">
                                            <label for="game-174430-331120" tabindex="-1" onclick="document.getElementById('rich-select-dropdown-button').click();">
                                                <img src="public/images/small.png" alt=""> Small Boundaries
                                            </label>
                                        </div>
                                    </div>
                            </div>

                        <!-- <button class = "btn-Loop text-center" id = "btn-Loop"><i class="fa fa-road" aria-hidden="true" onclick='tank_control(13)'></i></button> -->
                    </div>
                    
                    <div class = "col-xs-offset-10 text-right" style = "margin-right: 20px">
                        <button class="btn-setting" name = "setting" style = "margin: 10px 10px 0 0;"><i class="fa fa-map" aria-hidden="true" onclick="location.href='{{ url('/maps') }}'"></i></button>
                        <button class="btn-setting" name = "setting" style = "margin-top: 10px;"><i class="fa fa-cogs" aria-hidden="true" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"></i></button>
                        <!-- modal 1 phần cài đặt -->
                        <div id="id01" class="modal">
                            <div class="modal-content animate">
                                <div class = "row text-left" id = "permissions" style = "padding-top:10px !important;">
                                    <div class = "col-xs-5" style = "margin-left: 10px !important;">
                                        <img id = "video-icon" class="icon" src = "/public/images/icons/icons8-access-50.png">&nbsp;Permissions: &nbsp;&nbsp;</img>
                                    </div>
                                    <div class = "col-xs-3 text-center">
                                        <a href="#" id="private-menuitem" data-description="Admin">
                                            <span id="private-tick-permissions" class="glyphicon glyphicon-ok"></span>
                                            <img class="icon" src = "/public/images/icons/icons8-administrator-male-50.png"></img>
                                            Admin
                                        </a>
                                    </div>
                                    <div class = "col-xs-3 text-center">
                                        <a href="#" id="public-menuitem" data-description="User">
                                            <span id="public-tick-permissions" class="glyphicon glyphicon-ok"></span>
                                            <img class="icon" src = "/public/images/icons/icons8-user-50.png"></img>
                                            User
                                        </a>
                                    </div>
                                </div> <!-- bot view camera -->
                             <!-- Bot interface -->
                                <div class = "row" id = "bot-view-camera" style = "padding-top:10px !important;">
                                    <div class = "col-xs-5" style = "margin-left: 10px !important;">
                                        <img id = "video-icon" class="icon" src = "/public/images/video-camera.png">&nbsp;Bottom Interface: &nbsp;&nbsp;</img>
                                    </div>
                                    <div class = "col-xs-3 text-center">
                                        <a href="#" id="private-menuitem" data-description="1-Line">
                                            <span id="private-tick" class="glyphicon glyphicon-ok"></span>
                                            <span class="fa fa-eye"></span>
                                            1 Line
                                        </a>
                                    </div>
                                    <div class = "col-xs-3 text-center">
                                        <a href="#" id="public-menuitem" data-description="2-Line">
                                            <span id="public-tick" class="glyphicon glyphicon-ok"></span>
                                            <span class="fa fa-eye-slash"></span>
                                            2 Line
                                        </a>
                                    </div>
                                </div> <!-- bot view camera -->
                             <!-- Front Camera -->
                                <div class = "row" id = "front-view-camera" style = "padding-top:10px !important;">
                                    <div class = col-xs-1></div>
                                    <div class = "col-xs-4" style = "margin-left: 10px !important;">
                                        <img id = "video-front-icon" class="icon" src = "/public/images/video-camera.png">&nbsp;Front View: &nbsp;&nbsp;</img>
                                    </div>
                                    <div class = "col-xs-3 text-center">
                                        <a href="#" id="private-menuitem" data-description="Front-Show">
                                            <span id="private-tick" class="glyphicon glyphicon-ok"></span>
                                            <span class="fa fa-eye"></span>
                                            Show  &nbsp;
                                        </a>
                                    </div>
                                    <div class = "col-xs-3 text-center">
                                        <a href="#" id="public-menuitem" data-description="Front-Hide">
                                            <span id="public-tick" class="glyphicon glyphicon-ok"></span>
                                            <span class="fa fa-eye-slash"></span>
                                            Hide  &nbsp;
                                        </a>
                                    </div>
                                </div> <!-- Front view camera -->
                             <!-- Rear Camera -->
                                <div class = "row" id = "rear-view" style = "margin: 10px 0 10px 0 !important;">
                                    <div class = col-xs-1></div>
                                    <div class = "col-xs-4" style = "margin-left: 10px !important;">
                                        <img id = "video-rear-icon" class="icon" src = "/public/images/video-camera.png">&nbsp;Rear View: &nbsp;&nbsp;</img>
                                    </div>
                                    <div class = "col-xs-3 text-center">
                                        <a href="#" id="private-menuitem" data-description="Rear-Show">
                                            <span id="private-tick" class="glyphicon glyphicon-ok"></span>
                                            <span class="fa fa-eye"></span>
                                            Show  &nbsp;
                                        </a>
                                    </div>
                                    <div class = "col-xs-3 text-center">
                                        <a href="#" id="public-menuitem" data-description="Rear-Hide">
                                            <span id="public-tick" class="glyphicon glyphicon-ok"></span>
                                            <span class="fa fa-eye-slash"></span>
                                            Hide  &nbsp;
                                        </a>
                                    </div>
                                </div> <!-- Rear view camera -->
                            </div>
                        </div> <!-- modal div setting -->
                        <!-- modal 2 phần thông báo xin quyền admin -->
                        <div class = "modal text-center" id = "modal_id02">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id = "name_user"></h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onclick = 'permission(1)'>Ok</button>
                                        <button type="button" class="btn btn-danger" onclick = 'permission(0)'>No</button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- kết thúc modal 2 -->
                    </div> <!-- div pin -->
                </div> <!-- div top -->
             <!-------------------------------------------------------MID--------------------------------------------------------------->
                <div class = "col-xs-12 height-col-mid" style = "padding-top: -20px">
                    <div class = "col-xs-3 grid-control-up" id = "control-left" style = "margin-left: 10px">
                        <div class="Up">
                            <button class="btn2" name = "go_up" style = "margin-bottom: 10px"><i class="fa fa-arrow-up" aria-hidden="true" onclick='tank_control(6)'></i></button>
                        </div>
                        <div class="Up-Left">
                            <button class="btn2" name = "turn_left" ><i class="fa fa-arrow-left" aria-hidden="true" onclick='tank_control(8)'></i></button>
                        </div>
                        <div class="Stop">
                            <button class="btn2" name = "stop" style = "font-size: 45px; margin: 0 10px 0 10px; "><i class="fa fa-bullseye" aria-hidden="true" onclick='tank_control(0)'></i></button> <!-- -->
                        </div>
                        <div class="Up-Right">
                            <button class="btn2" name = "turn_right" ><i class="fa fa-arrow-right" aria-hidden="true" onclick='tank_control(7)'></i></button>
                        </div>
                        <div class="Down">
                            <button class="btn2" name = "go_down" style = "margin: 10px 0 20px 0;"><i class="fa fa-arrow-down" aria-hidden="true" onclick='tank_control(1)'></i></button>
                        </div>
                    </div> <!-- div control left side -->
                    <!-- <div id="picker">
                                <div id="picker-circle"></div>
                        </div>  -->
                    <div class = "col-xs-6">
                        <div class = "line center-block" style = "width: 300.5px; height: 150px">
                            <div class = "y-axis">
                                <div id = "circle-center" class = "center-block"></div>
                                <div id = "line-center" class = "center-block" style = "margin-left:130px"></div>
                                <div id = "line-center" class = "center-block" style = "margin-left:-136px"></div>
                                <!-- <div class="line_0" id = "line_0"></div> -->
                            </div>
                            <div class = "x-axis" id = "x-axis" style = "transform: rotate(0deg);">
                            <!-- nửa đường tròn -->
                                <div id="half-circle" class = "center-block">
                                    <div class="line-75-left" id ="line-75-left">
                                        <p class = "no-75-left">
                                            <strong>75</strong>
                                        </p>
                                    </div>
                                    <div class="line-60-left">
                                        <p class = "no-60-left">
                                            <strong>60</strong>
                                        </p>
                                    </div>
                                    <div class="line-45-left">
                                        <p class = "no-45-left">
                                            <strong>45</strong>
                                        </p>
                                    </div>
                                    <div class="line-30-left">
                                        <p class = "no-30-left">
                                            <strong>30</strong>
                                        </p>
                                    </div>
                                    <div class="line-15-left">
                                        <p class = "no-15-left">
                                            <strong>15</strong>
                                        </p>
                                    </div>
                                    <div class="line-0">
                                        <p class = "no-0">
                                            <strong>0</strong>
                                        </p>
                                    </div>
                                    <div class="line-15-right">
                                        <p class = "no-15-right">
                                            <strong>15</strong>
                                        </p>
                                    </div>
                                    <div class="line-30-right">
                                        <p class = "no-30-right">
                                            <strong>30</strong>
                                        </p>
                                    </div>
                                    <div class="line-45-right">
                                        <p class = "no-45-right">
                                            <strong>45</strong>
                                        </p>
                                    </div>
                                    <div class="line-60-right">
                                        <p class = "no-60-right">
                                            <strong>60</strong>
                                        </p>
                                    </div>
                                    <div class="line-75-right">
                                        <p class = "no-75-right">
                                            <strong>75</strong>
                                        </p>
                                    </div>
                                </div>	
                                <!-- các đường thằng ngang -->
                                <div class = "x-axis-line" id = "x-axis-line">
                                    <div class="line_05" id = "line_65_top" style = "margin-top: -130px !important; visibility: hidden"></div>
                                    <div class="line_01" id = "line_60_top" style = "margin-top: -120px !important; visibility: hidden">
                                        <p>
                                            <strong>60</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_55_top" style = "margin-top: -110px !important; visibility: hidden"></div>

                                    <div class="line_01" id = "line_50_top" style = "margin-top: -100px !important; visibility: hidden">
                                        <p>
                                            <strong>50</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_45_top" style = "margin-top: -90px !important; visibility: hidden"></div>

                                    <div class="line_01" id = "line_40_top" style = "margin-top: -80px !important; visibility: hidden">
                                        <p>
                                            <strong>40</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_35_top" style = "margin-top: -70px !important; visibility: hidden"></div>

                                    <div class="line_01" id = "line_30_top" style = "margin-top: -60px !important; visibility: hidden">
                                        <p>
                                            <strong>30</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_25_top" style = "margin-top: -50px !important; visibility: hidden"></div>

                                    <div class="line_01" id = "line_20_top" style = "margin-top: -40px !important; visibility: hidden">
                                        <p>
                                            <strong>20</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_15_top" style = "margin-top: -30px !important"></div>

                                    <div class="line_01" id = "line_10_top" style = "margin-top: -20px !important">
                                        <p>
                                            <strong>10</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_5_top" style = "margin-top: -10px !important"></div>

                                    <!-- <div class="line_x" id = "line_x"></div> -->
                                    <div class="line_01" id = "line_01" style = "margin-top: 0px !important">
                                        <p style = "margin-left: -4px;">
                                            <strong>0</strong>
                                        </p>
                                    </div>
                                    
                                    <div class="line_05" id = "line_5_bot" style = "margin-top: 10px !important"></div>

                                    <div class="line_01" id = "line_10_bot" style = "margin-top: 20px !important">
                                        <p style = "margin-left: -10px;">
                                            <strong>-10</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_15_bot" style = "margin-top: 30px !important"></div>

                                    <div class="line_01" id = "line_20_bot" style = "margin-top: 40px !important; visibility: hidden">
                                        <p style = "margin-left: -10px;">
                                            <strong>-20</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_25_bot" style = "margin-top: 50px !important; visibility: hidden"></div>

                                    <div class="line_01" id = "line_30_bot" style = "margin-top: 60px !important; visibility: hidden">
                                        <p style = "margin-left: -10px;">
                                            <strong>-30</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_35_bot" style = "margin-top: 70px !important; visibility: hidden"></div>

                                    <div class="line_01" id = "line_40_bot" style = "margin-top: 80px !important; visibility: hidden">
                                        <p style = "margin-left: -10px;">
                                            <strong>-40</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_45_bot" style = "margin-top: 90px !important; visibility: hidden"></div>

                                    <div class="line_01" id = "line_50_bot" style = "margin-top: 100px !important; visibility: hidden">
                                        <p style = "margin-left: -10px;">
                                            <strong>-50</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_55_bot" style = "margin-top: 110px !important; visibility: hidden"></div>

                                    <div class="line_01" id = "line_60_bot" style = "margin-top: 120px !important; visibility: hidden">
                                        <p style = "margin-left: -10px;">
                                            <strong>-60</strong>
                                        </p>
                                    </div>
                                    <div class="line_05" id = "line_65_bot" style = "margin-top: 130px !important; visibility: hidden"></div>


                                </div>
                            </div>
                        </div>
                        
                        <div class = "line_axis_z">
                            <div class = "circle" id = "circleZ"></div>
                            <div class = "line_axis_z_0">
                                <div class = "no_z_0">0</div>
                            </div>
                            <div class = "line_axis_z_45_left">
                                <div class = "no_z_0" id = "z_45" style = "margin-left: -15px">45</div>
                            </div>
                            <div class = "line_axis_z_90_left">
                                <div class = "no_z_0" id = "z_90" style = "margin-left: -15px">90</div>
                            </div>
                            <div class = "line_axis_z_135_left">
                                <div class = "no_z_0" id = "z_135" style = "margin-left: -18px">135</div>
                            </div>
                            <div class = "line_axis_z_180_left">
                                <div class = "no_z_0" id = "z_180" style = "margin-left: -18px">180</div>
                            </div>

                            <div class = "line_axis_z_45_right">
                                <div class = "no_z_0" id = "z_45" style = "margin-left: -15px">45</div>
                            </div>
                            <div class = "line_axis_z_90_right">
                                <div class = "no_z_0" id = "z_90" style = "margin-left: -15px">90</div>
                            </div>
                            <div class = "line_axis_z_135_right">
                                <div class = "no_z_0" id = "z_135" style = "margin-left: -18px">135</div>
                            </div>
                            <div class = "line_axis_z_180_right">
                                <div class = "no_z_0" id = "z_180" style = "margin-left: -18px">180</div>
                            </div>
                        </div>
                        <div id="chartContainer" style="height: 250px; width: 100%;"></div>
                            <div style="margin-top: 16px; color: dimgrey; font-size: 9px; font-family: Verdana, Arial, Helvetica, sans-serif; text-decoration: none;">
                               <!-- <a href="https://canvasjs.com/html5-javascript-spline-chart/" target="_blank" title="JavaScript Spline Charts &amp; Graphs "></a> -->
                            </div>
                        <!-- <input type="range" min="-180" max="180" value="0" step="1" list="tickmarks" id="range_left" oninput="output.value = range_right.value"> -->
                    </div>

                    <div class="col-xs-3 grid-control-up text-right" id = "control-right" style = "margin-right: 10px">
                        <div class="Up">
                            <button class="btn2" name = "go_up" style = "margin-bottom: 10px"><i class="fa fa-arrow-up" aria-hidden="true" onclick='tank_control(6)'></i></button>
                        </div>
                        <div class="Up-Left">
                            <button class="btn2" name = "turn_left" ><i class="fa fa-arrow-left" aria-hidden="true" onclick='tank_control(8)'></i></button>
                        </div>
                        <div class="Stop">
                            <button class="btn2" name = "stop" style = " font-size: 45px; margin: 0 10px 0 10px; "><i class="fa fa-bullseye" aria-hidden="true" onclick='tank_control(0)'></i></button> <!--style = "color: #ff000080; font-size: 45px; margin: 0 10px 0 10px; " -->
                        </div>
                        <div class="Up-Right">
                            <button class="btn2" name = "turn_right" ><i class="fa fa-arrow-right" aria-hidden="true" onclick='tank_control(7)'></i></button>
                        </div>
                        <div class="Down">
                            <button class="btn2" name = "go_down" style = "margin: 10px 0 20px 0;"><i class="fa fa-arrow-down" aria-hidden="true" onclick='tank_control(1)'></i></button>
                        </div>
                    </div> <!-- div control rigth side -->
                </div> <!-- div mid -->
             <!-------------------------------------------------------BOT--------------------------------------------------------------->
                <div class = "col-xs-12 height-col-bot" style = "display: flex; position: relative;"> <!--height-col-bot-->
                    <div class="col-xs-4 grid-control-ccw" id = "control-bot-left" style = "align-self: flex-end;">
                        <div class="CCW">
                            <button class="btn2" name = "around_left" style = "margin: 0 0 15px 40px"><i class="fa fa-undo" aria-hidden="true" onclick='tank_control(9)'></i></button>
                        </div>
                        <div class="CW">
                            <button class="btn2" name = "around_right" style = "margin: 0 0 15px 40px"><i class="fa fa-repeat" aria-hidden="true" onclick='tank_control(4)'></i></button>
                        </div>
                    </div> <!-- div control rotate -->

                 <!--------------------------------------2 camera one by one-------------------------------------------------->
                    <div class="col-xs-6 nopadding" style = "align-self: flex-end;" id = "bot-1-by-1">
                            <div class = "zoom" id = "2-line-camera_id1">
                                <div class = "col-xs-12 camera_id1" id = "2-line-camera_id1_error"></div>
                            </div>
                            <div class = "zoom" id = "2-line-camera_id3">
                                <div class = "col-xs-12 camera_id3" id = "2-line-camera_id3_error"></div>
                            </div>
                    </div> <!-- div camera -->

                 <!---------------------------------------2 camera together in one line---------------------------------------->
                    <div class="col-xs-3 nopadding zoom" style = "align-self: flex-end;" id = "bot-1-line-camera1">
                        <!-- <div class = "col-xs-12 camera_id1" id = "1-line-camera_id1" onclick ='buttonclick1()'> -->
                        <div class = "col-xs-12">
                            <div class = "camera_id1" id = "1-line-camera_id1" onclick ='buttonclick1()'></div>
                        </div>
                    </div> <!-- div camera id 1 -->

                    <div class="col-xs-3 nopadding zoom" style = "align-self: flex-end;" id = "bot-1-line-camera3">
                        <!-- <div class = "col-xs-12 camera_id3" id = "1-line-camera_id3" onclick ='buttonclick2()'></div> -->
                        <div class = "col-xs-12">
                            <div class = "camera_id3" id = "1-line-camera_id3" onclick ='buttonclick2()'></div>
                        </div>
                    </div> <!-- div camera id 3 -->

                    <div class="col-xs-4 grid-control-crew text-right" style = "align-self: flex-end;">
                        <div class="Crew-up">
                            <button class="btn2" name = "crew-up" style = "margin: 0 40px 15px 0"><i class="fa fa-arrow-up" aria-hidden="true" onclick='tank_control(11)'></i></button>
                        </div>
                        <div class="Crew-down">
                            <button class="btn2" name = "crew-down" style = "margin: 0 40px 15px 0"><i class="fa fa-arrow-down" aria-hidden="true" onclick='tank_control(12)'></i></button>
                        </div>
                    </div> <!-- div control crew -->

                </div> <!-- div bot -->
             <!----------------------------------------------------END BOT-------------------------------------------------------------->

            </div> <!-- div row camera_id2-->
        </div> <!-- div container -->
        <script type="text/javascript" src="js/directive.js?v=1"></script>
        <script type="text/javascript" src="js/components/home/setting.js"></script>
        <!-- <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
    </body>
    <script type="text/javascript">
        var check_admin = 0; // khai báo biến chạy 1 lần lúc mới mở web xem nó ở chế độ nào
        var check_get_admin = 0; // biến check xem có ai xin quyền admin ko
        var permission_value = ""; // biến cho biết tài khoản đang ở chế độ nào 
        var dps = [];
        var counter = 0;
        var counter1 = 0;
        var degree = [];
        var camera1 = "url(http://10.8.0.6:8081/) no-repeat"
        var camera2 = "url(http://10.8.0.6:8082/) no-repeat"
        var camera3 = "url(http://10.8.0.6:8083/) no-repeat"
        // hàm chạy mỗi 500ms
        var updateInterval = 500;
        setInterval(function () { updatetime() }, updateInterval); 
        //  function run chart 
        function updatetime() {
            var battery = document.getElementById("batteryLevel").innerHTML;
            // biến time để gửi thời gian cho database phục vụ cho việc check thời gian hoạt động
            var date = Date.now();
            var date_second = parseInt(date)
            $.ajax({
                type:"get",//or POST
                url:'{!!URL::to('controller/updatetime')!!}',
                                //  (or whatever your url is)
                data:{data:date_second},
                //can send multipledata like {data1:var1,data2:var2,data3:var3
                //can use dataType:'text/html' or 'json' if response type expected 
                success:function(start){ // dữ liệu trả về sau khi gửi tín hiệu tới database
                    if(check_admin == 0 && start.home_user.permission_level == 1){
                        document.getElementById("control-left").style.visibility = "visible";
                        document.getElementById("control-right").style.visibility = "visible";
                        document.getElementById("control-bot-left").style.visibility = "visible";
                        document.getElementById("control-bot-left").style.visibility = "visible";

                        document.getElementById("private-tick-permissions").style.visibility = "visible";
                        document.getElementById("public-tick-permissions").style.visibility = "hidden";

                        console.log("admin");
                        permission_value = "admin";
                        check_admin = 1;
                        
                    }
                    // quyên user 
                    if(check_admin == 0 && start.home_user.permission_level != 1){
                        document.getElementById("control-left").style.visibility = "hidden";
                        document.getElementById("control-right").style.visibility = "hidden";
                        document.getElementById("control-bot-left").style.visibility = "hidden";

                        document.getElementById("private-tick-permissions").style.visibility = "hidden";
                        document.getElementById("public-tick-permissions").style.visibility = "visible";

                        console.log("users");
                        permission_value = "user";
                        check_admin = 1;
                    }
                    // Nếu như các tài khoản đăng nhập chưa có ai có quyền admin thì trang web sẽ được reload
                    // khi reload phần control home sẽ đảm nhận vai trò phân quyền chọn admin
                    if(start.admin == 0){
                        // location.reload();
                    }

                    if(start.send_user == 1){
                        if(permission_value == "admin" && check_get_admin == 0){
                            console.log("có người muốn xin admin kìa");
                            document.getElementById('modal_id02').style.display="block";
                            document.getElementById('name_user').innerHTML = start.name_user.name + " want to be an administrator. <br/> Do You want?";
                            console.log(start.name_user);
                            // document.getElementById('modal_id02').style.width ="auto";
                            check_get_admin = 1;
                        }
                    }

                    if(start.user.state == 1 && start.user.state_sp == 1){
                        //  location.reload();
                        $.ajax({
                            type:"get",
                            url:'{!!URL::to('controller/updatestate')!!}',
                            data:{data:"OK"},
                            success:function(user){
                                // console.log(user);
                            }
                            
                        })
                    }

                    // nếu như admin đồng ý cho user quyền admin thì làm
                    if(start.request_permission.requests_permission == 1){
                        console.log("11");
                        $.ajax({
                            type:"get",
                            url:'{!!URL::to('controller/request_permission')!!}',
                            data:{data:"OK"},
                            success:function(user){
                                console.log(user);
                                //location.reload();  
                            }
                        })
                    }

                    if(start.updatetime.error_can != "OK"){
                        $(".error-notification").show();
                        document.getElementById("error-notification").innerHTML = String(start.updatetime.error_can);
                    }
                    else{
                        $(".error-notification").show();
                        document.getElementById("error-notification").innerHTML = String(start.updatetime.ultrasonic) + " cm";
                        $(".degree-notification").show();
                        document.getElementById("degree-notification").innerHTML = String(start.location1.Z) + " deg" ;
                    }
                    
                    if(start.updatetime.battery <= 25){
                        document.getElementById("batteryLevel").style.backgroundColor = "red";
                        $('#camera_id2').addClass('erro-battery');
                        $('#1-line-camera_id1').addClass('erro-battery');
                        $('#1-line-camera_id3').addClass('erro-battery');
                        $('#2-line-camera_id1_error').addClass('erro-battery');
                        $('#2-line-camera_id3_error').addClass('erro-battery');
                        
                    }
                    else if(start.updatetime.battery > 25 && start.updatetime.battery <= 65){
                        document.getElementById("batteryLevel").style.backgroundColor = "yellow";
                        $('#camera_id2').removeClass('erro-battery');
                        $('#1-line-camera_id1').removeClass('erro-battery');
                        $('#1-line-camera_id3').removeClass('erro-battery');
                        $('#2-line-camera_id1_error').removeClass('erro-battery');
                        $('#2-line-camera_id3_error').removeClass('erro-battery');
                    }
                    else{
                        document.getElementById("batteryLevel").style.backgroundColor = "#73AD21";
                        $('#camera_id2').removeClass('erro-battery');
                        $('#1-line-camera_id1').removeClass('erro-battery');
                        $('#1-line-camera_id3').removeClass('erro-battery');
                        $('#2-line-camera_id1_error').removeClass('erro-battery');
                        $('#2-line-camera_id3_error').removeClass('erro-battery');
                    }
                    document.getElementById("batteryLevel").innerHTML = start.updatetime.battery + "%";
                    document.getElementById("batteryLevel").style.width = (((start.updatetime.battery)*41)/100)+ "px";
                    document.getElementById("batteryLevel").style.height = "14px";
                    
                    
                },
                error:function(){
                    // location.reload();
                }
            })
        };
        var chart = new CanvasJS.Chart("chartContainer", {
                            axisX:{
                                lineThickness: 3,
                                lineColor: "orange",
                                labelFontColor: "red",
                                labelFontSize: 15,
                                labelFontWeight: "bold"
                            },
                            axisY:{
                                lineThickness: 3,
                                lineColor: "orange",
                                labelFontColor: "red",
                                labelFontSize: 15,
                                labelFontWeight: "bold",
                                minimum:-50,
                                maximum: 50,
                            },
                            animationEnabled: true,
                            backgroundColor: "transparent",  
                            data: [{
                                markerType: "triangle",
                                markerSize: 3,
                                markerColor: "yellow",
                                type: "spline",
                                lineColor: "red",
                                dataPoints: dps
                            }]
                        });
        chart.render();
        function running() {
            $.ajax({
                        type:"get",
                        url:'{!!URL::to('controller/update_dataxyz')!!}',
                        data:{data:"OK"},
                        success:function(user){
                            if(user.length > 100){
                            //console.log(user);
                            for (var i = 0; i < user.length; i++){
                                if (user[i]['Level'] != 0)
                                {
                                    dps[i] = {
                                        x: parseInt(user[i]['ID']),
                                        y: parseFloat((-(user[i]['X'])))
                                    };
                                }
                                
                            }
                            //console.log(dps);
                            chart.render();
                            }
                        }         
            });  
        } 
        function buttonclick1(){
            var element = document.getElementById("camera_id2");
            var element1 = document.getElementById("1-line-camera_id1");
            counter++;
            console.log(counter);
            if (counter%2 != 0 ){
                element.style.background = camera3;
                element.style.backgroundSize = "100% 100%";
                element1.style.background = camera2;
                element1.style.backgroundSize = "100% 100%";
            }
            else{
                element.style.background = camera2;
                element.style.backgroundSize = "100% 100%";
                element1.style.background = camera3;
                element1.style.backgroundSize = "100% 100%";
            }
        }
        function buttonclick2(){
            var element = document.getElementById("camera_id2");
            var element1 = document.getElementById("1-line-camera_id3");
            counter1++;
            console.log(counter1);
            if (counter1%2 != 0 ){
                element.style.background = camera1;
                element.style.backgroundSize = "100% 100%";
                element1.style.background = camera2;
                element1.style.backgroundSize = "100% 100%";
            }
            else{
                element.style.background = camera2;
                element.style.backgroundSize = "100% 100%";
                element1.style.background = camera1;
                element1.style.backgroundSize = "100% 100%";
            }
        }
        
        window.onbeforeunload = function(){
            console.log('closing shared worker port...');
        };
        
// button state
        let home = document.querySelector('.container');
    
        home.addEventListener('click', (e) => {
            if(e.path[0].classList[0] == "fa"){
                document.getElementById("span").className = String(e.path[0].classList);
                if(e.path[0].classList[1] != "fa-bullseye"){
                    document.getElementById("span").style.color = "#00c500";
                }
                else{
                    document.getElementById("span").style.color = "red";
                }
            }
        });

// control 
        let count = 0;
        
        function tank_control(level){
            if(level == 6){
                count += 1;
                if(count == 1){
                    level = 6;
                }
            }
            else{
                count = 0;
            }
            //make an ajax call and get status value using the same 'id'
            $.ajax({

                type:"get",//or POST
                url:'{!!URL::to('controller/tank')!!}',
                                //  (or whatever your url is)
                data:{data:level},
                success:function(level){
                    console.log(level);
                    var winHeight = window.innerHeight;
                    var winWidth = window.innerWidth;
                    
                    if (winHeight >= 720){
                        winHeight = 720;
                    }

                    if(level.level == 1){
                        $( "#camera_id2" ).removeClass('camera_id2').addClass('camera_id3');
                        document.getElementById("camera_id2").style.height = winHeight + "px";
                        
                    }
                    else{
                        $( "#camera_id2" ).removeClass('camera_id3').addClass('camera_id2');
                        document.getElementById("camera_id2").style.height = winHeight + "px";
                    }
                }
            })
        }
// show setting
        // Get the modal
        var modal = document.getElementById('id01');
        var modal_admin = document.getElementById('modal_id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modal_admin) {
                modal_admin.style.display = "none";
            }
        }

        $('#permissions a').click(function (e)
        {
            e.stopPropagation();
            if (/public/.test(this.id))
            {
                document.getElementById("private-tick-permissions").style.visibility = "hidden";
                document.getElementById("public-tick-permissions").style.visibility = "visible";
            } else
            {
                document.getElementById("private-tick-permissions").style.visibility = "visible";
                document.getElementById("public-tick-permissions").style.visibility = "hidden";
            }
            var permissions = this.getAttribute("data-description");
            $.ajax({
                type: "get",
                url: '{!!URL::to('controller/updatelogin')!!}',
                data:{data:permissions},
                success: function (user) {
                    console.log(user);
                }
            });
        });
        
        function permission(duy){
            $.ajax({
                type: "get",
                url: '{!!URL::to('controller/requests_permisstion')!!}',
                data:{data:duy},
                success: function (user) {
                    console.log(user);
                    if(user == "Ok"){
                        permission_value = "user";

                        modal_admin.style.display = "none";

                        document.getElementById("control-left").style.visibility = "hidden";
                        document.getElementById("control-right").style.visibility = "hidden";
                        document.getElementById("control-bot-left").style.visibility = "hidden";

                        document.getElementById("private-tick-permissions").style.visibility = "hidden";
                        document.getElementById("public-tick-permissions").style.visibility = "visible";
                    }
                    if(user == "No"){
                        permission_value = "admin";
                        check_get_admin = 0;

                        modal_admin.style.display = "none";
                    }
                }
            });
        }

        var picker = document.getElementById('picker'), 
            circle = document.getElementById('circle-center')

        transform = (function(){
            var prefs = ['t', 'WebkitT', 'MozT', 'msT', 'OT'],
                style = document.documentElement.style,
                p
            for(var i = 0, len = prefs.length; i < len; i++){
                if( (p = prefs[i] + 'ransform') in  style ) return p
            }
            
            alert('your browser doesnt support css transforms!')
        })
            
            rotate = function(){
                $.ajax({
                    type:"get",
                    url:'{!!URL::to('controller/update_gy25')!!}',
                    data:{data:"OK"},
                    success:function(user){
                        //console.log(user[0]['Z']);
                        document.getElementById("circleZ").style.marginTop = ((user[0]['Z'])*(125/180) + 120) + 'px'; 
                        for (var i = 0; i < 2; i ++){
                            if( i == 0){
                                document.getElementById("x-axis-line").style.top = (user[0]['Y'])*(-2) + 'px';
                                // âm
                                if(parseFloat(user[0]['Y']) < (-5) && parseFloat(user[0]['Y']) >= (-10)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_25_top").style.visibility = "hidden";
                                    document.getElementById("line_20_top").style.visibility = "visible";
                                    document.getElementById("line_15_top").style.visibility = "visible";
                                    document.getElementById("line_10_top").style.visibility = "visible";
                                    document.getElementById("line_5_top").style.visibility = "visible";

                                    document.getElementById("line_01").style.visibility = "visible";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "hidden";
                                    document.getElementById("line_15_bot").style.visibility = "hidden";
                                    document.getElementById("line_10_bot").style.visibility = "visible";
                                    document.getElementById("line_5_bot").style.visibility = "visible";
                                }

                                else if(parseFloat(user[0]['Y']) < (-10) && parseFloat(user[0]['Y']) >= (-15)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_25_top").style.visibility = "visible";
                                    document.getElementById("line_20_top").style.visibility = "visible";
                                    document.getElementById("line_15_top").style.visibility = "visible";
                                    document.getElementById("line_10_top").style.visibility = "visible";
                                    document.getElementById("line_5_top").style.visibility = "visible";

                                    document.getElementById("line_01").style.visibility = "visible";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "hidden";
                                    document.getElementById("line_15_bot").style.visibility = "hidden";
                                    document.getElementById("line_10_bot").style.visibility = "hidden";
                                    document.getElementById("line_5_bot").style.visibility = "visible";
                                }

                                else if(parseFloat(user[0]['Y']) < (-15) && parseFloat(user[0]['Y']) >= (-20)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "visible";
                                    document.getElementById("line_25_top").style.visibility = "visible";
                                    document.getElementById("line_20_top").style.visibility = "visible";
                                    document.getElementById("line_15_top").style.visibility = "visible";
                                    document.getElementById("line_10_top").style.visibility = "visible";
                                    document.getElementById("line_5_top").style.visibility = "visible";

                                    document.getElementById("line_01").style.visibility = "visible";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "hidden";
                                    document.getElementById("line_15_bot").style.visibility = "hidden";
                                    document.getElementById("line_10_bot").style.visibility = "hidden";
                                    document.getElementById("line_5_bot").style.visibility = "hidden";
                                }

                                else if(parseFloat(user[0]['Y']) < (-20) && parseFloat(user[0]['Y']) >= (-25)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "visible";
                                    document.getElementById("line_30_top").style.visibility = "visible";
                                    document.getElementById("line_25_top").style.visibility = "visible";
                                    document.getElementById("line_20_top").style.visibility = "visible";
                                    document.getElementById("line_15_top").style.visibility = "visible";
                                    document.getElementById("line_10_top").style.visibility = "visible";
                                    document.getElementById("line_5_top").style.visibility = "visible";

                                    document.getElementById("line_01").style.visibility = "hidden";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "hidden";
                                    document.getElementById("line_15_bot").style.visibility = "hidden";
                                    document.getElementById("line_10_bot").style.visibility = "hidden";
                                    document.getElementById("line_5_bot").style.visibility = "hidden";
                                }

                                else if(parseFloat(user[0]['Y']) < (-25) && parseFloat(user[0]['Y']) >= (-30)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "visible";
                                    document.getElementById("line_35_top").style.visibility = "visible";
                                    document.getElementById("line_30_top").style.visibility = "visible";
                                    document.getElementById("line_25_top").style.visibility = "visible";
                                    document.getElementById("line_20_top").style.visibility = "visible";
                                    document.getElementById("line_15_top").style.visibility = "visible";
                                    document.getElementById("line_10_top").style.visibility = "visible";
                                    document.getElementById("line_5_top").style.visibility = "hidden";

                                    document.getElementById("line_01").style.visibility = "hidden";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "hidden";
                                    document.getElementById("line_15_bot").style.visibility = "hidden";
                                    document.getElementById("line_10_bot").style.visibility = "hidden";
                                    document.getElementById("line_5_bot").style.visibility = "hidden";
                                }

                                else if(parseFloat(user[0]['Y']) < (-30) && parseFloat(user[0]['Y']) >= (-35)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "visible";
                                    document.getElementById("line_40_top").style.visibility = "visible";
                                    document.getElementById("line_35_top").style.visibility = "visible";
                                    document.getElementById("line_30_top").style.visibility = "visible";
                                    document.getElementById("line_25_top").style.visibility = "visible";
                                    document.getElementById("line_20_top").style.visibility = "visible";
                                    document.getElementById("line_15_top").style.visibility = "visible";
                                    document.getElementById("line_10_top").style.visibility = "hidden";
                                    document.getElementById("line_5_top").style.visibility = "hidden";

                                    document.getElementById("line_01").style.visibility = "hidden";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "hidden";
                                    document.getElementById("line_15_bot").style.visibility = "hidden";
                                    document.getElementById("line_10_bot").style.visibility = "hidden";
                                    document.getElementById("line_5_bot").style.visibility = "hidden";
                                }

                                else if(parseFloat(user[0]['Y']) < (-35) && parseFloat(user[0]['Y']) >= (-40)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "visible";
                                    document.getElementById("line_45_top").style.visibility = "visible";
                                    document.getElementById("line_40_top").style.visibility = "visible";
                                    document.getElementById("line_35_top").style.visibility = "visible";
                                    document.getElementById("line_30_top").style.visibility = "visible";
                                    document.getElementById("line_25_top").style.visibility = "visible";
                                    document.getElementById("line_20_top").style.visibility = "visible";
                                    document.getElementById("line_15_top").style.visibility = "hidden";
                                    document.getElementById("line_10_top").style.visibility = "hidden";
                                    document.getElementById("line_5_top").style.visibility = "hidden";

                                    document.getElementById("line_01").style.visibility = "hidden";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "hidden";
                                    document.getElementById("line_15_bot").style.visibility = "hidden";
                                    document.getElementById("line_10_bot").style.visibility = "hidden";
                                    document.getElementById("line_5_bot").style.visibility = "hidden";
                                }

                                else if(parseFloat(user[0]['Y']) < (-40) && parseFloat(user[0]['Y']) >= (-45)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "visible";
                                    document.getElementById("line_50_top").style.visibility = "visible";
                                    document.getElementById("line_45_top").style.visibility = "visible";
                                    document.getElementById("line_40_top").style.visibility = "visible";
                                    document.getElementById("line_35_top").style.visibility = "visible";
                                    document.getElementById("line_30_top").style.visibility = "visible";
                                    document.getElementById("line_25_top").style.visibility = "visible";
                                    document.getElementById("line_20_top").style.visibility = "hidden";
                                    document.getElementById("line_15_top").style.visibility = "hidden";
                                    document.getElementById("line_10_top").style.visibility = "hidden";
                                    document.getElementById("line_5_top").style.visibility = "hidden";

                                    document.getElementById("line_01").style.visibility = "hidden";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "hidden";
                                    document.getElementById("line_15_bot").style.visibility = "hidden";
                                    document.getElementById("line_10_bot").style.visibility = "hidden";
                                    document.getElementById("line_5_bot").style.visibility = "hidden";
                                }
                                //////////////////////////////////////////////////////////////////////////////////

                                else if(parseFloat(user[0]['Y']) > (5) && parseFloat(user[0]['Y']) <= (10)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_25_top").style.visibility = "hidden";
                                    document.getElementById("line_20_top").style.visibility = "hidden";
                                    document.getElementById("line_15_top").style.visibility = "visible";
                                    document.getElementById("line_10_top").style.visibility = "visible";
                                    document.getElementById("line_5_top").style.visibility = "visible";

                                    document.getElementById("line_01").style.visibility = "visible";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "hidden";
                                    document.getElementById("line_15_bot").style.visibility = "visible";
                                    document.getElementById("line_10_bot").style.visibility = "visible";
                                    document.getElementById("line_5_bot").style.visibility = "visible";
                                }

                                else if(parseFloat(user[0]['Y']) > (10) && parseFloat(user[0]['Y']) <= (15)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_25_top").style.visibility = "hidden";
                                    document.getElementById("line_20_top").style.visibility = "hidden";
                                    document.getElementById("line_15_top").style.visibility = "hidden";
                                    document.getElementById("line_10_top").style.visibility = "visible";
                                    document.getElementById("line_5_top").style.visibility = "visible";

                                    document.getElementById("line_01").style.visibility = "visible";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "visible";
                                    document.getElementById("line_15_bot").style.visibility = "visible";
                                    document.getElementById("line_10_bot").style.visibility = "visible";
                                    document.getElementById("line_5_bot").style.visibility = "visible";
                                }

                                else if(parseFloat(user[0]['Y']) > (15) && parseFloat(user[0]['Y']) <= (20)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_25_top").style.visibility = "hidden";
                                    document.getElementById("line_20_top").style.visibility = "hidden";
                                    document.getElementById("line_15_top").style.visibility = "hidden";
                                    document.getElementById("line_10_top").style.visibility = "hidden";
                                    document.getElementById("line_5_top").style.visibility = "visible";

                                    document.getElementById("line_01").style.visibility = "visible";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_25_bot").style.visibility = "visible";
                                    document.getElementById("line_20_bot").style.visibility = "visible";
                                    document.getElementById("line_15_bot").style.visibility = "visible";
                                    document.getElementById("line_10_bot").style.visibility = "visible";
                                    document.getElementById("line_5_bot").style.visibility = "visible";
                                }

                                else if(parseFloat(user[0]['Y']) > (20) && parseFloat(user[0]['Y']) <= (25)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_25_top").style.visibility = "hidden";
                                    document.getElementById("line_20_top").style.visibility = "hidden";
                                    document.getElementById("line_15_top").style.visibility = "hidden";
                                    document.getElementById("line_10_top").style.visibility = "hidden";
                                    document.getElementById("line_5_top").style.visibility = "hidden";

                                    document.getElementById("line_01").style.visibility = "visible";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_30_bot").style.visibility = "visible";
                                    document.getElementById("line_25_bot").style.visibility = "visible";
                                    document.getElementById("line_20_bot").style.visibility = "visible";
                                    document.getElementById("line_15_bot").style.visibility = "visible";
                                    document.getElementById("line_10_bot").style.visibility = "visible";
                                    document.getElementById("line_5_bot").style.visibility = "visible";
                                }

                                else if(parseFloat(user[0]['Y']) > (25) && parseFloat(user[0]['Y']) <= (30)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_25_top").style.visibility = "hidden";
                                    document.getElementById("line_20_top").style.visibility = "hidden";
                                    document.getElementById("line_15_top").style.visibility = "hidden";
                                    document.getElementById("line_10_top").style.visibility = "hidden";
                                    document.getElementById("line_5_top").style.visibility = "hidden";

                                    document.getElementById("line_01").style.visibility = "hidden";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "visible";
                                    document.getElementById("line_30_bot").style.visibility = "visible";
                                    document.getElementById("line_25_bot").style.visibility = "visible";
                                    document.getElementById("line_20_bot").style.visibility = "visible";
                                    document.getElementById("line_15_bot").style.visibility = "visible";
                                    document.getElementById("line_10_bot").style.visibility = "visible";
                                    document.getElementById("line_5_bot").style.visibility = "visible";
                                }

                                else if(parseFloat(user[0]['Y']) > (30) && parseFloat(user[0]['Y']) <= (35)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_25_top").style.visibility = "hidden";
                                    document.getElementById("line_20_top").style.visibility = "hidden";
                                    document.getElementById("line_15_top").style.visibility = "hidden";
                                    document.getElementById("line_10_top").style.visibility = "hidden";
                                    document.getElementById("line_5_top").style.visibility = "hidden";

                                    document.getElementById("line_01").style.visibility = "hidden";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "visible";
                                    document.getElementById("line_35_bot").style.visibility = "visible";
                                    document.getElementById("line_30_bot").style.visibility = "visible";
                                    document.getElementById("line_25_bot").style.visibility = "visible";
                                    document.getElementById("line_20_bot").style.visibility = "visible";
                                    document.getElementById("line_15_bot").style.visibility = "visible";
                                    document.getElementById("line_10_bot").style.visibility = "visible";
                                    document.getElementById("line_5_bot").style.visibility = "hidden";
                                }

                                else if(parseFloat(user[0]['Y']) > (35) && parseFloat(user[0]['Y']) <= (40)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_25_top").style.visibility = "hidden";
                                    document.getElementById("line_20_top").style.visibility = "hidden";
                                    document.getElementById("line_15_top").style.visibility = "hidden";
                                    document.getElementById("line_10_top").style.visibility = "hidden";
                                    document.getElementById("line_5_top").style.visibility = "hidden";

                                    document.getElementById("line_01").style.visibility = "hidden";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "visible";
                                    document.getElementById("line_40_bot").style.visibility = "visible";
                                    document.getElementById("line_35_bot").style.visibility = "visible";
                                    document.getElementById("line_30_bot").style.visibility = "visible";
                                    document.getElementById("line_25_bot").style.visibility = "visible";
                                    document.getElementById("line_20_bot").style.visibility = "visible";
                                    document.getElementById("line_15_bot").style.visibility = "visible";
                                    document.getElementById("line_10_bot").style.visibility = "hidden";
                                    document.getElementById("line_5_bot").style.visibility = "hidden";
                                }

                                else if(parseFloat(user[0]['Y']) > (40) && parseFloat(user[0]['Y']) <= (45)){
                                    document.getElementById("line_65_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_25_top").style.visibility = "hidden";
                                    document.getElementById("line_20_top").style.visibility = "hidden";
                                    document.getElementById("line_15_top").style.visibility = "hidden";
                                    document.getElementById("line_10_top").style.visibility = "hidden";
                                    document.getElementById("line_5_top").style.visibility = "hidden";

                                    document.getElementById("line_01").style.visibility = "hidden";
                                    
                                    document.getElementById("line_65_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "visible";
                                    document.getElementById("line_45_bot").style.visibility = "visible";
                                    document.getElementById("line_40_bot").style.visibility = "visible";
                                    document.getElementById("line_35_bot").style.visibility = "visible";
                                    document.getElementById("line_30_bot").style.visibility = "visible";
                                    document.getElementById("line_25_bot").style.visibility = "visible";
                                    document.getElementById("line_20_bot").style.visibility = "visible";
                                    document.getElementById("line_15_bot").style.visibility = "hidden";
                                    document.getElementById("line_10_bot").style.visibility = "hidden";
                                    document.getElementById("line_5_bot").style.visibility = "hidden";
                                }

                                else{
                                    document.getElementById("line_01").style.visibility = "visible";

                                    document.getElementById("line_25_top").style.visibility = "hidden";
                                    document.getElementById("line_20_top").style.visibility = "hidden";
                                    document.getElementById("line_15_top").style.visibility = "visible";
                                    document.getElementById("line_10_top").style.visibility = "visible";
                                    document.getElementById("line_5_top").style.visibility = "visible";

                                    document.getElementById("line_25_bot").style.visibility = "hidden";
                                    document.getElementById("line_20_bot").style.visibility = "hidden";
                                    document.getElementById("line_15_bot").style.visibility = "visible";
                                    document.getElementById("line_10_bot").style.visibility = "visible";
                                    document.getElementById("line_5_bot").style.visibility = "visible";

                                    document.getElementById("line_30_top").style.visibility = "hidden";
                                    document.getElementById("line_35_top").style.visibility = "hidden";
                                    document.getElementById("line_40_top").style.visibility = "hidden";
                                    document.getElementById("line_45_top").style.visibility = "hidden";
                                    document.getElementById("line_50_top").style.visibility = "hidden";
                                    document.getElementById("line_55_top").style.visibility = "hidden";
                                    document.getElementById("line_60_top").style.visibility = "hidden";
                                    document.getElementById("line_65_top").style.visibility = "hidden";

                                    document.getElementById("line_30_bot").style.visibility = "hidden";
                                    document.getElementById("line_35_bot").style.visibility = "hidden";
                                    document.getElementById("line_40_bot").style.visibility = "hidden";
                                    document.getElementById("line_45_bot").style.visibility = "hidden";
                                    document.getElementById("line_50_bot").style.visibility = "hidden";
                                    document.getElementById("line_55_bot").style.visibility = "hidden";
                                    document.getElementById("line_60_bot").style.visibility = "hidden";
                                    document.getElementById("line_65_bot").style.visibility = "hidden";     
                                }
                            }

                            if(i == 1){
                                document.getElementById("x-axis").style.transform = 'rotate(' + (user[0]['X'])*(-1) + 'deg)';
                            }
                        }
                        
                    }
                    
                })
            }
        
        var updateInterval1 = 200; //200
        var updateInterval2 = 200; //200
        setInterval(function () { rotate() }, updateInterval1);
        setInterval(function () { running() }, updateInterval2);

    </script>
</html>