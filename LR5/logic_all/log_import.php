<?php
require_once 'db_connect.php';

$salt = "izdfhbj[irgum4ert82j49-*//***n";
$file = $_FILES['file_json'];
$uploaddir= $_SERVER['DOCUMENT_ROOT']. '/impex/';

if(isset($_POST['import'])&&$_SERVER["REQUEST_METHOD"] == "POST"){
    $checkrows = 0;


    if($_FILES['file_json']['type']!='application/json'||!$_FILES['file_json']){
        $errors = 'Неверный тип файла или файл отсутствует';
    }
    else{

    $sql = "CREATE TABLE IF NOT EXISTS books_imported 
(`id` int UNSIGNED NOT NULL,
  `img` varchar(45) NOT NULL DEFAULT 'no_img.png',
  `name` varchar(45) NOT NULL,
  `id_avtors` int UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost` int NOT NULL,
`guid` VARCHAR(255)
)";


    $connection->query($sql);
    $new_name = $uploaddir . md5($_FILES['file_json']['tmp_name']);
    move_uploaded_file($_FILES['file_json']['tmp_name'], $new_name);
    $handle = fopen($new_name, 'r');
    $content = fread($handle, filesize($new_name));

    $newcontent = json_decode($content, true);


    fclose($handle);

        $guid = $connection->prepare("SELECT GUID FROM books_imported");
        $guid->execute();
        $guid = $guid->fetchALL(PDO::FETCH_ASSOC);
        $stmt = $connection->prepare("INSERT INTO `books_imported` (id, img, name, id_avtors, description, cost, guid) VALUES (?,?,?,?,?,?,?)");



        $connection->beginTransaction();


        foreach($newcontent as $data){
            $check = 0;

            for($i = 0;$i<count($guid);$i++){
                if(md5(htmlspecialchars($data['id']).
                        htmlspecialchars($data['img']).
                        htmlspecialchars($data['name']).
                        htmlspecialchars($data['id_avtors']).
                        htmlspecialchars($data['description']).
                        htmlspecialchars($data['cost']).$salt) == $guid[$i]["GUID"]||
                    !htmlspecialchars($data['id'])||
                    !htmlspecialchars($data['img'])||
                    !htmlspecialchars($data['name'])||
                    !htmlspecialchars($data['id_avtors'])||
                    !htmlspecialchars($data['description'])||
                    !htmlspecialchars($data['cost'])){
                    $check++;
                }
            }

            if($check == 0){
            $stmt->execute(array(
                htmlspecialchars($data['id']),
                htmlspecialchars($data['img']),
                htmlspecialchars($data['name']),
                htmlspecialchars($data['id_avtors']),
                htmlspecialchars($data['description']),
                htmlspecialchars($data['cost']),
                md5(
                    htmlspecialchars($data['id']).
                    htmlspecialchars($data['img']).
                    htmlspecialchars($data['name']).
                    htmlspecialchars($data['id_avtors']).
                    htmlspecialchars($data['description']).
                    htmlspecialchars($data['cost']).$salt)));
                $checkrows++;
            }
        }

        $connection->commit();
        $importDB = count($guid) + $checkrows;
        unlink($new_name);
    }
}