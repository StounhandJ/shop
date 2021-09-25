<?php

namespace App\Contracts;

use App\Models\Category;
use App\Models\Department;
use App\Models\Maker;

abstract class Parser
{
    protected $config_name = "parser";
    protected $setting_name = "setting";

    abstract public function __construct(string $department_url);

    /**
     * Count of product
     * @return int
     */
    abstract public function count(): int;

    /**
     * @yield Product
     */
    abstract public function parseGenerator();

    /**
     * @yield array ["countMakers"=> int, "countCategories"=> int]
     */
    abstract public function statistics(): array;

    protected function getOrCreateDepartmentIfNoExist($e_name, $name): Department
    {
        $department = Department::getByEName($e_name);
        if ($department->exists) {
            $department->setNameIfNotEmpty($name);
            $department->save();
            return $department;
        }

        $department = Department::make($name, $e_name);
        $department->save();
        return $department;
    }

    protected function getOrCreateCategoryIfNoExist($e_name, $name, Department $department): Category
    {
        $category = Category::getByEName($e_name);
        if ($category->exists) {
            $category->setNameIfNotEmpty($name);
            $category->save();
            return $category;
        }

        $category = Category::make($name, $e_name, $department);
        $category->save();
        return $category;
    }

    protected function getOrCreateMakerIfNoExist($name): Maker
    {
        $maker = Maker::getByName($name);
        if ($maker->exists) {
            return $maker;
        }

        $maker = Maker::make($name);
        $maker->save();
        return $maker;
    }
}
