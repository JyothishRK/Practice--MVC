<?php

trait Model
{
    use Database;

    protected $limit = 10;
    protected $offset = 0;

    public function insert($data)
    {
        $keys = array_keys($data);
        $query = "insert into $this->table (".implode(",",$keys).") values (:".implode(",:",$keys).")";
        //echo $query;
        $this->query($query,$data);       
        return false;
    }

    public function delete($id,$id_column='id')
    {
        $data[$id_column]=$id;
        $query = "delete from $this->table where $id_column = :$id_column";
        //echo $query;
        $this->query($query,$data);       
        return false;
    }
}