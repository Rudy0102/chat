<?php
    // $link = mysqli_connect("localhost", "root", "", "chat");
    // $question = "SELECT JSON_OBJECT('id', id, 'autor', autor,'tresc',tresc,'data',data) FROM wiadomosci;"; //ogaranc koljenosc wyswietlania potem
    // $result = mysqli_query($link,$question);
    // var_dump($result);
    // echo "wynik <br>";
    // print_r($result);
    // echo "<br>";
    // print_r(mysqli_fetch_assoc($result));
    // $json=json_encode(mysqli_fetch_assoc($result));
    // echo ($json);

if (isset($_GET['p'])){
    // $page=$_GET['p'];
    // $limit = $page*100;
    require("connectdatabase.php");
    $question = "SELECT id,autor,tresc,data FROM wiadomosci ;"; //ogaranc koljenosc wyswietlania potem
    //LIMIT ($limit,$limit+100)
    $result = mysqli_query($link,$question);
    class wiadomosc{
        function __construct($id,$autor,$tresc,$data){
            $this->id=$id;
            $this->autor=$autor;
            $this->tresc=$tresc;
            $this->data=$data;
        }
    }
    $tablica = [];
    while($row=mysqli_fetch_assoc($result)){
        $wiadomosc = new wiadomosc($row['id'],$row['autor'],$row['tresc'],$row['data']);
        array_push($tablica,$wiadomosc);
        // var_dump($json);
    }
    $json=json_encode($tablica);
    echo $json;
}
?>