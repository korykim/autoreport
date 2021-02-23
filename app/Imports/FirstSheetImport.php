<?php

namespace App\Imports;



use App\Models\category;
use App\Models\Buyer as BuyerDataModel;
use App\Models\Customer as CustomerDataModel;
use App\Models\tag;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
//use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

//use Maatwebsite\Excel\Concerns\RegistersEventListeners;
//use Maatwebsite\Excel\Events\BeforeImport;
//use Maatwebsite\Excel\Events\AfterImport;
//use Maatwebsite\Excel\Events\BeforeSheet;
//use Maatwebsite\Excel\Events\AfterSheet;
//use Maatwebsite\Excel\Concerns\Importable;


HeadingRowFormatter::
default('none');

class FirstSheetImport implements ToCollection, WithBatchInserts, WithChunkReading, WithHeadingRow, ToModel
{
    //use RegistersEventListeners;

    private $round;
    private $rows;


    public function __construct(int $round)
    {
        $this->round = $round;
    }

    public function __destruct(){

        //Admin::script("document.cookie = 'cookie2='mm2'; Domain=autoreport.tt; path=/'");


    }


//    public static function beforeImport(BeforeImport $event)
//    {
//        //在流程开始时引发事件
//    }
//
//    public static function afterImport(AfterImport $event)
//    {
//        //在流程结束时引发事件
//
//    }
//
//    public static function beforeSheet(BeforeSheet $event)
//    {
//        //创建工作表后立即引发事件
//    }
//
//    public static function afterSheet(AfterSheet $event)
//    {
//        //在工作表处理结束时引发事件
//
//    }

    public function findUser($username)
    {

        $user = User::where('name', '=', $username)->first();
        if ($user) {
            return $user->id;
        } else {
            return 0;
        }
    }

    public function findCategory($categoryname)
    {
        $category = category::where('name', '=', $categoryname)->first();
        if ($category) {
            return $category->id;
        } else {
            return 0;
        }
    }

    function checkStatus($status)
    {
        if ($status == "正常") {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * @param array $row
     *
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        // 断数据是否
//        $user = Contact::where('title', '=', $row['标题'])->first();
//        if ($user) {
//            // 存在返回 null
//            return null;
//        }


        $key=array_keys($row);

        $this->rows=$row;

        if ($key[0]=='买家名称') {
            // 数据库对应的字段
            return new BuyerDataModel([
                'name' => $row['买家名称'],
                'creditcode' => $row['信用代码'],
                'ceo' => $row['法人'],
                'tel' => $row['电话'],
                'fax' => $row['传真'],
                'site' => $row['网站'],
                'address' => $row['地址'],
                'status' => $this->checkStatus($row['状态']),
                'user_id' => $this->findUser($row['所属用户']),
                'category' => $this->findCategory($row['类目']),
            ]);
        } else if ($key[0]=='卖家名称') {
            return new CustomerDataModel([
                'name' => $row['卖家名称'],
                'creditcode' => $row['企业登记号'],
                'ceo' => $row['法人'],
                'tel' => $row['电话'],
                'fax' => $row['传真'],
                'site' => $row['网站'],
                'address' => $row['地址'],
                'Year' => $row['更新次数'],
                'start' => $row['申请时间'],
                'end' => $row['结束时间'],
                'status' => $this->checkStatus($row['状态']),
                'user_id' => $this->findUser($row['所属用户']),
                'category' => $this->findCategory($row['类目']),
            ]);
        }


    }


    /**
     * 如果标题行不在第一行，则可以在导入类中轻松指定此行
     * @return int
     */
    public function headingRow(): int
    {
        //现在，第二行将用作标题行
        return 1;
    }

    public function collection(Collection $rows)
    {
        //
    }

    //批量导入1000条
    public function batchSize(): int
    {
        return 1000;
    }

    //以1000条数据基准切割数据
    public function chunkSize(): int
    {
        return 1000;
    }
}
