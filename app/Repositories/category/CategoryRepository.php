<?php
    namespace App\Repositories\category;

    use App\Repositories\BaseRepository;
    use App\Repositories\category\CategoryRepositoryInterface;
    use App\Models\Category;

    class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
    {
        public function __construct(Category $category)
        {
            parent::__construct($category);
        }

        public function getAllCategory()
        {
            return $this->model->all()->toArray();
        }
    }
?>