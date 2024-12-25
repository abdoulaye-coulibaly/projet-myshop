<?php 
class users_informatioin{
    public $name;
    public $email;
    public $password;
    public $id;
    public $affiche;


    public function sign_up($name,$email,$password){
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
        try{
            $admin=0;
            $create_date= date("y-m-d");
            $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $rq=$conn->prepare("INSERT INTO users_information(user_name,user_email,user_password,user_sign_in_date,is_admin) values(:nam, :email, :pass, :created_at,:amin)");
            $rq->bindParam(':nam', $name);
            $rq->bindParam(':email', $email);
            $rq->bindParam(':pass', $password);
            $rq->bindParam(':created_at', $create_date);
            $rq->bindParam(':amin', $admin);
            $rq->execute();
            // echo "succes";
        }
        catch (PDOException $e) {
            echo "Erreur". $e->getMessage() .""; 
    
        }
    }
    public function verify_user($email){
        $this->email=$email;
        try{
        $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rq=$conn->prepare("SELECT * FROM users_information WHERE user_email=:email");
        $rq->bindParam(':email', $email);
        $rq->execute();
        $user=$rq->fetch();
        if($user){
            return true;
        }
        else{
            return false;
        }
    }
    catch (PDOException $e) {
        echo "Erreur". $e->getMessage() .""; 
    }
}


public function name($email){
    $this->email=$email;
    try{
    $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $rq=$conn->prepare("SELECT user_name FROM users_information WHERE user_email=:email");
    $rq->bindParam(':email', $email);
    $rq->execute();
    $user=$rq->fetch();
    $name= $user["user_name"];

return $name;
   
}
catch (PDOException $e) {
    echo "Erreur". $e->getMessage() .""; 
}

}
        
    public function verify_is_admin($email){
    try{
    $this->email=$email;
    $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $is_admin=$conn->prepare("SELECT is_admin FROM  users_information WHERE user_email=:email");
    $is_admin->bindParam(':email',$email);
    $is_admin->execute();
    $verify=$is_admin->fetch();
    if($verify){
        return $verify["is_admin"];
    }
    }
    catch(PDOException $e){
        echo $req."<br>".$e->getMessage();
    }
}

    public function sign_in($email,$password){
        $this->email=$email;
        $this->password=$password;
        try{
        $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req=$conn->prepare("SELECT * FROM  users_information WHERE  user_email=:email");
        $req->bindParam(":email",$email);
        $req->execute();
        $user=$req->fetch();
        // echo $user["name"];
        if(password_verify($password,$user["user_password"])){
            return $user["user_name"];
        }
        else{
            return false;
        }
    }
    catch (PDOException $e) {
        echo "Erreur". $e->getMessage() .""; 
    }

    }

    public function searchName($name){
        $this->name=$name;

        try{

            $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $rq=$conn->prepare("SELECT * FROM users_information WHERE `user_name` LIKE :name");
            $rq->bindValue(':name', '%'. $this->name.'%');
            $rq->execute();


            $row = $rq->fetchAll(PDO::FETCH_ASSOC);

            if($row){
                foreach($row as $key => $element){
                    $this->affiche = $element['user_name']; 
                    return $this->affiche;
                }
            }
        }
        catch (Exception $e) {
            echo "Erreur". $e->getMessage() ."";    
          
        }

        function getAffiche(){
            return $this->affiche;
        }


    }

    public function del_user($id){
        try{
            $this->id=$id;
            $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $del = $conn->prepare( "DELETE FROM users_information WHERE id=:id;");
            $del->bindParam("id",$id);
            $del->execute();

        }
        catch (PDOException $e) {
            echo "Erreur". $e->getMessage() .""; 
        } 
    }

    public function show_user(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $show=$conn->prepare("SELECT id,user_name,user_email,is_admin,user_sign_in_date FROM  users_information ORDER BY user_name");
            $show->execute();
            $table=$show->fetchAll();
            return $table;
        }
        catch (PDOException $e) {
            echo "Erreur". $e->getMessage() .""; 
        } 
    }

    function renit($id){
        try{
            $this->id=$id;
            $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $show=$conn->prepare("UPDATE users_information SET is_admin=0 WHERE id=:id");
            $show->bindParam(":id",$id);
            $show->execute();
        }
        catch (PDOException $e) {
            echo "Erreur". $e->getMessage() .""; 
        } 
    }

    public function update_user($id){
        $this->id=$id;
        // $this->user_type=$user_type;
        try{
            $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $update = $conn->prepare("UPDATE users_information SET is_admin=1 WHERE id=:id;");
            $update->bindParam("id",$id);
            $update->execute();
        }
        catch (PDOException $e) {
            echo "Erreur". $e->getMessage() .""; 
        }    
    } 
}
// $name="sam";
// $email="sam@gmail.com";
// $pass="king";
// $s= new users_informatioin();
// $s->update_user(31);
// if ($s==true){
//     echo"sam";
// }
class product_information{
    public $product_name;
    public $product_price;
    public $product_description;
    public $product_picture;
    public $id;
    public $afficheproduct;


