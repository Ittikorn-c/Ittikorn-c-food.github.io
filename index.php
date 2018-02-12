<html>
    <head>
        <meta charset"utf-8">
        <link href="lab4.css" rel="stylesheet">
    </head>

    <body>
        <form id="myForm" action="index.php" method="post">
            <?php
                function console_log($data){
                    echo '<script>';
                    echo 'console.log('.json_encode($data).')';
                    echo '</script>';
                  }
                  

                $isBMI = false;
                $isBMR = false;
                $isTTC = false;
                if(array_key_exists('option',$_POST)){
                    console_log($_POST['option']);
                    if($_POST['option'] == "a"){
                        $isBMI = true;
                    }
                    if($_POST['option'] == "b"){
                        $isBMR = true;
                    }
                    if($_POST['option'] == "c"){
                        $isTTC = true;
                    }
                    
                }

                echo '<div id="head"><select class="choice" id="sOption" name="option" onchange="this.form.submit()">
                <option disabled="disabled" selected>กรุณาเลือก..</option>
                <option value="a" '.($isBMI?'selected':'').'>Body Mass Index</option>
                <option value="b" '.($isBMR?'selected':'').'>Basal Metabolic Rate</option>
                <option value="c" '.($isTTC?'selected':'').'>Total Cholesterol</option>
                </select>';
                

                $showBMI = false;
                $showBMR = false;
                $showTTC = false;

                if(array_key_exists('submits',$_POST)){
                    console_log($_POST['submits']);
                    console_log($_POST['h']);
                    if($_POST['submits'] == "bmi"){
                        $showBMI = true;
                    }
                    else if($_POST['submits'] == "bmr"){
                        $showBMR = true;
                    }
                    else if($_POST['submits'] == "ttc"){
                        $showTTC = true;
                    }
                    console_log($showBMI);
                    console_log($showBMR);
                    console_log($showTTC);
                }

                if($isBMI){
                    echo '<div id="body1"><h1>โปรแกรมคำนวณดัชนีมวลกาย Body Mass Index (BMI)</h1>
                          <h3>ส่วนสูง/เซนติเมตร</h3>
                          <input type="number" name="h">
                          <br>
                          <h3>น้ำหนัก/กิโลกรัม</h3>
                          <input type="number" name="w">
                          <br><br>';
                          
                          echo '<button type="submit" name="submits" class="submit" value="bmi">คำนวณ</button> <br></div>';
                }
                if($showBMI){
                    if(array_key_exists('h',$_POST) && array_key_exists('w',$_POST) && ($_POST['h']!='') && ($_POST['w']!='')){
                    $bmi = (floatval($_POST['w']) / (floatval($_POST['h'])*floatval($_POST['h'])))*100*100;
                    $text;
                    if($bmi<18.5){
                        $text = 'น้ำหนักน้อยเกินไป ซึ่งอาจจะเกิดจากนักกีฬาที่ออกกำลังกายมาก และได้รับสารอาหารไม่เพียงพอ วิธีแก้ไขต้องรับประทานอาหารที่มีคุณภาพ และมีปริมาณพลังงานเพียงพอ และออกกำลังกายอย่างเหมาะสม';
                    }
                    else if($bmi<=23.4){
                        $text = 'น้ำหนักปกติ และมีปริมาณไขมันอยู่ในเกณฑ์ปกติ มักจะไม่ค่อยมีโรคร้าย อุบัติการณ์ของโรคเบาหวาน ความดันโลหิตสูงต่ำกว่าผู้ที่อ้วนกว่านี้';
                    }
                    else if($bmi<=28.4){
                        $text = 'น้ำหนักเกิน หากคุณมีกรรมพันธ์เป็นโรคเบาหวานหรือไขมันในเลือดสูงต้องพยายามลดน้ำหนักให้ดัชนีมวลกายต่ำกว่า 23';
                    }
                    else if($bmi<=34.9){    
                        $text = 'โรคอ้วนระดับ1 และหากคุณมีเส้นรอบเอวมากกว่า 90 ซม.(ชาย) 80 ซม.(หญิง) คุณจะมีโอกาศเกิดโรคความดัน เบาหวานสูง จำเป็นต้องควบคุมอาหาร และออกกำลังกาย';

                    }
                    else if($bmi<=39.9){
                        $text = 'โรคอ้วนระดับ2 คุณเสี่ยงต่อการเกิดโรคที่มากับความอ้วน หากคุณมีเส้นรอบเอวมากกว่าเกณฑ์ปกติคุณจะเสี่ยงต่อการเกิดโรคสูง คุณต้องควบคุมอาหาร และออกกำลังกายอย่างจริงจัง';
                    }
                    else{
                        $text = 'โรคอ้วนขั้นสูงสุด';
                    }
                    echo '<div class="ans"><h1>ดัชนีมวลกายของคุณ</h1>
                         <h2>ดัชนีมวลกาย = '.$bmi.' '.$text.'</h2>
                         <center><img src="1.jpg"></center></div>';
                    }
                }
                $a1 = false;
                $a2 = false;
                $a3 = false;
                $a4 = false;
                $a5 = false;
                if($isBMR){
                    echo '<div id="body2"><h1>คำนวณการเผาผลาญพลังงาน Basal Metabolic Rate (BMR)</h1>';

                    echo '<input type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female"> Female <br>
                    <h3>ส่วนสูง/เซนติเมตร</h3>
                    <input type="number" name="h">
                    <br>
                    <h3>น้ำหนัก/กิโลกรัม</h3>
                    <input type="number" name="w">
                    <br>
                    <h3>อายุ/ปี</h3>
                    <input type="number" name="a">
                    <br>
                    <h3>กิจกรรม</h3>
                    <select class="choice" name="activities">
                    <option disabled="disabled" selected>กรุณาเลือก..</option>
                    <option value="a" '.($a1?'selected':'').'>ไม่ออกกำลังกายหรือออกกำลังกายน้อยมาก</option>
                    <option value="b" '.($a2?'selected':'').'>ออกกำลังกายน้อยเล่นกีฬา 1-3 วัน/สัปดาห์</option>
                    <option value="c" '.($a3?'selected':'').'>ออกกำลังกายปานกลางเล่นกีฬา 3-5 วัน/สัปดาห์</option>
                    <option value="d" '.($a4?'selected':'').'>ออกกำลังกายหนักเล่นกีฬา 6-7 วัน/สัปดาห์</option>
                    <option value="e" '.($a5?'selected':'').'>ออกกำลังกายหนักเป็นนักกีฬา</option>
                    </select><br><br>';

                    echo '<button type="submit" name="submits" class="submit" value="bmr">คำนวณ</button> <br></div>';
                }
                if($showBMR){
                    if(array_key_exists('gender',$_POST) && array_key_exists('h',$_POST) && array_key_exists('w',$_POST) &&
                     array_key_exists('activities',$_POST) && ($_POST['gender']!='') && ($_POST['w']!='') && ($_POST['h']!='') && ($_POST['a']!='') && ($_POST['activities']!='')){
                    if($_POST['gender'] == 'male'){
                        $bmr = 66 + (13.7 * $_POST['w']) + (5 * $_POST['h']) - (6.8 * $_POST['a']);
                    }
                    else if($_POST['gender'] == 'female'){
                        $bmr = 665 + (9.6 * $_POST['w']) + (1.8 * $_POST['h']) - (4.7 * $_POST['a']);
                    }

                    if(array_key_exists('activities',$_POST)){
                        
                        if($_POST['activities'] == "a"){
                            $tdee = $bmr * 1.2;
                        }
                        else if($_POST['activities'] == "b"){
                            $tdee = $bmr * 1.375;
                        }
                        else if($_POST['activities'] == "c"){
                            $tdee = $bmr * 1.55;
                        }
                        else if($_POST['activities'] == "d"){
                            $tdee = $bmr * 1.725;
                        }
                        else if($_POST['activities'] == "e"){
                            $tdee = $bmr * 1.9;
                        }
                    }
                }
                    echo '<div class="ans"><h2>BMR (Basal Metabolic Rate) พลังงานที่จำเป็นพื้นฐานในการมีชีวิต '.$bmr.' กิโลแคลอรี่</h2>
                         <h2>TDEE (Total Daily Energy Expenditure) พลังงานที่คุณใช้ในแต่ละวัน '.$tdee.' กิโลแคลอรี่</h2></div>';
                }
                if($isTTC){
                    echo '<div id="body3"><h1>คํานวณคอเลสเตอรอลรวม (Total Cholesterol)</h1>
                    <h3>ไขมันแอลดีแอล (Low density lipoprotein)</h3>
                    <input type="number" name="l">
                    <br>
                    <h3>ไขมันเอชดีแอล (High density lipoprotein)</h3>
                    <input type="number" name="h">
                    <br>
                    <h3>ไตรกลีเซอไรด์</h3>
                    <input type="number" name="t">
                    <br><br>';
                    
                    echo '<button type="submit" name="submits" class="submit" value="ttc">คำนวณ</button> <br></div>';
                }
                if($showTTC){
                    $ttc = $_POST['l'] + $_POST['h'] + ($_POST['t']/5);
                    echo '<div class="ans"><h2>ค่าคอเลสเตอรอลรวมของคุณ '.$ttc.' mg/dL</h2>';
                    if($ttc<200){
                        echo '<h1>=ดีมาก=</h1></div>';
                    }
                    else if($ttc<=239){
                        echo '<h1>=ค่อนข้างสูง=</h1></div>';
                    }
                    else{
                        echo '<h1>=สูง=</h1></div>';
                    }
                }

            ?>
        </form>
    </body>
</html>