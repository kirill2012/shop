<div id="content" align="center">
    <div style="background: linear-gradient(to right, silver, dimgray); margin: 0 30%">
        <h1>
            <span style="color:red">Re</span><span style="color:orange">gi</span><span style="color:yellow">s</span><span style="color:green">tr</span><span style="color:blue">a</span><span style="color:darkblue">ti</span><span style="color:violet">on</span>
        </h1>
    </div>
    <br><br>

    <form action="<?=URL?>/store" method="post">
        <input type="text" name="name" id="name" placeholder="name">
        <br>
        <span id="e1" style='display: none;'><img src="/public/img/error.png">This name isn't correct or already exists</span>
        <span id="s1" style='display: none;'><img src="/public/img/success.png"></span>
        <br>

        <input type="text" name="email" id="email" placeholder="email"><br>
        <span id="e2" style='display: none;'><img src="/public/img/error.png">This email isn't correct or was already used</span>
        <span id="s2" style='display: none;'><img src="/public/img/success.png"></span>
        <br>

        <input type="password" name="pass" id="pass" placeholder="password"><br>
        <span id="e3" style='display: none;'><img src="/public/img/error.png">Password is short</span>
        <span id="s3" style='display: none;'><img src="/public/img/success.png"></span>
        <br>

        <input type="password" name="repass" id="repass" placeholder="confirm password"><br>
        <span id="e4" style='display: none;'><img src="/public/img/error.png">Passwords don't match</span>
        <span id="s4" style='display: none;'><img src="/public/img/success.png"></span>
        <br>

        <input type="button" id="save" value="save" class="btn">
        <input type="submit" id="submit" value="save" style="display: none">
    </form>
</div>

<script src="/public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        $('#name').on('input propertychange', function(){

            var name = $("#name").val();

            if (name.length < 3) {
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

                        if (data != 1) {
                            $('#e1').css('display', 'none');
                            $('#s1').css('display', 'inline-block');
                        }else{
                            $('#s1').css('display', 'none');
                            $('#e1').css('display', 'inline-block');
                        }
                    }
                });
            }

        });


        $('#email').on('input propertychange', function(){

            var email = $("#email").val();

            if (!isEmail(email)) {
                $('#s2').css('display', 'none');
                $('#e2').css('display', 'inline-block');

            } else {
                $.ajax({
                    type: "POST",
                    url: "<?=URL . '/check'?>",
                    data: {
                        funct: 'email',
                        email: email
                    },
                    success: function(data) {

                        if (data != 1) {
                            $('#e2').css('display', 'none');
                            $('#s2').css('display', 'inline-block');
                        }else{
                            $('#s2').css('display', 'none');
                            $('#e2').css('display', 'inline-block');
                        }
                    }
                });
            }

        });

        $('#pass').on('input propertychange', function(){

            var pass = $("#pass").val();

            if (pass.length < 5) {
                $('#s3').css('display', 'none');
                $('#e3').css('display', 'inline-block');
            } else {
                $('#e3').css('display', 'none');
                $('#s3').css('display', 'inline-block');
            }
        });

        $('#repass').on('input propertychange', function(){

            var pass = $("#pass").val();
            var repass = $("#repass").val();

            if (pass !== repass) {
                $('#s4').css('display', 'none');
                $('#e4').css('display', 'inline-block');
            } else {
                $('#e4').css('display', 'none');
                $('#s4').css('display', 'inline-block');
            }
        });

        $('#save').on('click', function(){
            if (
                $("#s1").css('display') == 'none' ||
                $("#s2").css('display') == 'none' ||
                $("#s3").css('display') == 'none' ||
                $("#s4").css('display') == 'none'
            ){
                alert('fuck you');
            }else{
                $('#submit').click();
            }
        });
    });

</script>