<div class="loggedIn">
    <button type="button" name="showUser" onclick="showUser()" id="showUser">expand user menu</button>
</div>
<!-- <div id="time"></div> -->
<!-- <div class="showUser">

    <ul>
        <li>
            <label class="margin">username</label>
            <p class="user"></p>
        </li>
        <li>
            <label class="margin">password</label>
            <div class="newPassword">
                <ul>
                    <li class="newP">
                        <label>enter your old password</label>
                        <p>
                            <input type="password" autocomplete="off" id="oldPassword">
                        </p>
                    </li>
                    <li class="newP">
                        <label>enter your new password</label>
                        <p>
                            <input type="password" autocomplete="off" id="newPassword">
                        </p>
                    </li>
                    <li class="newP">
                        <label>enter your new password again</label>
                        <p>
                            <input type="password" autocomplete="off" id="newPasswordAgain">
                        </p>
                    </li>
                </ul>
                <input type="button" name="changePassword" id="changePassword" value="change password" onclick="changePassword()">

            </div>
            <ul>
                <li class="newP">
                    <button onclick="showpassword()" class="newP">view password</button>
                </li>
            </ul>
        </li>
    </ul>
</div> -->
<div id="user">
    <p class="loggedIn"></p>
    <span>Do you have a user?</span>
    <button id="userYes" onclick="userYes()">yes</button>
    <button id="userNo" onclick="userNo(false)">no</button>
</div>
<div class="container">
    <div id="loginForm">
        <ul>
            <li class="userInput">
                <span>enter your username</span>
                <input type="text" name="username" id="username-login" class="text">
            </li>

            <li class="userInput">
                <span>enter your password</span>
                <input type="password" name="password" id="password-login" class="text">
            </li>

            <li class="userInput">
                <input type="button" name="login" id="login" value="login" onclick="test(this.id, true)">
            </li>
        </ul>
    </div>
    <div id="signUpForm">
        <ul>
            <li class="userInput">
                <span>enter your username</span>
                <input type="text" name="username" id="username-signUp" class="text">
            </li>

            <li class="userInput">
                <span>enter your password</span>
                <input type="password" name="password" id="password-signUp" class="text">
            </li>

            <li class="userInput">
                <span>enter your password again</span>
                <input type="password" name="password" id="password-signUp2" class="text">
            </li>

            <li class="userInput">
                <input type="button" name="signUp" id="signUp" value="sign up" onclick="test(this.id, true)">
            </li>
        </ul>
    </div>
</div>
<div class="showAll">

</div>