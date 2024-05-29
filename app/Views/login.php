<!DOCTYPE html>
<html lang="en">


<head>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="icon">
            <img src="css/image/favicon.png" alt="">
        </div>
        <div class="text-center mt-4 name"> Profile </div>
        <form class="user" id="form-login" method="post" action="<?= base_url('/login') ?>">
            <div class="input-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" id="mail" name="username" onclick="openeye();" class="tb" placeholder="Email" autocomplete="off" />
            </div>
            <div class="input-field d-flex align-items-center"> <span class="fas fa-key"></span>
                <input type="password" id="pwdbar" onclick="closeye();" name="password" class="tb" placeholder="Password" />
            </div> <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {


        $('form#form-login').submitAjax({
            pre: () => {
                $('form#form-login button [type=submit]').hide();

            },
            pasca: () => {
                $('form#form-login button [type=submit]').show();

            },

            success: (response, status) => {
                var js = $.parseJSON(response);
                alert(js.message);
                window.location = "<?= url_to('admin') ?>";
            },

            error: (xhr, status) => {
                var json = $.parseJSON(xhr.responseText);
                alert(json.message);
            }

        });
    });
</script>

</html>