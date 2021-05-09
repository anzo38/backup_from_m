<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InputRequest;
use App\Http\Requests\SignUpRequest;
use App\Model\Contact;
use App\Model\Hobby;
use App\Question as AppQuestion;
use App\Mail\CotactMail;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Question\Question as QuestionQuestion;

class ContactController extends Controller
{


    public function input(Request $request)
    {
        $inquiry = new Contact();
        // $hobbys = new Hobby();
        // $hobbys->fill([
        //     'hobby' => $request->hobby,
        //     ]);

        $inquiry->fill([
        'name' => $request->name,
        // 'hobby'=> $request->hobby,
        'food'=> $request->food,
        'area' => $request->area,
        'login' => $request->login,
        'password' => $request->password,

        ]);

        // questionの要素数モデルQuestionを要素数分newしてsabveManyする
        $inquiry->setHobbys($this->initHobby($request));
    //    if($request){
    //     $hobbys = array_fill(0,4, new Hobby);
    //     $inquiry->hobby = $hobbys;
    //     $data['inquiry'] = $inquiry;

    //    }

        // $hobbys = new Hobby();
        // $hobbys->fill([
        //     'hobby' => $request->hobby,
        //     ]);

// questionの要素数モデルQuestionを要素数分newしてsabveManyする
        // foreach($request->hobby as $i =>$v){
        //     $hobbys = new Hobby(['hobby' => $v]);
        //     $hobbys[] = $hobbys;
        // }


        // $questions = $question->fill($request->all());
        // Configはパラメーターに渡さなくていいs
        // $test = config('form.question');

        return view('contact.input',['inquiry'=> $inquiry,]);
    }

    public function confirm(InputRequest $request){
        $inquiry = new Contact();

        $inquiry->fill([
        'name' => $request->name,
        // 'hobby'=> $request->hobby,
        'food'=> $request->food,
        'area' => $request->area,
        'login' => $request->login,
        'password' => $request->password,
        ]);

        $hobbys = new Hobby();
        $hobbys->fill(['hobby' => $request->hobby,]);
//  questionの要素数モデルQuestionを要素数分newしてsabveManyする
        // foreach($request->hobby as $i =>$v){
        //     $question = new Hobby(['question' => $v]);
        //     $questions[] = $question;
        // }
        // $inquiry->setHobbys($this->initHobby($request));
    //    if($request){
    //     $hobbys = array_fill(0,4, new Hobby);
    //     $inquiry->hobby = $hobbys;
    //     $data['inquiry'] = $inquiry;

    //    }



        // $inquiry->setQuestions($this->initQuestion($request));
            // $question = new Question();
            // $question->fill(['question'=>$request->question]);
            // $questions = [];
            // $ary_questions = Request::only('questions');
            // foreach($ary_questions as $i => $ary_question) {
            //     $question = new Paragraph;
            //     $question->fill($ary_question);
            //     $questions[] = $question;
            // }
            // $inquiry->questions()->saveMany($paragraphs);
        // $question =fill(['question' => $request->question]);
        // $b = new Question(["question"=>"チキショー"]);
        // $a->fill(["question"=>"バーロ"]);
        // $b->fill(["question"=>"チキショー"]);
        // $question->fill(['contact_id'=>3,'question'=>'てやんでい']);
        // $inquiry->questions()->saveMany([
        //     // new App\Model\Question(['contact_id' => '4']),
        //     $a,
        //     $b,
        // ]);



        return view('contact.confirm',['inquiry'=> $inquiry,'hobbys'=>$hobbys]);
    }
    // public function confirm(InputRequest $request){
    //     $inquiry = new Inquiry();

    //     $inquiry->fill([
    //         'name' => $request->name,
    //         'e_mail'=> $request->e_mail,
    //         // 'question' => $request->question,
    //         'category' => $request->category,
    //         'date' => $request->date,
    //         'time_start' => $request->time_start,
    //         'time_end' => $request->time_end,
    //         'course' => $request->course,
    //         'comment' => $request->comment,
    //         'login_id'=> $request->login_id,
    //         'login_pass' => $request->login_pass,]);

    //         $question = new Question();
    //         $question->fill(['question' => $request->question,]);
    //     return view('contact.confirm',['inquiry'=> $inquiry,'question'=> $question]);

    // }

    // public function complete(Request $request){
    //     $inquiry = new Inquiry();
    //     $inquiry->fill([
    //     'name' => $request->name,
    //     'e_mail'=> $request->e_mail,
    //     // 'question' =>$inquiry->questions(),
    //     'category' => $request->category,
    //     'date' => $request->date,
    //     'time_start' => $request->time_start,
    //     'time_end' => $request->time_end,
    //     'course' => $request->course,
    //     'comment' => $request->comment,
    //     'login_id'=> $request->login_id,
    //     'login_pass' => $request->login_pass,
    //     ]);
    //     $inquiry->save();

    //     // questionの要素数モデルQuestionを要素数分newしてsabveManyする

    //     // foreach($request->question as $i =>$v){
    //     //     $question = new Question(['question' => $v]);
    //     //     $questions[] = $question;
    //     // }
    //     // $inquiry->questions()->saveMany($questions);

    //     $questions=[];
    //     foreach($request->question as $i =>$v){
    //         $questions[] = array_push($question,new Question(['question' => $v]));
    //     }
    //     // $inquiry->questions()->saveMany($questions);
    //     // $questions=array_fill(0, $count, new Question(['question' => $question_v],));
    //     // $inquiry->questions = $questions;
    //     // var_dump($inquiry->questions);exit;

    //     // $b = new Question(["question"=>"チキショー"]);
    //     // $a->fill(["question"=>"バーロ"]);
    //     // $b->fill(["question"=>"チキショー"]);
    //     // $question->fill(['contact_id'=>3,'question'=>'てやんでい']);

    //     // $question->fill($request->all());



    //     // Mail::to($contact->email)
    //     //     ->send(new ContactMail($contact)); // 引数にリクエストデータを渡す



    //     return view('contact.complete',['inquiry'=> $inquiry]);



    // }


    // public function signup(Request $request)
    // {

    //     //  バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
    //     $validator=[
    //         'name' => 'required',
    //         'e_mail' => 'required|email',

    //     ];
    //     // $name = $request->name;
    //     // $e_mail = $request->e_mail;
    //     $this->validate( $request, $validator );


    //     // return view('contact.signup');
    //     //フォームから受け取ったすべてのinputの値を取得
    //     // $inputs = $request->all();

    //     //入力内容確認ページのviewに変数を渡して表示

    // }
    private function initHobby($request){
        $hobbys=[];
        if ($request->hobby  != null && is_array($request->hobby )){
            foreach($request->hobby as $k => $v){
                array_push($hobbys,new Hobby(['form_id'=>$k ,'hobby' => $v]));
            }
        }

        return $hobbys;
    }


}
