<?php

namespace App\Imports;

use App\Models\category;
use App\Models\Contact;
use App\Models\Buyer as DataModel;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::
default('none');

class FirstSheetImport implements ToCollection, WithBatchInserts, WithChunkReading, WithHeadingRow, ToModel
{
    private $round;

    public function __construct(int $round)
    {
        $this->round = $round;
    }

    public function findUser($username){

        $user = User::where('name','=',$username)->first();
        if ($user) {
            return $user->id;
        }else{
            return 0;
        }
    }

    public function findCategory($categoryname)
    {
        $category= category::where('name', '=', $categoryname)->first();
        if ($category) {
            return $category->id;
        }else{
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

        // 数据库对应的字段
        return new DataModel([
            'name' => $row['名称'],
            'creditcode' => $row['信用代码'],
            'ceo' => $row['法人'],
            'tel' => $row['电话'],
            'fax' => $row['传真'],
            'site' => $row['网站'],
            'address' => $row['地址'],
            'user_id' => $this->findUser($row['所属用户']),
            'category' => $this->findCategory($row['类目']),
        ]);
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
