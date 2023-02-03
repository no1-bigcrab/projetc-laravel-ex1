<?php
 namespace App\Repositories\category;

 use App\Repositories\BaseRepositoryInterface;

 interface CategoryRepositoryInterface extends BaseRepositoryInterface
 {
    public function getAllCategory();
 }

?>