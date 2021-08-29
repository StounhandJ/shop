<?php

namespace App\Services;

use Generator;

class Parser
{
    private $product_url = 'https://santehnika-online.ru/ajax/react/productList/';
    private $item_on_page = 1000;

    public function parseGenerator(string $category_url): Generator
    {
        $sectionId = $this->getSectionId($category_url);
        $totalCnt = $this->getTotalCnt($sectionId);
        $pages = ceil($totalCnt/$this->item_on_page);
        echo "\n\nsectionId: ".$sectionId;
        echo "\nТоваров: ".$totalCnt."\n\n\n";

        $start = microtime(true);
        echo "Прогресс 0/".$pages."\n";
        for ($page = 1; $page<=$pages; $page+=1)
        {
            yield $this->getProducts($sectionId, $this->item_on_page, $page);
        }
        echo "Время выполнения ".(microtime(true) - $start)."с.\n";
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

    private function getProducts($sectionId, $totalCnt, $page=1)
    {
        return $this->postJson($this->product_url, ["sectionId" => $sectionId, "perpage" => $totalCnt, "PAGEN_1"=>$page])["data"];
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
