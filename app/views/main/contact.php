<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Contact <strong>Us</strong></h2>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2133.0447995564946!2d30.790162914313033!3d50.522412719378124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6a4a2f33681315a8!2z0KDRi9C90L7Qug!5e0!3m2!1sru!2sua!4v1474462744097" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>E-Shopper Inc.</p>
                        <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                        <p>Newyork USA</p>
                        <p>Mobile: +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: info@e-shopper.com</p>
                    </address>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-sm-offset-3 padding-right">

            <?php if ($result): ?>
                <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
            <?php else: ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="signup-form"><!--sign up form-->
                    <h1 id="respond"></h1>
                    <h2>Обратная связь</h2>
                    <h5>Есть вопрос? Напишите нам</h5>
                    <br/>
                    <form action="#" method="post">
                        <p>Ваша почта</p>
                        <input type="email" id="userEmail" placeholder="E-mail" value="<?=$userEmail?>"/>
                        <p>Сообщение</p>
                        <!--
                        <input type="text" name="userText" placeholder="Сообщение" value="<?=$userText?>"/>
                        -->
                        <textarea id="userText" rows="8">
                            <?=$userText?>
                        </textarea>
                        <br><br>
                        <input type="button" id="submit" name="submit" class="btn btn-default" value="Отправить" />
                    </form>
                    <br>
                </div><!--/sign up form-->
            <?php endif; ?>

        </div>

    </div>
</div><!--/#contact-page-->

<script src="/public/js/jquery-3.1.0.min.js"></script>
<script>
    $(document).ready(function () {

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }


        $('#submit').click(function(){
            var email = $('#userEmail').val();
            if( isEmail(email) ){
                var text = $('#userText').val();
                $.ajax({
                    type: "POST",
                    url: "<?=URL . '/send'?>",
                    data: {
                        userEmail: email,
                        userText: text
                    },
                    success: function(data) {
                        if(data){
                            $('#respond').html('Сообщение отправлено!<br>Мы ответим Вам на указанный email');
                            $('#userEmail').val('');
                            $('#userText').val('');
                        }else{
                            $('#respond').html('Сообщение не отправлено!<br>Попытайтесь позже');
                        }
                    }
                });
            }else{
                alert("fuck you!");
            }

        });

    });

</script>

