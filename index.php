<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>

<body>
    <h3 id="signup">Signup</h3>
    <main>
        <form action="includes/insert_patient.php" method="post">
            <label for="hn">เลขที่ทั่วไป?</label>
            <input required id="hn" type="text" name="hn" placeholder="เลขที่ทั่วไป...">
            
            <br>

            <label for="id">เลขบัตรประชาชน?</label>
            <input id="id" type="text" name="id" placeholder="เลขบัตรประชาชน...">
            
            <br>

            <label for="name">ชื่อ-นามสกุล?</label>
            <input id="name" type="text" name="name" placeholder="ชื่อ - นามสกุล...">
            <!-- <select id="favouritepet" name="favouritepet">
                <option value="none">None</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
            </select> -->

            <br>
            <a href="patient.php">
                <button type="submit" >Submit</button>
            </a>
        </form>
    </main>

</body>

</html>