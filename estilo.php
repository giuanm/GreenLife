<?php header("Content-type: text/css"); ?>
*{
    margin:0;
    padding:0;
    box-sizing: border-box;
}
body{
    background: #141414;
    font-family: Cambria, 'Helvetica Neue',Helvetica,Arial,sans-serif;
    color: #f7f7f7;
    align-items: flex-end;
}

.container-fluid{
    height: 640px;
    display: flexbox;
    margin-top: 15px;
    margin-bottom: 20px;
    margin-left: 20%;
    margin-right: 20%;
    text-align: center;
}

.esp_link{
    text-decoration:none;
    color:#10c5fc;
    margin-right: 5px;
    margin-left: 5px;
    margin-bottom: 25px;
    cursor: pointer;
    font-size: 20px;
}

.esp_link:hover{
    color: #078C31;
    transition: 0.8s;
    background-color: rgba(0,0,0,0.9);
    border-radius: 20%;
}

.voltar{
    text-decoration:none;
    color:#fff;
    margin-right: 5px;
    margin-left: 5px;
    cursor: pointer;
    font-size: 15px;
    text-align: left;
}

.voltar:hover{
    color: #078C31;
    transition: 0.8s;
    background-color: rgba(0,0,0,0.9);
    border-radius: 20%;
    text-align: left;
}