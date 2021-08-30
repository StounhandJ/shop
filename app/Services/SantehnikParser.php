<?php

namespace App\Services;

use App\Conracts\Parser;
use App\Models\Category;
use App\Models\Department;
use App\Models\Maker;
use App\Models\Product;
use Exception;
use Generator;

class SantehnikParser implements Parser
{
    private $product_url = 'https://santehnika-online.ru/ajax/react/productList/';
    private $host = 'santehnika-online.ru';
    private $item_on_page = 1000;
    private $sectionId;
    private $totalCnt;
    private $pages;
    private $department;

    public function __construct(string $department_url)
    {
        preg_match('@^(?:https://)?([^/]+)@i', $department_url, $matches);
        if ($this->host!=$matches[1]) throw new Exception("Неверный сайт");
        $this->sectionId = $this->getSectionId($department_url);
        $this->totalCnt = $this->getTotalCnt($this->sectionId);
        $this->pages = ceil($this->totalCnt / $this->item_on_page);
        $this->department = $this->getOrCreateDepartmentIfNoExist($this->getDepartmentEName($department_url));
    }

    public function count(): int
    {
        return $this->totalCnt;
    }

    public function parseGenerator(): Generator
    {
        for ($page = 1; $page <= $this->pages; $page += 1) {
            $products = $this->getProducts($this->sectionId, $this->item_on_page, $page);
            foreach ($products as $product) yield $this->makeProduct($product);
        }
    }

    private function makeProduct($data)
    {
        return Product::make(
            $data["title"],
            "-",
            "e_name",
            $data["price"],
            "-",
            $this->getOrCreateCategoryIfNoExist($data["category"]),
            $this->getOrCreateMakerIfNoExist($data["brand"]));
    }

    private function getOrCreateDepartmentIfNoExist($name): Department
    {
        $department = Department::getDepartmentByEName($name);
        if ($department->exists) return $department;

        $department = Department::make($name, $name);
        $department->save();
        return $department;
    }

    private function getOrCreateCategoryIfNoExist($name): Category
    {
        $category = Category::getCategoryByEName($name);
        if ($category->exists) return $category;

        $category = Category::make($name, $name, $this->department);
        $category->save();
        return $category;
    }

    private function getOrCreateMakerIfNoExist($name): Maker
    {
        $maker= Maker::getMakerByName($name);
        if ($maker->exists) return $maker;

        $maker = Maker::make($name);
        $maker->save();
        return $maker;
    }

    private function getSectionId(string $url)
    {
        preg_match('/"sectionId":"([0-9]+)"/', file_get_contents($url), $data);
        return $data[1];
    }

    private function getTotalCnt($sectionId)
    {
        return $this->postJson($this->product_url, ["sectionId" => $sectionId])["totalCnt"];
    }

    private function getProducts($sectionId, $totalCnt, $page = 1)
    {
        return $this->postJson($this->product_url, ["sectionId" => $sectionId, "perpage" => $totalCnt, "PAGEN_1" => $page])["data"];
    }

    private function getDepartmentEName(string $url)
    {
        preg_match('/\/[a-z|_]+.$/', $url, $matches);
        return str_replace("/","",$matches[0]);
    }

    private function postJson(string $url, array $data)
    {
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => http_build_query($data),
                'header' => 'Content-type: application/x-www-form-urlencoded',
            )
        );
        $context = stream_context_create($options);
        return json_decode(file_get_contents($url, false, $context), true);
    }
}
