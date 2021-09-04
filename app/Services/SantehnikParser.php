<?php

namespace App\Services;

use App\Contracts\Parser;
use App\Exceptions\InvalidSiteException;
use App\Models\Category;
use App\Models\Maker;
use App\Models\Product;
use Exception;
use Generator;
use StounhandJ\HtmldomLaravel\Htmldom;

class SantehnikParser extends Parser
{
    private $product_url = 'https://santehnika-online.ru/ajax/react/productList/';
    private $name = "santehnik";

    private $host;
    private $item_on_page;
    private $interval;

    private $totalCnt;
    private $department;
    private $categories;
    private $makers;

    /**
     * @throws InvalidSiteException
     */
    public function __construct(string $department_url)
    {
        $this->loadConfig();
        preg_match('@^(?:https://)?([^/]+)@i', $department_url, $matches);
        if ($this->host != $matches[1]) throw new InvalidSiteException("Неверный сайт");
        $this->department = $this->getOrCreateDepartmentIfNoExist($this->getDepartmentEName($department_url), $this->getDepartmentName($department_url));
        $this->categories = $this->getCategories($department_url);
        $this->makers = [];
        $this->totalCnt = 0;
        foreach ($this->categories as &$category_data)
        {
            $category_data["count"] = $this->getTotalCnt($category_data["sectionId"]);
            $this->totalCnt += $category_data["count"];
        }
    }

    private function loadConfig()
    {
        $this->host = config($this->pathSetting()."host");
        $this->item_on_page = config($this->pathSetting()."item_on_page");
        $this->interval = config($this->pathSetting()."interval");
    }

    private function pathSetting(): string
    {
        return sprintf("%s.%s.%s.", $this->config_name, $this->setting_name, $this->name);
    }

    public function count(): int
    {
        return $this->totalCnt;
    }

    public function parseGenerator(): Generator
    {
        foreach ($this->categories as $category_data) {
            $pages = ceil($category_data["count"] / $this->item_on_page);
            for ($page = 1; $page <= $pages; $page += 1) {
                $products = $this->getProducts($category_data["sectionId"], $this->item_on_page, $page);
                foreach ($products as $product)
                {
                    $maker = $this->getOrCreateMakerIfNoExist($product["brand"] ?? "not defined");
                    $this->plusUniqueMaker($maker);
                    yield $this->makeProduct($product, $maker, $category_data["category"]);
                }
                sleep($this->interval);
            }
        }
    }

    private function plusUniqueMaker(Maker $maker)
    {
        if (!in_array($maker, $this->makers)) $this->makers[] = $maker;
    }

    private function makeProduct($data, Maker $maker, Category $category)
    {
        $temp = tmpfile();
        $file_path = stream_get_meta_data($temp)["uri"];
        fwrite($temp, file_get_contents($data["img"]));
        return Product::make(
            $data["title"],
            "-",
            "e_name",
            $data["price"],
            Product::saveImg($file_path),
            $category,
            $maker);
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
        preg_match('/\/([a-z|_]+).$/', $url, $matches);
        return $matches[1];
    }

    private function getDepartmentName(string $url)
    {
        preg_match('/<h1 class="b-title b-title--h1"><span>(.+)<\/span><\/h1>/', file_get_contents($url), $matches);
        return $matches[1];
    }

    /**
     * @return array ["category"=>Category, "sectionId"=>int]
     */
    private function getCategories(string $department_url): array
    {
        $html = new Htmldom($department_url);
        $a = $html->find('div[class="collapse-wrapper-inner"]', 0)->children(0)->children(1)->find("a");
        $categories = [];
        foreach ($a as $category) {
            preg_match('/\/([a-z|_]+).$/', $category->href, $matches);
            $data = [];
            $data["category"] = $this->getOrCreateCategoryIfNoExist($matches[1], $category->innertext, $this->department);
            $data["sectionId"] = $this->getSectionId("https://" . $this->host . $category->href);
            $categories[] = $data;
        }
        return $categories;
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

    public function statistics(): array
    {
        return [
            "countMakers"=> count($this->makers),
            "countCategories"=> count($this->categories)
        ];
    }
}
