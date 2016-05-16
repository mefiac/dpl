<?php require 'views/header.php';  ?>
    <div class="well" style="background: linear-gradient(to top, #00134a, #0b8297);">
        <div class="alert alert-danger">
            Настройки элемента
            <input type="text" name="name" id="sname" placeholder="Введите имя">
        </div>
        <table border="4" class="table table-bordered">
            <tr>
                <th style="width: 30%">Текст</th>
                <th>Изображение</th>
                <th>Факты</th>
            </tr>
            <tr>
                <td><p><input type="text" placeholder="Введите текст" value="" onchange="addText( this.value)" id="tT">
                    </p>
                    <p>Форматирование <select onchange="fontst(this.value)">
                            <option value="normal">normal </option>
                            <option value="italic">italic </option>
                            <option value="oblique">oblique</option>
                            <option value="inherit">inherit</option>

                        </select>  </p></td>
                <td><p>Добавить изображение

                    <form method="post" enctype="multipart/form-data" target="upload_target">


                        <input name="uploadfile" id="upload" type="file" size="30" onchange="setimage()"/>


                        <iframe id="upload_target" name="upload_target" src="#"
                                style="width:0;height:0;border:0px solid #fff;"></iframe>

                    </form>
                    </p>
                </td>
                <td>
                    <p>Добавить фигуру
                        <select onchange="addel(this.value)">
                            <option value=1>Добавить блок <img src="url(../views/img/r.jpg"></option>
                            <option value=2>Добавить круг <img src="url(../views/img/e.jpg"></option>
                            <option value=3>Добавить Звезду <img src="url(../views/img/w.jpg"></option>
                            <option value=4>Добавить Треугольник <img src="url(../views/img/q.jpg"></option>
                        </select></p>
                    <p>
                        <button class="btn" onclick="copy()">Копировать</button>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Шрифт <select onchange="changeElem(this.value,'font-family')">
                            <option value="fantasy">fantasy</option>
                            <option value="cursive">cursive</option>
                            <option value="monospace">monospace</option>
                            <option value="sans-serif">sans-serif</option>
                            <option value="serif">serif</option>

                    </select>  </p>
                <p>цвет<input class="jscolor" onchange="changerextcl( this.value)" id="cl"
                               value="ab2567"></p>
                </td>
                <td><p>Ширина<input type="number" value="" onclick="changeheidt( this.value)" id="sh"></p>

                    <p>Высота <input type="number" min="1" max="500" value="" onclick="changewh( this.value)"   id="hi"></p>

                </td>
                <td>
                    <p>Фон холста<select onchange="sizeChangeWorksheet(this.value,'background-image')">
                            <option value="url(../views/img/1.jpg)">1</option>
                            <option value="url(../views/img/2.jpg)">2</option>
                            <option value="url(../views/img/3.jpg)">3</option>
                            <option value="url(../views/img/4.jpg)">4</option>
                            <option value="url(../views/img/5.jpg)">5</option>

                    </select>  </p>
                <p><input type="range" min="0" max="360" step="1" value="90" onchange="rotateelem(this.value)"> </p></td>


            </tr>
            <tr>
                <td><p>Размер шрифта <input type="number" value="10" onclick="shchange(this.value)"/></p></td>
                <td><p>Позиция изображения <select onchange="sizeChange(this.value,'background-size')">
                        <option value="cover">целиком</option>
                        <option value="contain">вписать</option>
                        <option value="auto">авто</option>
                    </select></p></td>
                <td><p>Слой <input type="number" min="1" max="500" value="" onclick="changeElem( this.value, 'z-index')"
                                 id="zi"> &nbsp; <button class="btn" onclick="trans()">Прозрачность</button></p>
                    <p> Color: <input class="jscolor" onchange="changebackground( this.value)" id="cl"
                                  value="ab2567"></p>
                </td>
            </tr>

        </table>

    </div>
    <div style="display: none">
        <div id="squad" class="elem" style="width: 50px;height: 50px; background: #DDE0E0;"></div>
        <div id="krug" class="elem" id="1"
             style="width: 50px;height: 50px; background: #DDE0E0; border-radius: 50%;"></div>
        <div id="star" class="elem star" id="2"></div>
        <div id="triangle" class="elem" id="3" style=" width: 0;
    height: 0;
    border-top: 140px solid #20a3bf;
    border-left: 70px solid transparent;
    border-right: 70px solid transparent;"></div>
    </div>
    <div id="saver">
        <div id="worksheet" style="width: <?= $this->w ?>px; height: <?= $this->h ?>px; background-color: #ffffff">

        </div>
    </div>
    <div class="btn-group btn-group-vertical">
        <?php if(!empty($_SESSION['id'])) { ?>
        <button class="btn" onclick="saveDiv()">Сохранить как шаблон</button>
         <?php } ?>

        <button class="btn" download="img.png" onClick="downimgimg(); return false;">Сохранить как картинку</button>

    </div>

    <script type="text/javascript">
        function shchange(val) {
            $(".activElem").css('font-size', val +'px')
        }
        function rotateelem(val){
            console.log('rotate('+val+'deg)');
            $(".activElem").css('transform','rotate('+val+'deg)');
        }
        function saveDiv() {
            $(".elem").removeClass('activElem');
            var texts = $('#saver').html();
            $.ajax({
                url: '/api/save',
                data: {
                    bodys: texts,
                    type:  <?= $this->type ?>,
                    sname: $('#sname').val()
                },

                type: 'POST',
                success: function (data) {
                    var obj = $.parseJSON(data);

                    $(".activElem").html(data);

                }
            });
            downimg();
        }

        function sizeChangeWorksheet(val2, val) {
            $('#worksheet').css(val, val2);
        }
        function addel(val) {
            val = parseInt(val);
            $('.activElem').removeClass('activElem');
            switch (val) {
                case 1:

                    $("#squad").
                        clone().
                        addClass('activElem').
                        removeAttr('id').
                        attr('id', token()).prependTo("#worksheet");
                    break;
                case 2:

                    $("#krug").
                        clone().
                        addClass('activElem').
                        removeAttr('id').
                        attr('id', token()).prependTo("#worksheet");
                    break;
                case 3:
                    $("#star").
                        clone().
                        addClass('activElem').
                        removeAttr('id').
                        attr('id', token()).prependTo("#worksheet");
                    break;
                case 4:
                    $("#triangle").
                        clone().
                        addClass('activElem').
                        removeAttr('id').
                        attr('id', token()).prependTo("#worksheet");
                    break;

            }

        }
        function downimgimg()
        {
            $(".elem").removeClass('activElem');
            html2canvas($('#worksheet'), {
                onrendered: function (canvas) {
                    var img = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                    window.location.href=img;


                }
            });
        }
        function setimage() {
            var $input = $("#upload");
            var fd = new FormData;
            fd.append('uploadfile', $input.prop('files')[0]);

            $.ajax({
                url: '/api/load?uploadfiles=1',
                data: fd,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    var obj = $.parseJSON(data);

                    $(".activElem").css('background-image', 'url(' + obj['files'][0] + ')');

                }
            });

            return true;
        }
        function changerextcl(val)
        {
            var elem = $('#worksheet');
            elem.css('color', '#'+ val);
        }
        function trans(val)
        {
            var elem = $('.activElem');
            elem.css('background', 'transparent');
        }

        function changeWsp(val, arg) {
            var elem = $('#worksheet');
            elem.css(arg, val + '%');
        }
        function sizeChange(val, arg) {
            var elem = $('.activElem');
            elem.css(arg, val);
        }
        var rand = function () {
            return Math.random().toString(36).substr(2);
        };

        var token = function () {
            return rand() + rand();
        };
        function addText(val) {
            var elem = $('.activElem');

            if (elem.find("b").length == 0) {
                elem.append('<b class="text">' + val + '</b>');
            } else
                elem.find("b").empty().append('<b>' + val + '</b>');
        }
        function changebackground(val) {
            var elem = $('.activElem');
            elem.css("background", "#" + val);
        }
        function changetextdef(val) {
            var elem = $('.activElem');
            elem.css("background", "#" + val);
        }
        function changeheidt(val) {
            var elem = $('.activElem');
            elem.css("height", val + "%");
        }
        function changewh(val) {
            var elem = $('.activElem');
            elem.css("width", val + "%");
        }
        function changeElem(val, th) {
            var elem = $('.activElem');
            elem.css(th, val);

        }

        function copy() {

            $('.activElem').removeClass('activElem').
                clone().
                addClass('activElem').
                removeAttr('id').
                attr('id', token()).prependTo("#worksheet");
        }
        function del() {
            $('.activElem').detach();
        }
        function downimg() {
            $(".elem").removeClass('activElem');
            html2canvas($('#worksheet'), {
                onrendered: function (canvas) {
                    var img = canvas.toDataURL("image/png");


                    $.ajax({
                        url: '/api/upl?uploadfiles=1',
                        data: {img: img},

                        type: 'POST',
                        success: function (data) {

                        }
                    });




                }
            });

        }
        function fontst(val){
            var elem = $('.activElem');
            elem.css("font-style", val );
        }
        function check() {
            if (<?= $this->redact ?>==0
        )
            {
                $("#saver").empty().html(`<?= $this->body ?>`)
                ;

            }
            init();
        }


        $(document).ready(check);
        var sheet = $("#worksheet");
        function checkParaeters() {
            var elem = $('.activElem');
            $('#sh').val(parseInt(elem.css('width')));
            $('#hi').val(parseInt(elem.css('height')));
            $('#zi').val(parseInt(elem.css('z-index')));
            $('#cl').val(elem.css('background-color'));
            $('#tT').val(elem.find('b').html());
            $('#shW').val(parseInt(sheet.css('width')));
            $('#hiW').val(parseInt(sheet.css('height')));
        }
        $('#saver').bind("DOMSubtreeModified", function () {

            init();
            $(".activElem b").click(function (event) {
                $(this).draggable({
                    containment: 'parent'
                });
            });
            $(".activElem").mousedown(function (event) {
                if (event.button == 2) {
                    del();
                }

            });


            $(function () {
                $(".activElem").resizable({
                    minHeight: 10,
                    minWidth: 10,
                    autoHide: true,
                    maxWidth: 900,
                    maxHeight: 900
                }).draggable({
                    containment: '#worksheet'
                });

            });

            init();
            checkParaeters();
        });
        $('#saver').click(function (event) {

            var id = event.target.id;
            if (id.localeCompare("worksheet") != 0) {
                $(".elem").removeClass('activElem');
                $('#' + id).addClass('activElem');
                checkParaeters();
            }


        });

        function init() {
            $(".elem").draggable({
                containment: 'parent'
            });


        }
    </script>
<?php require 'views/footer.php'; ?>