<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BaseController extends Controller
{
    public function listData($type)
    {
        $listData = $this->handdleData($type);
        $data = [];
        foreach ($listData as $value) {
            $arr = [
                'Model' => $value['modelCode'],
                'description' => $value['displayName'],
                'color' => $value['fmyChipList'][0]['fmyChipLocalName'] ?? '',
                'afterTaxPriceDisplay' => $value['afterTaxPriceDisplay'],
                'priceDisplay' => $value['priceDisplay'],
                'stock' => $value['ctaType'] != 'outOfStock' ? 'Còn hàng' : 'Hết hàng'
//                'ton_kho' => $this->getDataUrl('https://shop.samsung.com/vn/multistore/vnepp/vn_doanhnghiepd/servicesv2/getSimpleProductsInfo?productCodes=' . $value['modelCode'])

            ];
//            $arr['ton_kho'] = data_get($arr['ton_kho'], 'productDatas.*.stockLevel');
            array_push($data, $arr);
        }
        return $listData;
    }

    public function handdleData($type)
    {
        $url = 'https://searchapi.samsung.com/v6/front/epp/v2/product/finder/global?type='.$type.'&siteCode=vn&start=1&num=12&sort=newest&onlyFilterInfoYN=N&keySummaryYN=Y&specHighlightYN=Y&companyCode=vn_doanhnghiepd&pfType=G&familyId=';
        $response = $this->getDataUrl($url);
        $data = $response['response'];
        $quantity = $data['resultData']['common']['totalRecord'];
        $urlAll = 'https://searchapi.samsung.com/v6/front/epp/v2/product/finder/global?type='.$type.'&siteCode=vn&start=1&num='.$quantity.'&sort=newest&onlyFilterInfoYN=N&keySummaryYN=Y&specHighlightYN=Y&companyCode=vn_doanhnghiepd&pfType=G&familyId=';
        $getUrl = $this->getDataUrl($urlAll);
        return data_get(collect($getUrl), 'response.resultData.productList.*.modelList.*');
    }
    public function getDataUrl($url)
    {
        $response = Http::get($url);
        return  $response->json();
    }
}