    public function searchproduct($product_name){
        $this->product_name=$product_name;

        try{

            $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $rq=$conn->prepare("SELECT * FROM product WHERE `product_nom` LIKE :product_name");
            $rq->bindValue(':product_name', '%'. $this->product_name.'%');
            $rq->execute();


            $row = $rq->fetchAll(PDO::FETCH_ASSOC);
            // foreach($row as $key => $element){
            //     return $element;
            // }


            if($row){
                return $row;
            }
        }
        catch (Exception $e) {
            echo "Erreur". $e->getMessage() ."";    
          
        }

        function getAfficheproduct(){
            return $this->afficheproduct;
        }


    }
    public function new_product($product_picture,$product_name,$product_price,$product_description){
        $this->product_name=$product_name;
        $this->product_description=$product_description;
        $this->product_price=$product_price;
        $this->product_picture=$product_picture;
        try{
        $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $create=$conn->prepare("INSERT into product(img_blob,product_nom, img_price,img_desc) values(:product_picture, :product_name, :product_price, :product_description)");
        $create->bindParam(':product_name', $product_name);
        $create->bindParam(':product_price', $product_price);
        $create->bindParam(':product_description', $product_description);
        $create->bindParam(':product_picture',$product_picture);
        $create->execute();
    }
    catch (Exception $e) {
        echo "Erreur". $e->getMessage() .""; 
    }
}
public function show_product(){
    try{
        $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $show=$conn->prepare("SELECT * FROM  product");
        $show->execute();
        $table=$show->fetchAll();
        return $table;
    }
    catch (Exception $e) {
        echo "Erreur". $e->getMessage() .""; 
    } 
}

function update_product($id,$product_name,$product_price,$product_description,$product_picture){
    $this->product_name=$product_name;
    $this->product_description=$product_description;
    $this->product_price=$product_price;
    $this->id=$id;
    $this->product_picture=$product_picture;
    try{
        $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req="UPDATE product set product_nom=:product_nom,img_price=:img_price,img_desc=:img_desc,img_blob=:img_blob WHERE id=:id";
        $update=$conn->prepare($req);
        $update->bindParam(':id', $id);
        $update->bindParam(':product_nom', $product_name);
        $update->bindParam(':img_price', $product_price);
        $update->bindParam(':img_desc', $product_description);
        $update->bindParam(':img_blob',$product_picture);
        $update->execute();
        header("location:product2.php");

    }
    catch(PDOException $e){
        echo $req."<br>".$e->getMessage();
    }
}
public function del_product($id){
    try{
        $this->id=$id;
        $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $del = $conn->prepare( "DELETE FROM product WHERE id=:id");
        $del->bindParam('id',$id);
        $del->execute();

    }
    catch (PDOException $e) {
        echo "Erreur". $e->getMessage() .""; 
    } 
}

function read_product($id){
    try{
    $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $show=$conn->prepare("SELECT * FROM  product WHERE id=:id");
    $show->bindParam(":id",$id);
    $show->execute();
    $table=$show->fetch();
    return $table;
    }
    catch(PDOException $e){
        echo $req."<br>".$e->getMessage();
    }
}
}


function count_users(){
    try{
        $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rq=$conn->prepare("SELECT count(*) FROM users_information");
        $rq->execute();
        $sam=$rq->fetch();
        echo $sam['count(*)'];
    }
    catch (Exception $e) {
        echo "Erreur". $e->getMessage() .""; 
    }
}

function count_product(){
    try{
        $conn = new PDO("mysql:host=localhost;dbname=users_information;port=3306", 'root', 'king');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rq=$conn->prepare("SELECT count(*) FROM product");
        $rq->execute();
        $sam=$rq->fetch();
        echo $sam['count(*)'];
    }
    catch (Exception $e) {
        echo "Erreur". $e->getMessage() .""; 
    }
}




function verify_password($password,$password_confirmation){
    if($password==$password_confirmation && strlen($password)>=4){
        $password=password_hash($password,PASSWORD_BCRYPT);
        return $user_info["password"]=$password;
    }
    else{
        return false;
    }
}

function verify_email($email){
    $regex= '/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/';
    if (preg_match($regex,$email)){
        return $user_info["email"]=$email;
    }
    else{
        return false;
    }
}

function verify_name($name){
    if (strlen($name)>=3){
        return $user_info["name"]=$name;
    }
    else{
        return false;
    }
}



// $sam=verify_is_admin("kouame@gmail.com");
// if($sam=='is_admin'){
//     echo "world";
// }
// else{
//     echo "0";
// }

// $name = new  users_informatioin;
// $relax=$name->name('king@gmail.com');
// echo  $relax ;


?>