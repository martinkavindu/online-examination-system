<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class QnaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
        $correctIndex = (int) $row[7];

      
        $answers = [];

        for ($i = 1; $i <= 6; $i++) {
            $answers[] = [
                'answer' => $row[$i],
                'is_correct' => ($i === $correctIndex) ? true : false,
            ];
        }

        return new Question([
            'question' => $row[0],
            'answers' => $answers,
        ]);
    }

}
