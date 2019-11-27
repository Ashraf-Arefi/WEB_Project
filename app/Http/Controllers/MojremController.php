<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Mojrem;
use Illuminate\Http\Request;
use Illuminate\Foundation\Console\PackageDiscoverCommand;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\File;


class MojremController extends Controller
{
    public function index()
    {
        $mojrems = Mojrem::paginate(6);
        return view('admin.list_mojrem', compact('mojrems'));
    }

    public function create()
    {
        return view('admin.add_mojrem');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'father_name' => 'required',
            'grand_father_name' => 'required',
            'ssn' => 'required|numeric',
            'event_type' => 'required',
            'place' => 'required',
            'date' => 'required',
            'wakil' => 'required',
            'p_village' => 'required',
            'p_district' => 'required',
            'p_province' => 'required',
            't_gozar' => 'required',
            't_nahiya' => 'required',
            't_province' => 'required',
            'related_employee_name' => 'required',
            'related_employee_number' => 'required|min:10|max:14',
            'result' => 'required',
            'reason' => 'required',
            'mojrem_photo' => 'image'
        ], [
            'first_name.required' => __('فیلد نام الزامی است'),
            'father_name.required' => __('فیلد نام پدر الزامی است'),
            'grand_father_name.required' => __('فیلد نام پدر کلان الزامی است'),
            'ssn.required' => __('فیلد نمبر تذکره الزامی است'),
            'ssn.numeric' => __('فیلد نمبر تذکره باید نمبر باشد'),
            'event_type.required' => __('فیلد نوع حادثه الزامی است'),
            'place.required' => __('فیلد مکان حادثه الزامی است'),
            'date.required' => __('فیلد تاریخ الزامی است'),
            'wakil.required' => __('فیلد وکیل گذر الزامی است'),
            'p_village.required' => __('فیلد قریه اصلی الزامی است'),
            'p_district.required' => __('فیلد والسوالی اصلی الزامی است'),
            'p_province.required' => __('فیلد ولایت اصلی الزامی است'),
            't_gozar.required' => __('فیلد گذر فعلی الزامی است'),
            't_nahiya.required' => __('فیلد ناحیه الزامی است'),
            't_province.required' => __('فیلد ولایت فعلی الزامی است'),
            'related_employee_name.required' => __('فیلد نام کارمند مربوطه الزامی است'),
            'related_employee_number.required' => __('فیلد شماره کارمند الزامی است'),
            'related_employee_number.min' => __('فیلد شماره باید کمتر از ۶ نباشد'),
            'related_employee_number.max' => __('فیلد شماره باید بیشتر از ۱۴ نباشد'),
            'result.required' => __('فیلد نتیجه الزامی است'),
            'reason.required' => __('فیلد به اساس الزامی است'),
        ]);
        $data = [
            'first_name' => $request->input('first_name'),
            'father_name' => $request->input('father_name'),
            'grand_father_name' => $request->input('grand_father_name'),
            'ssn' => $request->input('ssn'),
            'event_type' => $request->input('event_type'),
            'place' => $request->input('place'),
            'date' => $request->input('date'),
            'wakil' => $request->input('wakil'),
            'p_village' => $request->input('p_village'),
            'p_district' => $request->input('p_district'),
            'p_province' => $request->input('p_province'),
            't_gozar' => $request->input('t_gozar'),
            't_nahiya' => $request->input('t_nahiya'),
            't_province' => $request->input('t_province'),
            'related_employee_name' => $request->input('related_employee_name'),
            'related_employee_number' => $request->input('related_employee_number'),
            'result' => $request->input('result'),
            'reason' => $request->input('reason'),
        ];

        $mojrem_photo = time() . '.' . $request->file('mojrem_photo')->getClientOriginalExtension();
        $result = $request->file('mojrem_photo')->move(public_path('img/person_photos'), $mojrem_photo);
        if ($result instanceof File) {
            $data['person_image_name'] = $mojrem_photo;
        }
//        $request->file('fileItem')->store('images');
        $mojrem_created = Mojrem::create($data);
        if ($mojrem_created) {
            return redirect()->route('admin.add.document', compact('mojrem_created'))->with('success', __('مجرم جدید با موفقیت اضافه شد'));
        }
    }

    public function show($id)
    {
        $mojrems_show = Mojrem::find($id);
        $mojrem_documents = DB::table('document')->select()->join('person','id','user_id')->where('id','=',$id)->get();
        return view('admin.display_mojrem', compact('mojrems_show','mojrem_documents'));
    }

    public function delete($id){
        if ($id && ctype_digit($id)) {
            $mojremItem = Mojrem::find($id);
            if ($mojremItem && $mojremItem instanceof Mojrem) {
                $mojremItem->delete();
                return redirect()->route('admin.mojrem.list')->with('success', __('مجریم مورد نظر با موفقیت حذف گردید.'));
            }
        }
    }


    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $type = $request->get('type');
        $mojrems = DB::table('person');

        if ($type == 'ssn')
        {
            $mojrems->where('ssn','like', $keyword);
        } elseif ($type === 'first_name')
        {
            $mojrems->where('first_name','like', $keyword);
        } elseif ($type === 'father_name')
        {
            $mojrems->where('father_name','like', $keyword);
        } elseif ($type === 'place')
        {
            $mojrems->where('place','like', $keyword);
        }

        $mojrems = $mojrems->paginate(6);
        return view('admin.list_mojrem', compact('mojrems', 'type'));
    }

}
