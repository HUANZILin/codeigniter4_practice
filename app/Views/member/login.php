<!DOCTYPE html>
<html lang="zh-TW">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    </head>
    <body>
        <h2>Login page</h2>
        <form id="loginForm">
            <?= csrf_field()?>
            <input type="text" name="account" placeholder="Input Account" autofocus required>
            <br>
            <input type="password" name="password" placeholder="Input Password" required>
            <br>
            <button type="button" onclick="doLogin()">Login</button>
        </form>
        <p id="errorText"></p>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">
function doLogin(){
    event.preventDefault();

    $.ajax({
        url: "<?= base_url("member/DoLogin")?>",
        type: 'POST',
        dataType: 'json',
        data: $('#loginForm').serialize()
    }).done(function(e){
        window.location.reload();
    }).fail(function(e){
        try{
            $('#errorText').html(`status code: ${e.responseJSON.error}<br>error messages: ${e.responseJSON.error}`);
        } catch(error){
            console.log(e);
            $('#errorText').html("伺服器連線失敗，請重新再試");
        }
    })
    
}
</script>
</html>
