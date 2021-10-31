<html>
<title>test</title>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
</head>

<style>

.card {
    border: 1px solid;
    border-radius: 20px;
    box-shadow: 0px 15px #3D367B;
    width: 20rem;
    font-family: 'Kanit', sans-serif;
    transition-duration: 0.5s;
}
.card:hover{
    color: #233142;
    border: 1px solid;
    border-radius: 30px;
    box-shadow: 0px 15px #FAA3A3;
    width: 20rem;
    font-family: 'Kanit', sans-serif;
    transition: 0.5s;
}
</style>
<body>
    <div class="container">
    <div class="card border border-dark mt-5 fw-bolder">
        <div class="card-body">
            <h5 class="card-title mb-2">Course : <?php echo "Python-OOP" ?></h5>
            <p class="card-subtitle">ผู้สอน : <?php echo "Kanut" ?></p>
            <p class="card-subtitle mb-2">ภาคเรียน / ปีการศึกษา : <?php echo " 1 / 2021" ?></p>
            <p class="card-subtitle">ภาษา : <?php echo "Python"?></p>
            <p class="card-subtitle">สถานะ : <label class="text-success"><?php echo "Open"?></label></p>
        </div>
    </div>


</span>
</div>
</body>
</html>