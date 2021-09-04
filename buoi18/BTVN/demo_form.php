<?php
    $error = '';
    $result = '';

    $list_job = [
        0 => 'PHP',
        1 => 'JAVA',
        2 => 'PYTHON',
        3 => 'ASP.NET',
        4 => 'C#',
        5 => 'C'
    ];
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $date = $_POST['date'];
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        }
        $email = $_POST['email'];
        $avatar_arr = $_FILES['avatar'];
        if (isset($_POST['job'])) {
            $job = $_POST['job'];
        }
        $country = $_POST['country'];
        $descreption = $_POST['descreption'];

        if (empty($name) || empty($age) || empty($date)) {
            $error = 'Name, Age, Date cannot be left blank';
        }
        elseif (strlen($gender) == 0) {
            $error = 'Gender cannot be left blank';
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = 'must be in email format';
        }
        elseif ($avatar_arr['error'] == 0) {
            $extension = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);
            $extension_allowed = ['jpg','jpeg','png','gif'];
            $extension = strtolower($extension);
            $avatar_size_mb =  $avatar_arr['size'] / 1024 / 1024;
            $avatar_size_mb = round($avatar_size_mb,2);
            if ($avatar_size_mb > 2) {
                $error = ' you need to upload files under 2 mb';
            }
            elseif (!in_array($extension,$extension_allowed)) {
                $error = 'you need to upload as image file';
            }
        }
        if (empty($job)) {
            $error = 'you need to choose at least 1 job';
        }
        elseif (empty($country)) {
            $error = 'country cannot be left blank';
        }
        elseif (empty($descreption)) {
            $error = 'descreption cannot be left blank';
        }
        
        if (empty($error)) {
            $result .= "Name: $name <br>";
            $result .= "Age: $age <br>";
            $result .= "Date-of-birth: $date <br>";
           
               switch ($gender) {
                   case 0:
                       $result .= "Male <br>";
                       break;
                    case 1:
                       $result .= "Female <br>";
                       break;
                   default:
                       $error .= "Gender error";
                       break;
               
           }
           $result .= "Email: $email";
           if ($avatar_arr['error'] == 0) {
               $dir_upload = 'uploads';
               if (!file_exists($dir_upload)) {
                   mkdir($dir_upload);
                   $avatar = time(). '-'.$avatar_arr['name'];
                   $move_upload_file = move_uploaded_file($avatar_arr['tmp_name'],$dir_upload .'/'.$avatar);
               }
               if ($move_upload_file) {
                $result .= "<img src ='uploads/$avatar_arr' height = '80'<br>";
           }
    
           }
           elseif ($job) {
               foreach ($job as $value) {
                   $result .= "$list_job[$value] <br>";
               }
           }
           if ($country) {
                switch ($country) {
                    case 0:
                        $result .= "Country: Viet Nam <Br>";
                        break;
                        case 1:
                            $result .= "Country: Japan <br>";
                            break;
                            case 0:
                                $result .= "Country: USA <Br>";
                                break;
                                case 0:
                                    $result .= "Country: France <br>";
                                    break;
                                    case 0:
                                        $result .= "Country: Singapore <Br>";
                                        break;
                    default:
                        $error = "Country error <br>";
                        break;
                }   
           }
          $result .= "Descreption: $descreption";
       
        }   
    }
?>
<h3 style="color:red;"><?php echo $error; ?></h3>
<h3 style="color: green;"><?php echo $result; ?></h3>

<form action="" method="post" enctype="multipart/form-data">
    Name:
    <input type="text" name="name" value=""><br/>
    Age:
    <input type="text" name="age" value=""><br/>
    Date-of-birth:
    <input type="date" name="date" value=""><br/>
    Gender:
    <input type="radio" name="gender" value="0">Male
    <input type="radio" name="gender" value="1">Female
    <br/>
    Email:
    <input type="email" name="email" value="">
    <br/>
    Image:
    <input type="file" name="avatar" value=""><br/>
    Your Jobs:
    <input type="checkbox" name="job[]" value="0"> PHP
    <input type="checkbox" name="job[]" value="1"> JAVA
    <input type="checkbox" name="job[]" value="2"> PYTHON
    <input type="checkbox" name="job[]" value="3"> ASP.NET
    <input type="checkbox" name="job[]" value="4"> C#
    <input type="checkbox" name="job[]" value="5"> C++
    <br/>
    Country:
    <select name="country" id="">
        <option value="0">Viet Nam</option>
        <option value="1">Japan</option>
        <option value="0">USA</option>
        <option value="0">France</option>
        <option value="0">Singapore</option>
    </select>
    <br/>
    Descreption:
    <textarea name="descreption" cols="20" rows="5"></textarea>
    <br/>
    <input type="submit" name="submit" value="Show info">
</form>