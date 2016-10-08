<div id="content" align="center">
    <div style="background: linear-gradient(to right, silver, dimgray); margin: 0 30%">
        <h1>
            <span style="color:red">Au</span><span style="color:orange">th</span><span style="color:yellow">or</span><span style="color:green">iz</span><span style="color:blue">at</span><span style="color:darkblue">io</span><span style="color:violet">n</span>
        </h1>
    </div>
    <br><br>

    <div>
        <input type="text" name="username" id="name" placeholder="name"> <img id="e1" src="/public/images/error.png" style='display: none;'><img id="s1" src="/public/images/success.png" style='display: none;'>
    </div>
    <div>
        <input type="password" name="pass" id="pass" placeholder="password" disabled="disabled"> <img id="e2" src="/public/images/error.png" style='display: none;'><img id="s2" src="/public/images/success.png" style='display: none;'>
    </div>

    <br><br><br><br>

    <div id="load" style="display: none" align="center"><img src="/public/images/load.gif" ></div>

</div>
<script src="/public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#name').on('input propertychange', function(){

            var name = $("#name").val();

            if (name.length < 2) {
                $('#s1').css('display', 'none');
                $('#e1').css('display', 'inline-block');

            } else {
                $.ajax({
                    type: "POST",
                    url: "<?=URL . '/check'?>",
                    data: {
                        funct: 'name',
                        username: name
                    },
                    success: function(data) {

                        if (data != 0) {
                            $('#e1').css('display', 'none');
                            $('#s1').css('display', 'inline-block');
                            $("#pass").attr('disabled', false).focus();
                        }else{
                            $('#s1').css('display', 'none');
                            $('#e1').css('display', 'inline-block');
                            $("#pass").attr('disabled', true);
                        }
                    }
                });
            }

        });

        $("#pass").on('input propertychange', function(){

            var name = $("#name").val();
            var pass = $("#pass").val();

            if (pass.length < 2) {
                $('#e2').css('display', 'inline-block');
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?=URL . '/check'?>",
                    data: {
                        funct: 'pass',
                        username: name,
                        password: pass
                    },
                    success: function(data) {
                        if (data != 0) {
                            $('#e2').css('display', 'none');
                            $('#s2').css('display', 'inline-block');
                            $('#load').show(1000);
                            setTimeout(function () {
                                window.location.replace("/");
                            }, 2000);
                        }
                    }
                });
            }

        });

    });

</script>