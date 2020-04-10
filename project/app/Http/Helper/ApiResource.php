<?php
/**
 * Created by PhpStorm.
 * User: rowjat
 * Date: 6/28/2019
 * Time: 4:07 PM
 */

namespace App\Http\Helper;

use Illuminate\Pagination\LengthAwarePaginator;
class ApiResource
{
    public function response_data($status,$message,$code=200,$data=null){
        return response()->json([
            'status'=>$status,
            'message'=>str_replace('_',' ',$message),
            'code'=>$code,
            'data'=>$data,
            'version'=>'v1'
        ]);
    }
    public function paginate($paginate_data,$callback=null){
        if($callback !== null){
          return  $paginate_data->setCollection($paginate_data->getCollection()->map($callback));
        }
        return $paginate_data;
    }
    public function LengthAwarePaginator(Collection $collection){
        $page = LengthAwarePaginator::resolveCurrentPage();

        $perPage = 30;
        if (request()->has('per_page')) {
            $perPage = (int)request()->per_page;
        }
        $result = $collection->slice(($page - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator($result, count($collection), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        $paginated->appends(request()->all());
        return $paginated;
    }
}