<?php
interface Icrud {
    public function create( $object );
    public function readFromId( $param );
    public function update( $object );
    public function delete( $param );
}
?>