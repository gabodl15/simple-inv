<?php

require __DIR__."/../config/database.php";


class connection{

    private function connect(){
        $this->mysqli = new mysqli(SERVER, USER, PASSWORD, DATABASE);
    }

    private function close(){
        mysqli_close($this->mysqli);
    }

    private function add_item($item, $stock){
        $this->connect();
        $this->mysqli->query("insert into material(name_material, quantity) values('$item', '$stock')");
        $this->close();
    }

    private function add_stock($id, $stock){
        $this->connect();
        $quantity = $this->mysqli->query("select quantity from material where id_material = $id");
        while($row = $quantity->fetch_object()){
            $this->number[] = $row;
        }
        foreach ($this->number as $key) {
            $this->new_value = intval($key->quantity);
        }

        $this->new_value += $stock;
        $this->mysqli->query("update material set quantity = $this->new_value where id_material = $id");
        $this->close();
    }

    private function drop_stock($id, $drop){
      $this->connect();
      $quantity = $this->mysqli->query("select quantity from material where id_material = $id");
      while($row = $quantity->fetch_object()){
          $this->number[] = $row;
      }
      foreach ($this->number as $key) {
          $this->new_value_drop = intval($key->quantity);
      }
      if(($this->new_value_drop - $drop) >= 0 ){
          $this->new_value_drop -= $drop;
          $this->mysqli->query("update material set quantity = $this->new_value_drop where id_material = $id");
      }else{
        echo '<div class="alert alert-danger" role="alert"> Tendría menos de 0 en almacén </div>';
      }
      //$this->new_value += $stock;
      //$this->mysqli->query("update material set quantity = $this->new_value where id_material = $id");
      $this->close();
    }

    private function drop_item($id){
        $this->connect();
        $this->mysqli->query("delete from material where id_material = $id");
        $this->close();
    }

    private function get_materials(){
      $this->connect();

      $result = $this->mysqli->query("select * from material");
      while($row = $result->fetch_object()){
          $this->data[] = $row;
      }
      $this->close();

      if(isset($this->data)){
          return $this->data;
      }else{
          return "No hay datos";
      }
    }

    public function show_material(){
      return $this->get_materials();
    }

    public function insert_($item_name, $stock){
        $this->add_item($item_name, $stock);
    }

    public function stock($id, $stock){
        $this->add_stock($id, $stock);
    }

    public function drop($id, $drop){
        $this->drop_stock($id, $drop);
    }

    public function drop_i($id){
        $this->drop_item($id);
    }
}
