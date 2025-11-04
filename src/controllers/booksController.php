<?php
try{
  $query = query($db, "SELECT * FROM books");
  return view("books", ['books' => $query]);
}catch (RuntimeException $e){
  echo "error". $e->getMessage();
}