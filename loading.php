<html>
<head>
<title> loading</title>
<style>
body{
margin:0%;
padding:0%;
background:#2C3E50;
}

.box{
width:200px;
height:200px;
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
overflow:hidden;
}

.box .b{
border-radius:50%;
border-left:4px solid;
border-right:4px solid;
border-top:4px solid transparent !important;
border-bottom:4px solid transparent !important;
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
animation: ro 2s infinite;
}

.box .b1{
border-color:#4a69bd;
width:120px;
height:120px;
}

.box .b2{
border-color:#f6b93b;
width:100px;
height:100px;
animation-delay:0.2s;
}

.box .b3{
border-color:#2ecc71;
width:80px;
height:80px;
animation-delay:0.4s;
}
.box .b4{
border-color:#F4F6F7;
width:60px;
height:60px;
animation-delay:0.6s;
}

@keyframes ro{
0%{
transform:translate(-50%,-50%) rotate(0deg);
}
50%{
transform:translate(-50%,-50%) rotate(-180deg);
}
100%{
transform:translate(-50%,-50%) rotate(0deg);
}
}
</style>

</head>
<body>
<div class="box">
<div class="b b1"></div>
<div class="b b2"></div>
<div class="b b3"></div>
<div class="b b4"></div>
</div>

</body>
</html>
