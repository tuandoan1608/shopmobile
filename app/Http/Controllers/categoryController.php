<?php

namespace App\Http\Controllers;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Component\recusive;
use Laracasts\Flash\Flash;

class categoryController extends Controller
{
    private $category;
 private $htmlSelect;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(category $category)
    {
        $this->category=$category;
    }
    public function index()
    {
        $data=$this->category->paginate(25);
        return view('admin.categories.list',compact('data'));
        
    }

    public function categorylist()
    {
        $data=$this->category->all();
        $recuse =new recusive($data);
        $option=$recuse->categoryRecure(0);
     return $option;


    }
    function getcate($parentId, $id =0, $text = '')
    {
        $data=$this->category->all();

        foreach ($data as $value) {
            if ($value['parentID'] == $id) {
                if(!empty($parentId)&& $parentId==$value['id']){
                    $this->htmlSelect .= "<option selected value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";
                }
                $this->htmlSelect .= "<option value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";

                $this->getcate($parentId,$value['id'], $text . '--');
            }
        }
        return $this->htmlSelect;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data= $this->categorylist();
        return view('admin.categories.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        
        $data['slug']=Str::slug($request->name);

      $this->category->create($data);
      
      Flash::success('Thêm danh mục thành công.');
      
        return redirect()->route('categoryindex');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   
      $data=  $this->category->find($id);
     
     
      $category=$this->getcate($data->parentID);
        return view('admin.categories.edit',compact('data','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $data=$request->all();
       $this->category->find($id)->update($data);
       Flash::success('Cập nhật thành công.');
       return redirect()->route('categoryindex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try{
          $this->category->find($id)->delete();
          return response()->json([
            'code'=>200,
            'message'=>'success'
        ]);
      }catch(\Exception $exception){
        return response()->json([
            'code'=>500,
            'message'=>'error'
        ]);
      }
    }
}
