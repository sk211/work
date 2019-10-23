<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use App\subCategory;
use App\thirdCategory;
use session;
class CategoryController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('RoleChecker');
         $this->middleware('SellerChecker');
    }

	public function categoryIndex()
	{
		$allCategory = category::all();

	
		    return view ('dashbord.pages.allcates', compact('allCategory'));
	}
    public function categorySave(Request $request)
    {
    	  $request->validate([
            'category_name' => 'required|unique:categories'
           
        ]);	


    	$addCategory = new category();
    	$addCategory->category_name =$request->category_name;
    	 $addCategory->save();

		return redirect('/allcates')->with('status', 'Category Add Successfully!');
    	// ->route('login')
    }

    public function categoryEdit($id){
  	return	category::where('id' ,$id)->first();
    }

    public function categoryUpdate(Request $request, $id)
    {

    	 $addCategory = category::where('id' ,$id)->first();
    	 $addCategory->category_name =$request->categoryName;
    	$addCategory->save();
    	return redirect('/allcates')->with('status', 'Category Update Successfully!');
    }

   public function categoryDelete($id)
   {
   	 category::where('id' ,$id)->delete();
   	 subCategory::where('category_id', $id)->delete();
	 thirdCategory::where('category_id', $id)->delete();
   	 // category::findOrFail($id)->delete();
   }

    public function subCategory($id)
    {
    	 $category = category::findOrFail($id);
    	  $allsubCategory = subCategory::where('category_id', $id)->get();
		    return view ('dashbord.pages.subcates', compact('category', 'allsubCategory'));
    }
    public function subCategorySave(Request $request)
    {
    	$request->validate([
            'subCategory_name' => 'required|unique:sub_categories'       
        ]);	

    	$addCategory = new subCategory();
    	$addCategory->category_id =$request->category_id;
    	$addCategory->subCategory_name =$request->subCategory_name;
    	// return $addCategory;
    	 $addCategory->save();
		    return back()->with('status', ' Sub Category  Successfully!');
    }

   public function subCategoryEdit($id){
    		return	subCategory::where('id' ,$id)->first();
    }

   public function subCategoryUpdate(Request $request,$id){
    	 $addCategory = subCategory::where('id' ,$id)->first();
    	  $addCategory->category_id =$request->category_id;
    	 $addCategory->subCategory_name =$request->subCategoryName;
    	 $addCategory->save();
    	return back();
    	// return redirect('/allcates')->with('status', 'Category Update Successfully!');
    }

    public function subCategoryDelete($id){
    	subCategory::where('id', $id)->delete();
    	thirdCategory::where('sub_category_id', $id)->delete();
    }

    /////third Sub Category name

    public function thirdCategory($id)
    {
    	$allThirdCategory = thirdCategory::where('sub_category_id', $id)->get();
    	 $allsubCategory = subCategory::where('id', $id)->first();
    	   return view ('dashbord.pages.thirdCategory', compact('allsubCategory', 'allThirdCategory'));

    }

   public function thirdCategorySave(Request $request){
   	$addCategory = new thirdCategory();
   	$addCategory->category_id = $request->category_id;
   	$addCategory->sub_category_id = $request->sub_category_id;
   	$addCategory->thirdCategoryName = $request->thirdCategoryName;
   	$addCategory->save();

   	return back(); 			
   }

   public function thirdCategoryEdit($id)
   {
   	return	thirdCategory::where('id' ,$id)->first();
   }

   public function thirdCategoryUpdate(Request $request,$id)
   {
   	 	 $addCategory = thirdCategory::where('id' ,$id)->first();
    	 $addCategory->category_id =$request->categoryId;
    	 $addCategory->sub_category_id =$request->sub_categoryId;
    	 $addCategory->thirdCategoryName =$request->thirdCategory_Name;
    	 $addCategory->save();
    	return back();
   }

   public function thirdCategoryDelete($id)
   {
   	thirdCategory::where('id', $id)->delete();
   }

   ///////////////////////////////////subCategory 

   public function categoryTosub(Request $request)
   {
    $category_id = $request->category_id;
    $allsubCategory =  subCategory::where('category_id', $category_id )->get();
    $stringToSend = "<option>--Sub Category Name--</option>";
    foreach ($allsubCategory as $value) {
        // $value->name;
       $stringToSend .= "<option value='".$value->id."'>".$value->subCategory_name."</option>";
        // $stringtosend  .="<option value='". $city->id ."'>". $city->name ."</option>";
    }
    echo  $stringToSend;

   }

   function subCategoryTothird(Request $request)
   {
    $subCategory_id = $request->subCategory_id;
    $allsubCategory =  thirdCategory::where('sub_category_id', $subCategory_id )->get();
    $stringToSend = "<option>--Sub Category Name--</option>";
    foreach ($allsubCategory as $value) {
        // $value->name;
       $stringToSend .= "<option value='".$value->id."'>".$value->thirdCategoryName."</option>";
        // $stringtosend  .="<option value='". $city->id ."'>". $city->name ."</option>";
    }
    echo  $stringToSend;
   }


}
