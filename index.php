
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="normalize.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>


<body>
    <section>
        <div class="col-sm-12">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="booking">
                    <div class="heading">
                        <p>APPOINTMENT BOOKING SYSTEM</p>
                    </div>
                    <div class="buttons">
                        <div class="col-sm-6">
                            <div class="login_btn">
                                <input type="button" value="LOG IN" onclick="login()" class="button">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="signup_btn">
                                <input type="button" value="SIGN UP" onclick="signup()" class="button">
                            </div>
                        </div>
                        </div>
                    <div class="form" id="login">
                        <form>
                            <div class="form_fiels">
                                <label for=email>Email:</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="enter your email"><br>
                                <label for=password>Password:</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="enter your password">
                            </div>
                            <div class="submit_btn">
                                <button type="submit" onclick="sendlogin();" class="btn">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="form" id="signup">
                        <form>
                            <div class="form_fiels">
                                <label for=name>Name:</label>
                                <input type="name" name="name" id="name" class="form-control"
                                    placeholder="enter your name"><br>
                                <label for=email>Email:</label>
                                <input type="email" name="email" id="email1" class="form-control"
                                    placeholder="enter your email"><br>
                                <label for=number>Phon number: </label>
                                <input type="number" name="number" id="number" class="form-control"
                                    placeholder="enter your Nunber"><br>
                                    <label for="Gender">Gender:</label><br>
                                        Male<input type="radio"  id="Gender1" value="M">
                                        Female<input type="radio"  id="Gender2" value="f">
                                        Other<input type="radio"  id="Gender3" value="o"><br>
                                    </select><br>
                                <label for=password>Password:</label>
                                <input type="password" name="password1" id="password1" class="form-control"
                                    placeholder="enter your password"><br>
                                <label for=password>Confirm Password:</label>
                                <input type="password" name="cpassword" id="cpassword" class="form-control"
                                    placeholder="enter your password">
                            </div>
                            <div class="submit_btn">
                                <button type="submit" onclick="sendsignup();" class="btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </section>

    <script>
    function login() {
        var login=document.getElementById("login");
        var signup=document.getElementById("signup");
        signup.classList.add('hidden');
        login.classList.remove('hidden');
        login.classList.add('show');
    }

    function signup() {
        var login=document.getElementById("login");
        var signup=document.getElementById("signup");
        login.classList.add('hidden');
        signup.classList.remove('hidden');
        signup.classList.add('show');
    }
    function sendlogin()
    {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var token = "<?php echo password_hash("logintoken",PASSWORD_DEFAULT);?>";
        if(email!="" && password!="")
        {
            $.ajax(
            {
                type:'POST',
                url:"ajax/login.php",
                data:{email:email,password:password,token:token},
                success:function(data)
                {
                    if(data == 0)
                    {
                        window.location = "dashboard.php";
                    }
                }
            });
        }
        else
        {
            alert('fill all fields');
        }
    }
    function sendsignup()
    {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email1').value;
        var number = document.getElementById('number').value;
        var Gender = document.getElementById('Gender').value;
        var password = document.getElementById('password1').value;
        var cpassword = document.getElementById('cpassword').value;
        var token = "<?php echo password_hash("logintoken",PASSWORD_DEFAULT);?>"
        if(name!="" && email!="" && number!="" && Gender!="" && password!="" && cpassword!="")
        {
            if(password == cpassword)
            {
                $.ajax(
                {
                    type:'POST',
                    url:"ajax/signup.php",
                    data:{name:name,email:email,number:number,Gender:Gender,password:password,cpassword:cpassword,token:token},
                    success:function(data)
                    {
                        alert(data);
                    }
                });
            }
            else
            {
                alert('password not match');
            }
        }
        else
        {
            alert('fill all fields');
        }
    }

</script>
<script type="text/javascript">
$('form').submit(function(e){
    e.preventDefault();
});
</script>


</body>

</html>