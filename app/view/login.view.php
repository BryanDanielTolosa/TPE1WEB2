<?php

class LoginView{


    function login($error = ''){
 
        require './templates/header.phtml';
        require './templates/login.phtml';
        require './templates/footer.phtml';
    }
}
